<?php

namespace JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use JeffersonGoncalves\Filament\QuebecIncidents\Resources\Incidents\IncidentResource;
use JeffersonGoncalves\QuebecIncidents\IncidentManager;

class CreateIncident extends CreateRecord
{
    protected static string $resource = IncidentResource::class;

    /**
     * Open through the manager: it sets the notice target and the keeping period and fires IncidentOpened.
     *
     * @param  array<string, mixed>  $data
     */
    protected function handleRecordCreation(array $data): Model
    {
        return app(IncidentManager::class)->open(
            $data['title'],
            Carbon::parse($data['discovered_at']),
            Arr::except($data, ['title', 'discovered_at']),
        );
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }
}
