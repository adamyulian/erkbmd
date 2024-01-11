<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kegiatan';

    protected static ?string $navigationGroup = 'Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('unit_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('unit_name_baru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_bidang')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kode_program')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_program')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kode_kegiatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_kegiatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sub_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kode_sub_kegiatan_sipd')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtitle')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('split_part')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('indikator_sub_kegiatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('target_capaian')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_unit')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('keterangan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('unit_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_bidang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_program')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_program')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sub_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_sub_kegiatan_sipd')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('split_part')
                    ->searchable(),
                Tables\Columns\TextColumn::make('indikator_sub_kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('target_capaian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_unit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'view' => Pages\ViewKegiatan::route('/{record}'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
