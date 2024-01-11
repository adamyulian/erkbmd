<?php

namespace App\Filament\Resources\KomponenResource\Pages;

use App\Filament\Resources\KomponenResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKomponen extends ViewRecord
{
    protected static string $resource = KomponenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
