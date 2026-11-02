<?php

namespace App\Filament\Resources\Benefits;

use App\Filament\Resources\Benefits\Pages\ManageBenefits;
use App\Filament\Support\ResourceKit;
use App\Models\Benefit;
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

class BenefitResource extends Resource
{
    protected static ?string $model = Benefit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static string|UnitEnum|null $navigationGroup = 'About Us';

    protected static ?string $navigationLabel = 'Keuntungan Bergabung';

    protected static ?string $modelLabel = 'Keuntungan';

    protected static ?string $pluralModelLabel = 'Keuntungan';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('icon')->label('Ikon')->options(ResourceKit::iconOptions())->required(),
            TextInput::make('title')->label('Judul')->required()->maxLength(255),
            Textarea::make('description')->label('Deskripsi')->rows(3)->required(),
            ...ResourceKit::orderFields(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Judul')->searchable(),
                TextColumn::make('description')->label('Deskripsi')->limit(60),
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
            'index' => ManageBenefits::route('/'),
        ];
    }
}