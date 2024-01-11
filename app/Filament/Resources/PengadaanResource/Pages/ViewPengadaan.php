<?php

namespace App\Filament\Resources\PengadaanResource\Pages;

use App\Filament\Resources\PengadaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPengadaan extends ViewRecord
{
    protected static string $resource = PengadaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
