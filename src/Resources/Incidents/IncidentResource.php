<?php

namespace JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action as TableAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use JeffersonGoncalves\Filament\QuebecIncidents\Actions\IncidentActions;
use JeffersonGoncalves\Filament\QuebecIncidents\QuebecIncidentsPlugin;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages\CreateIncident;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages\EditIncident;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages\ListIncidents;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages\ViewIncident;
use JeffersonGoncalves\Filament\QuebecIncidents\Support\Labels;
use JeffersonGoncalves\QuebecIncidents\Models\Incident;

class IncidentResource extends Resource
{
    protected static ?string $model = Incident::class;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(2)
            ->schema([
                TextInput::make('title')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.title'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                DateTimePicker::make('discovered_at')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.discovered_at'))
                    ->helperText(__('filament-quebec-incidents::filament-quebec-incidents.help.discovered_at'))
                    ->default(now())
                    ->required()
                    ->disabledOn('edit'),
                DateTimePicker::make('occurred_at')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.occurred_at')),
                Textarea::make('description')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.description'))
                    ->columnSpanFull(),
                Textarea::make('circumstances')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.circumstances'))
                    ->columnSpanFull(),
                TagsInput::make('data_categories')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.data_categories')),
                TextInput::make('affected_persons')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.affected_persons'))
                    ->numeric()
                    ->minValue(0),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(1)
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('title')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.title'))
                            ->columnSpanFull(),
                        TextEntry::make('status')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.status'))
                            ->state(fn (Incident $record): string => Labels::status($record))
                            ->formatStateUsing(fn (string $state): string => __("filament-quebec-incidents::filament-quebec-incidents.status.{$state}"))
                            ->badge()
                            ->color(fn (string $state): string => Labels::statusColor($state)),
                        TextEntry::make('risk')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.risk'))
                            ->state(fn (Incident $record): ?string => $record->risk?->value)
                            ->formatStateUsing(fn (?string $state): string => Labels::risk($state))
                            ->placeholder(Labels::risk(null))
                            ->badge()
                            ->color(fn (?string $state): string => Labels::riskColor($state)),
                        TextEntry::make('discovered_at')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.discovered_at'))
                            ->dateTime(),
                        TextEntry::make('notice_due_at')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.notice_due_at'))
                            ->dateTime()
                            ->placeholder('-')
                            ->color(fn (Incident $record): ?string => $record->isOverdue() ? 'danger' : null),
                        TextEntry::make('occurred_at')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.occurred_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('affected_persons')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.affected_persons'))
                            ->placeholder('-'),
                        TextEntry::make('data_categories')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.data_categories'))
                            ->badge()
                            ->placeholder('-'),
                        TextEntry::make('sensitivity')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.sensitivity'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('consequences')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.consequences'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('likelihood')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.likelihood'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('cai_notified_at')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.cai_notified_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('cai_reference')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.cai_reference'))
                            ->placeholder('-'),
                        TextEntry::make('persons_notified_at')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.persons_notified_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('persons_notice_delay_reason')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.persons_notice_delay_reason'))
                            ->placeholder('-'),
                        TextEntry::make('public_notice_at')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.public_notice_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('public_notice_reason')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.public_notice_reason'))
                            ->placeholder('-'),
                        TextEntry::make('keep_until')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.keep_until'))
                            ->date(),
                        TextEntry::make('closed_at')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.closed_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('description')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.description'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('circumstances')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.circumstances'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('measures')
                            ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.measures'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.title'))
                    ->searchable()
                    ->limit(50),
                TextColumn::make('status')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.status'))
                    ->state(fn (Incident $record): string => Labels::status($record))
                    ->formatStateUsing(fn (string $state): string => __("filament-quebec-incidents::filament-quebec-incidents.status.{$state}"))
                    ->badge()
                    ->color(fn (string $state): string => Labels::statusColor($state)),
                TextColumn::make('risk')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.risk'))
                    ->state(fn (Incident $record): string => Labels::risk($record->risk?->value))
                    ->badge()
                    ->color(fn (Incident $record): string => Labels::riskColor($record->risk?->value)),
                TextColumn::make('discovered_at')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.discovered_at'))
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('notice_due_at')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.notice_due_at'))
                    ->dateTime()
                    ->sortable()
                    ->color(fn (Incident $record): ?string => $record->isOverdue() ? 'danger' : null),
                IconColumn::make('cai')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.cai'))
                    ->state(fn (Incident $record): bool => $record->cai_notified_at !== null)
                    ->boolean(),
                IconColumn::make('persons')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.persons'))
                    ->state(fn (Incident $record): bool => $record->persons_notified_at !== null || $record->public_notice_at !== null)
                    ->boolean(),
            ])
            ->defaultSort('discovered_at', 'desc')
            ->filters([
                Filter::make('pending')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.status.pending'))
                    ->query(fn (Builder $query): Builder => $query->scopes('pending')),
                Filter::make('overdue')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.status.overdue'))
                    ->query(fn (Builder $query): Builder => $query->scopes('overdue')),
                SelectFilter::make('risk')
                    ->label(__('filament-quebec-incidents::filament-quebec-incidents.fields.risk'))
                    ->options(Labels::risks()),
            ])
            ->actions([
                ViewAction::make(),
                ActionGroup::make([EditAction::make(), ...IncidentActions::all(TableAction::class)]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIncidents::route('/'),
            'create' => CreateIncident::route('/create'),
            'view' => ViewIncident::route('/{record}'),
            'edit' => EditIncident::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('filament-quebec-incidents::filament-quebec-incidents.resource.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-quebec-incidents::filament-quebec-incidents.resource.plural_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return QuebecIncidentsPlugin::get()->getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        return QuebecIncidentsPlugin::get()->getNavigationSort();
    }

    public static function getNavigationIcon(): ?string
    {
        return QuebecIncidentsPlugin::get()->getNavigationIcon();
    }

    public static function getSlug(): string
    {
        return QuebecIncidentsPlugin::get()->getSlug();
    }

    public static function getNavigationBadge(): ?string
    {
        $pending = Incident::query()->scopes('pending')->count();

        return $pending > 0 ? (string) $pending : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return Incident::query()->scopes('overdue')->exists() ? 'danger' : 'warning';
    }
}
