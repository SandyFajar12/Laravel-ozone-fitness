<?php

namespace App\Filament\Resources\Facilities;

use App\Filament\Resources\Facilities\Pages\ManageFacilities;
use App\Filament\Support\ImageField;
use App\Filament\Support\ResourceKit;
use App\Models\Facility;
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class FacilityResource extends Resource
{
    protected static ?string $model = Facility::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingStorefront;

    protected static string|UnitEnum|null $navigationGroup = 'Facilities & Classes';

    protected static ?string $navigationLabel = 'Fasilitas';

    protected static ?string $modelLabel = 'Fasilitas';

    protected static ?string $pluralModelLabel = 'Fasilitas';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            ImageField::make('image', 'facilities', 'Foto fasilitas'),
            TextInput::make('title')->label('Nama fasilitas')->required()->maxLength(255),
            Textarea::make('description')->label('Deskripsi')->rows(4)->required(),
            ...ResourceKit::orderFields(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Foto')->disk('uploads')->imageHeight(48),
                TextColumn::make('title')->label('Nama fasilitas')->searchable(),
                TextColumn::make('description')->label('Deskripsi')->limit(50),
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
            'index' => ManageFacilities::route('/'),
        ];
    }
}