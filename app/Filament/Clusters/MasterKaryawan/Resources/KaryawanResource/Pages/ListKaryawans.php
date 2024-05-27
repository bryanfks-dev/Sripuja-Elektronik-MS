<?php

namespace App\Filament\Clusters\MasterKaryawan\Resources\KaryawanResource\Pages;

use App\Filament\Clusters\MasterKaryawan\Resources\KaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKaryawans extends ListRecords
{
    protected static string $resource = KaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make('create')
                ->icon('heroicon-m-plus')->label('Buat Karyawan')
        ];
    }
}
