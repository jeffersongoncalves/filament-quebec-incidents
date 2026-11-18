<?php

namespace JeffersonGoncalves\Filament\QuebecIncidents\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action as TableAction;
use JeffersonGoncalves\Filament\QuebecIncidents\Support\Labels;
use JeffersonGoncalves\QuebecIncidents\Enums\Risk;
use JeffersonGoncalves\QuebecIncidents\IncidentManager;
use JeffersonGoncalves\QuebecIncidents\Models\Incident;

/**
 * Row and view-page actions: each one is a thin call to laravel-quebec-incidents' IncidentManager.
 */
class IncidentActions
{
    /**
     * @param  class-string<Action|TableAction>  $class
     * @return list<Action|TableAction>
     */
    public static function all(string $class = Action::class): array
    {
        return [static::assess($class), static::notifyCai($class), static::notifyPersons($class), static::notifyPublicly($class), static::deferPersonsNotice($class), static::close($class)];
    }

    public static function assess(string $class = Action::class): Action|TableAction
    {
        return $class::make('assess')
            ->label(__('filament-quebec-incidents::filament-quebec-incidents.actions.assess.label'))
            ->icon('heroicon-o-scale')
            ->color('warning')
            ->visible(fn (Incident $record): bool => $record->closed_at === null)
            ->modalDescription(__('filament-quebec-incidents::filament-quebec-incidents.actions.assess.description'))
            ->fillForm(fn (Incident $record): array => [
                'risk' => $record->risk?->value,
                'sensitivity' => $record->sensitivity,
                'consequences' => $record->consequences,
                'likelihood' => $record->likelihood,
            ])
            ->form([
                Select::make('risk')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.risk'))
                    ->options(Labels::risks())
                    ->required(),
                Textarea::make('sensitivity')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.sensitivity')),
                Textarea::make('consequences')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.consequences')),
                Textarea::make('likelihood')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.likelihood')),
            ])
            ->action(function (Incident $record, array $data): void {
                app(IncidentManager::class)->assess($record, Risk::from($data['risk']), $data['sensitivity'] ?? null, $data['consequences'] ?? null, $data['likelihood'] ?? null);
                static::done('assess');
            });
    }

    public static function notifyCai(string $class = Action::class): Action|TableAction
    {
        return $class::make('notifyCai')
            ->label(__('filament-quebec-incidents::filament-quebec-incidents.actions.notify_cai.label'))
            ->icon('heroicon-o-building-library')
            ->color('info')
            ->visible(fn (Incident $record): bool => $record->owesCaiNotice() && $record->risk === Risk::Serious)
            ->form([
                TextInput::make('reference')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.cai_reference')),
                DateTimePicker::make('at')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.notified_at'))
                    ->default(now())
                    ->required(),
            ])
            ->action(function (Incident $record, array $data): void {
                app(IncidentManager::class)->notifyCai($record, $data['reference'] ?? null, Labels::date($data['at']));
                static::done('notify_cai');
            });
    }

    public static function notifyPersons(string $class = Action::class): Action|TableAction
    {
        return $class::make('notifyPersons')
            ->label(__('filament-quebec-incidents::filament-quebec-incidents.actions.notify_persons.label'))
            ->icon('heroicon-o-envelope')
            ->color('info')
            ->visible(fn (Incident $record): bool => $record->owesPersonsNotice() || ($record->risk === Risk::Serious && $record->closed_at === null && $record->persons_notice_delay_reason !== null && $record->persons_notified_at === null))
            ->form([
                DateTimePicker::make('at')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.notified_at'))
                    ->default(now())
                    ->required(),
            ])
            ->action(function (Incident $record, array $data): void {
                app(IncidentManager::class)->notifyPersons($record, Labels::date($data['at']));
                static::done('notify_persons');
            });
    }

    public static function notifyPublicly(string $class = Action::class): Action|TableAction
    {
        return $class::make('notifyPublicly')
            ->label(__('filament-quebec-incidents::filament-quebec-incidents.actions.notify_publicly.label'))
            ->icon('heroicon-o-megaphone')
            ->color('gray')
            ->visible(fn (Incident $record): bool => $record->owesPersonsNotice())
            ->modalDescription(__('filament-quebec-incidents::filament-quebec-incidents.actions.notify_publicly.description'))
            ->form([
                Textarea::make('reason')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.public_notice_reason'))
                    ->required(),
                DateTimePicker::make('at')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.notified_at'))
                    ->default(now())
                    ->required(),
            ])
            ->action(function (Incident $record, array $data): void {
                app(IncidentManager::class)->notifyPublicly($record, $data['reason'], Labels::date($data['at']));
                static::done('notify_publicly');
            });
    }

    public static function deferPersonsNotice(string $class = Action::class): Action|TableAction
    {
        return $class::make('deferPersonsNotice')
            ->label(__('filament-quebec-incidents::filament-quebec-incidents.actions.defer.label'))
            ->icon('heroicon-o-pause-circle')
            ->color('gray')
            ->visible(fn (Incident $record): bool => $record->owesPersonsNotice())
            ->modalDescription(__('filament-quebec-incidents::filament-quebec-incidents.actions.defer.description'))
            ->form([
                Textarea::make('reason')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.persons_notice_delay_reason'))
                    ->required(),
            ])
            ->action(function (Incident $record, array $data): void {
                app(IncidentManager::class)->deferPersonsNotice($record, $data['reason']);
                static::done('defer');
            });
    }

    public static function close(string $class = Action::class): Action|TableAction
    {
        return $class::make('close')
            ->label(__('filament-quebec-incidents::filament-quebec-incidents.actions.close.label'))
            ->icon('heroicon-o-check-circle')
            ->color('success')
            ->visible(fn (Incident $record): bool => $record->closed_at === null && $record->risk !== null)
            ->fillForm(fn (Incident $record): array => ['measures' => $record->measures])
            ->form([
                Textarea::make('measures')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.measures'))
                    ->required(),
            ])
            ->action(function (Incident $record, array $data): void {
                app(IncidentManager::class)->close($record, $data['measures']);
                static::done('close');
            });
    }

    protected static function done(string $action): void
    {
        Notification::make()->success()->title(__("filament-quebec-incidents::filament-quebec-incidents.actions.{$action}.success"))->send();
    }
}
