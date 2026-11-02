<?php

namespace App\Filament\Resources\GymClasses;

use App\Filament\Resources\GymClasses\Pages\ManageGymClasses;
use App\Filament\Support\ResourceKit;
use App\Models\GymClass;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class GymClassResource extends Resource
{
    protected static ?string $model = GymClass::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFire;

    protected static string|UnitEnum|null $navigationGroup = 'Facilities & Classes';

    protected static ?string $navigationLabel = 'Kelas Grup';

    protected static ?string $modelLabel = 'Kelas';

    protected static ?string $pluralModelLabel = 'Kelas';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->label('Nama kelas')->required()->maxLength(255),
            Select::make('icon')->label('Ikon')->options(ResourceKit::iconOptions())->required(),
            TextInput::make('schedule')
                ->label('Jadwal')
                ->required()
                ->helperText('Contoh: Senin, Rabu, Jumat — 17.00 & 19.00'),
            Select::make('intensity')
                ->label('Intensitas')
                ->options(['Ringan' => 'Ringan', 'Sedang' => 'Sedang', 'Tinggi' => 'Tinggi'])
                ->required(),
            Textarea::make('description')->label('Deskripsi')->rows(3)->required(),
            ...ResourceKit::orderFields(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Kelas')->searchable(),
                TextColumn::make('schedule')->label('Jadwal')->limit(40),
                TextColumn::make('intensity')
                    ->label('Intensitas')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'Tinggi' => 'danger',
                        'Sedang' => 'warning',
                        default  => 'success',
                    }),
                ResourceKit::aktifColumn(),
            ])
            ->defaultSort('urutan')
            ->reorderable('urutan')
            ->recordActions(ResourceKit::recordActions())
            ->toolbarActions(ResourceKit::toolbarActions());
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageGymClasses::route('/'),
        ];
    }
}