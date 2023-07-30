<?php

namespace App\Filament\Resources\PaisResource\Pages;

use App\Filament\Resources\PaisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPais extends EditRecord
{
    protected static string $resource = PaisResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
