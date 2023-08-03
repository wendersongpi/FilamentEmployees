<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Pais;
use Filament\Tables;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Funcionario;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FuncionarioResource\Pages;
use App\Filament\Resources\FuncionarioResource\RelationManagers;

class FuncionarioResource extends Resource
{
    protected static ?string $model = Funcionario::class;

    //protected static ?string $model = Pais::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                  
                    Select::make('pais_id')
                    ->label('País')
                    ->options(Pais::all()->pluck('nome', 'id')->toArray())
                    ->reactive()
                   ->afterStateUpdated(function (callable $set) {
                        $set('estado_id', null); 
                        $set('cidade_id', null);
                   }),

                    Select::make('estado_id')
                    ->label('Estado')
                        ->options(function(callable $get){
                            $pais = Pais::find($get('pais_id'));
                            if(!$pais){
                                return Estado::all()->pluck('nome', 'id');
                            }
                            return $pais->estado->pluck('nome', 'id');
                        })
                        ->reactive()                    
                        ->afterStateUpdated(fn (callable $set) => $set('cidade_id', null)),

                    Select::make('cidade_id')
                        ->label('Cidade')
                        ->options(function (callable $get){
                            $estado = Estado::find($get('estado_id'));
                           if(!$estado){
                                return Cidade::all()->pluck('nome', 'id');
                            }
                            return $estado->cidade->pluck('nome', 'id');
                        })
                        ->reactive(),
                        
                    Select::make('departamento_id',)
                    ->relationship('departamento', 'nome')->required(),
                    TextInput::make('primeiro_nome')->required(),
                    TextInput::make('ultimo_nome')->required(),
                    TextInput::make('endereco')->required(),
                    TextInput::make('cep')->required(),
                    DatePicker::make('data_de_nascimento')->required(),
                    DatePicker::make('data_de_contratacao')->required(),

                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('primeiro_nome')->sortable()->searchable()->label('Nome'),
                TextColumn::make('ultimo_nome')->sortable()->searchable()->label('Sobrenome'),
                TextColumn::make('departamento.nome')->sortable(),
                TextColumn::make('data_de_contratacao')->date('d,M,Y'),
                TextColumn::make('created_at')->label('Data do Registro')->sortable()->date('d,M,Y'),
            ])
            ->filters([
                SelectFilter::make('departamento')->relationship('departamento', 'nome'),
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
            'index' => Pages\ListFuncionarios::route('/'),
            'create' => Pages\CreateFuncionario::route('/create'),
            'edit' => Pages\EditFuncionario::route('/{record}/edit'),
        ];
    }    
}
