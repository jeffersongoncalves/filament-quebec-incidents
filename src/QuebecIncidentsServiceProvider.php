<?php

namespace JeffersonGoncalves\Filament\QuebecIncidents;

use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class QuebecIncidentsServiceProvider extends BasePackageServiceProvider
{
    public static string $name = 'filament-quebec-incidents';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasTranslations();
    }
}
