<?php

namespace JeffersonGoncalves\Filament\QuebecIncidents;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class QuebecIncidentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-quebec-incidents')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations();
    }
}
