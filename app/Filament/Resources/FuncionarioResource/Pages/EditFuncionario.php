<?php

namespace App\Filament\Resources\FuncionarioResource\Pages;

use App\Filament\Resources\FuncionarioResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFuncionario extends EditRecord
{
    protected static string $resource = FuncionarioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
