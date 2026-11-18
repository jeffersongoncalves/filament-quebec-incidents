<?php

namespace JeffersonGoncalves\Filament\QuebecIncidents\Tests\Fixtures;

use Filament\Panel;
use Filament\PanelProvider;
use JeffersonGoncalves\Filament\QuebecIncidents\QuebecIncidentsPlugin;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->plugins([
                QuebecIncidentsPlugin::make(),
            ]);
    }
}
