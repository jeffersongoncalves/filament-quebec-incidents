<?php

namespace JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\IncidentResource;

class ListIncidents extends ListRecords
{
    protected static string $resource = IncidentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
