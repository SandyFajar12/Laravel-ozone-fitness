<?php

namespace App\Filament\Resources\HeroSlides;

use App\Filament\Resources\HeroSlides\Pages\ManageHeroSlides;
use App\Filament\Support\ImageField;
use App\Filament\Support\ResourceKit;
use App\Models\HeroSlide;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static string|UnitEnum|null $navigationGroup = 'About Us';

    protected static ?string $navigationLabel = 'Slider Utama (Hero)';

    protected static ?string $modelLabel = 'Slide';

    protected static ?string $pluralModelLabel = 'Slide';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            ImageField::make('image', 'hero', 'Foto slide (lebar / landscape)'),
            TextInput::make('title')->label('Judul')->required()->maxLength(255),
            TextInput::make('subtitle')->label('Subjudul')->maxLength(255),
            ...ResourceKit::orderFields(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Foto')->disk('uploads')->imageHeight(48),
                TextColumn::make('title')->label('Judul')->searchable(),
                TextColumn::make('subtitle')->label('Subjudul')->limit(40),
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
            'index' => ManageHeroSlides::route('/'),
        ];
    }
}