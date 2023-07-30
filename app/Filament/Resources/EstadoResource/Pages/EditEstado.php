<?php

namespace App\Filament\Resources\EstadoResource\Pages;

use App\Filament\Resources\EstadoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstado extends EditRecord
{
    protected static string $resource = EstadoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
