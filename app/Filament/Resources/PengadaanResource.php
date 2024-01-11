<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Komponen;
use Filament\Forms\Form;
use App\Models\Pengadaan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PengadaanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengadaanResource\RelationManagers;

class PengadaanResource extends Resource
{
    protected static ?string $model = Pengadaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Usulan RKBMD Pengadaan';

    protected static ?string $navigationGroup = 'Usulan RKBMD';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Usulan RKBMD Pengadaan')
                ->schema([
                    Select::make('komponen_id')
                    ->label('Pilih Komponen Pengadaan : ')
                    ->relationship(
                        name:'komponen',
                        titleAttribute: 'nama'
                    )
                    ->searchable()
                    ->live(onBlur:True)
                    ->afterStateUpdated(function(string $state, Set $set){
                        $set('harga', Komponen::find($state)->nilai);
                    })
                    ->required()
                    ->columnSpan(2),
                    Forms\Components\Select::make('peruntukan')
                    ->options([
                        'aset' => 'Digunakan Sendiri',
                        'masyarakat' => 'Diberikan Masyarakat',
                    ])
                    ->native(false)
                    ->columnSpan(2),
                    Forms\Components\TextInput::make('volume')
                        ->required()
                        ->live(onBlur:True)
                        ->afterStateUpdated(function(string $state, Set $set){
                            $set('volume', $state);
                        })
                        ->numeric()
                        ->columnSpan(1),
                    Forms\Components\Placeholder::make('nilai')
                        ->content(function ($get){
                            return $get('harga') * $get('volume');
                        })
                        ->columnSpan(1),
                    Forms\Components\TextInput::make('alasan')
                        ->required()
                        ->columnSpan(3),
                        Select::make('kegiatan_id')
                        ->label('Pilih Komponen Kegiatan ')
                        ->relationship(
                            name:'kegiatan',
                            titleAttribute: 'subtitle'
                        )
                        ->searchable()
                        ->required()
                        ->columnSpan(3),
                ])->columns(6),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('komponen.nama')
                    ->label('Komponen')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('peruntukan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('volume')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alasan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nilai')
                    ->state(function(Pengadaan $record): float{
                        return $record->komponen->nilai * $record->volume;
                    }),
                Tables\Columns\TextColumn::make('kegiatan.subtitle')
                    ->searchable(),
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
            'index' => Pages\ListPengadaans::route('/'),
            'create' => Pages\CreatePengadaan::route('/create'),
            'view' => Pages\ViewPengadaan::route('/{record}'),
            'edit' => Pages\EditPengadaan::route('/{record}/edit'),
        ];
    }
}
