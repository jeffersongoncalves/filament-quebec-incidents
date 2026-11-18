<?php

namespace JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages;

use Filament\Resources\Pages\EditRecord;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\IncidentResource;

/**
 * Edits the description fields only. The discovery date is locked: the legal deadline is counted from it.
 */
class EditIncident extends EditRecord
{
    protected static string $resource = IncidentResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }
}
