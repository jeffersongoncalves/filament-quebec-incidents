<?php

namespace JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\Filament\QuebecIncidents\Actions\IncidentActions;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\IncidentResource;

class ViewIncident extends ViewRecord
{
    protected static string $resource = IncidentResource::class;

    protected function getHeaderActions(): array
    {
        return [...IncidentActions::all(), EditAction::make()];
    }
}
