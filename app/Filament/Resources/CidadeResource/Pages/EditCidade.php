<?php

namespace App\Filament\Resources\CidadeResource\Pages;

use App\Filament\Resources\CidadeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCidade extends EditRecord
{
    protected static string $resource = CidadeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
