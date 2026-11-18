<?php

use Illuminate\Support\Carbon;
use JeffersonGoncalves\Filament\QuebecIncidents\QuebecIncidentsPlugin;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\IncidentResource;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages\CreateIncident;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages\EditIncident;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages\ListIncidents;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages\ViewIncident;
use JeffersonGoncalves\Filament\QuebecIncidents\Tests\Fixtures\TestUser;
use JeffersonGoncalves\QuebecIncidents\Enums\Risk;
use JeffersonGoncalves\QuebecIncidents\Facades\QuebecIncidents;
use JeffersonGoncalves\QuebecIncidents\Models\Incident;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(TestUser::create(['name' => 'Person in charge', 'email' => 'privacy@example.com']));
});

it('registers an incident with the notice target and the keeping period', function () {
    Livewire::test(CreateIncident::class)
        ->fillForm([
            'title' => 'Backup exposed',
            'discovered_at' => '2026-11-13 10:00:00',
            'data_categories' => ['contact', 'financial'],
            'affected_persons' => 120,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Incident::sole())
        ->notice_due_at->toDateTimeString()->toBe('2026-11-16 10:00:00')
        ->keep_until->toDateTimeString()->toBe('2031-11-13 10:00:00')
        ->data_categories->toBe(['contact', 'financial'])
        ->affected_persons->toBe(120)
        ->risk->toBeNull();
});

it('lists incidents and filters the overdue ones', function () {
    $overdue = QuebecIncidents::open('Backup exposed', Carbon::now()->subDays(4));
    $recent = QuebecIncidents::open('Phishing');

    Livewire::test(ListIncidents::class)
        ->assertCanSeeTableRecords([$overdue, $recent])
        ->filterTable('overdue')
        ->assertCanSeeTableRecords([$overdue])
        ->assertCanNotSeeTableRecords([$recent]);

    expect(IncidentResource::getNavigationBadge())->toBe('2')
        ->and(IncidentResource::getNavigationBadgeColor())->toBe('danger');
});

it('walks a serious incident through assessment, notices and closing', function () {
    $incident = QuebecIncidents::open('Backup exposed');

    Livewire::test(ViewIncident::class, ['record' => $incident->getKey()])
        ->assertActionHidden('close')
        ->assertActionHidden('notifyCai')
        ->callAction('assess', ['risk' => 'serious', 'sensitivity' => 'Financial information', 'likelihood' => 'Indexed by search engines'])
        ->assertHasNoActionErrors();

    Livewire::test(ViewIncident::class, ['record' => $incident->getKey()])
        ->callAction('notifyCai', ['reference' => 'CAI-42', 'at' => now()->toDateTimeString()]);

    Livewire::test(ViewIncident::class, ['record' => $incident->getKey()])
        ->assertActionHidden('notifyCai')
        ->callAction('notifyPersons', ['at' => '2026-11-16 10:00:00']);

    Livewire::test(ViewIncident::class, ['record' => $incident->getKey()])
        ->callAction('close', ['measures' => 'Bucket made private.']);

    expect($incident->fresh())
        ->risk->toBe(Risk::Serious)
        ->sensitivity->toBe('Financial information')
        ->cai_reference->toBe('CAI-42')
        ->persons_notified_at->toDateTimeString()->toBe('2026-11-16 10:00:00')
        ->closed_at->not->toBeNull();
});

it('accepts a public notice instead of individual ones', function () {
    $incident = QuebecIncidents::assess(QuebecIncidents::open('Mailing list leaked'), Risk::Serious);

    Livewire::test(ViewIncident::class, ['record' => $incident->getKey()])
        ->callAction('notifyPublicly', ['reason' => 'No contact details for most persons.', 'at' => now()->toDateTimeString()])
        ->assertActionHidden('notifyPersons');

    expect($incident->fresh()->owesPersonsNotice())->toBeFalse();
});

it('defers the persons notice during an investigation, then records it', function () {
    $incident = QuebecIncidents::assess(QuebecIncidents::open('Laptop stolen'), Risk::Serious);

    Livewire::test(ViewIncident::class, ['record' => $incident->getKey()])
        ->callAction('deferPersonsNotice', ['reason' => 'Police investigation.'])
        ->assertActionHidden('deferPersonsNotice')
        ->assertActionVisible('notifyPersons');

    expect($incident->fresh()->persons_notice_delay_reason)->toBe('Police investigation.');
});

it('hides the notices without a risk of serious injury', function () {
    $incident = QuebecIncidents::assess(QuebecIncidents::open('Lost encrypted laptop'), Risk::NotSerious);

    Livewire::test(ViewIncident::class, ['record' => $incident->getKey()])
        ->assertActionHidden('notifyCai')
        ->assertActionHidden('notifyPersons')
        ->assertActionVisible('close');
});

it('edits the description but never the awareness date', function () {
    $incident = QuebecIncidents::open('Backup exposed', Carbon::parse('2026-11-13 10:00'));

    Livewire::test(EditIncident::class, ['record' => $incident->getKey()])
        ->fillForm(['description' => 'Public bucket for 2 hours.', 'discovered_at' => '2026-11-01 10:00:00'])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($incident->fresh())
        ->description->toBe('Public bucket for 2 hours.')
        ->discovered_at->toDateTimeString()->toBe('2026-11-13 10:00:00');
});

it('offers the same actions on the table rows', function () {
    $incident = QuebecIncidents::open('Backup exposed');

    Livewire::test(ListIncidents::class)
        ->callTableAction('assess', $incident, ['risk' => 'not_serious']);

    expect($incident->fresh()->risk)->toBe(Risk::NotSerious);
});

it('applies the fluent plugin options', function () {
    QuebecIncidentsPlugin::get()->navigationGroup('Quebec')->slug('confidentiality-incidents');

    expect(IncidentResource::getNavigationGroup())->toBe('Quebec')
        ->and(IncidentResource::getSlug())->toBe('confidentiality-incidents');
});
