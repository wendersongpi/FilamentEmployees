<?php

namespace App\Filament\Resources\EstadoResource\Pages;

use App\Filament\Resources\EstadoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstados extends ListRecords
{
    protected static string $resource = EstadoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
