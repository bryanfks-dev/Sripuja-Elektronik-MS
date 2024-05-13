<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-s-tag';

    protected static ?string $navigationLabel = 'Master Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode_barang')->label('Kode Barang')
                    ->required(),
                TextInput::make('nama_barang')->label('Nama Barang')
                    ->required(),
                TextInput::make('harga_jual')->label('Harga Jual')
                    ->numeric()->prefix('Rp')->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')->minValue(1)
                    ->required(),
                TextInput::make('harga_beli')->label('Harga Beli')
                    ->numeric()->prefix('Rp')->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')->minValue(1)
                    ->required(),
                TextInput::make('harga_grosir')->label('Harga Grosir')
                    ->numeric()->prefix('Rp')->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')->minValue(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_barang'),
                TextColumn::make('nama_barang'),
                TextColumn::make('harga_jual')->numeric(),
                TextColumn::make('harga_beli')->numeric(),
                TextColumn::make('harga_grosir')->numeric(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
