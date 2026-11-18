<?php

namespace JeffersonGoncalves\Filament\QuebecIncidents\Support;

use Illuminate\Support\Carbon;
use JeffersonGoncalves\QuebecIncidents\Enums\Risk;
use JeffersonGoncalves\QuebecIncidents\Models\Incident;

class Labels
{
    /**
     * @return array<string, string>
     */
    public static function risks(): array
    {
        return collect(Risk::cases())->mapWithKeys(fn (Risk $risk): array => [$risk->value => static::risk($risk->value)])->all();
    }

    public static function risk(?string $risk): string
    {
        return __('filament-quebec-incidents::filament-quebec-incidents.risk.'.($risk ?? 'pending'));
    }

    public static function riskColor(?string $risk): string
    {
        return match ($risk) {
            Risk::Serious->value => 'danger',
            Risk::NotSerious->value => 'success',
            default => 'warning',
        };
    }

    public static function status(Incident $incident): string
    {
        return match (true) {
            $incident->closed_at !== null => 'closed',
            $incident->isOverdue() => 'overdue',
            $incident->owesCaiNotice() || $incident->owesPersonsNotice() => 'pending',
            default => 'open',
        };
    }

    public static function statusColor(string $status): string
    {
        return match ($status) {
            'closed' => 'gray',
            'overdue' => 'danger',
            'pending' => 'warning',
            default => 'info',
        };
    }

    public static function date(mixed $value): Carbon
    {
        return Carbon::parse($value);
    }
}
