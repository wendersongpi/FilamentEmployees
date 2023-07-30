<?php

namespace App\Filament\Resources\CidadeResource\Pages;

use App\Filament\Resources\CidadeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCidades extends ListRecords
{
    protected static string $resource = CidadeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
