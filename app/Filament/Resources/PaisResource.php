<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Pais;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PaisResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PaisResource\RelationManagers;

class PaisResource extends Resource
{
    protected static ?string $model = Pais::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Card::make()
              ->schema([
                 TextInput::make('cep')->label('Sigla do País')->required(),
                 TextInput::make('nome')->label('Nome do País')->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('cep')->label('Sigla do País')->sortable()->searchable(),
                TextColumn::make('nome')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPais::route('/'),
            'create' => Pages\CreatePais::route('/create'),
            'edit' => Pages\EditPais::route('/{record}/edit'),
        ];
    }    
}
