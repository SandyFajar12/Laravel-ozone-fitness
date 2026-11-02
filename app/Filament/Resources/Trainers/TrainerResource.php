<?php

namespace App\Filament\Resources\Trainers;

use App\Filament\Resources\Trainers\Pages\ManageTrainers;
use App\Filament\Support\ImageField;
use App\Filament\Support\ResourceKit;
use App\Models\Trainer;
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

class TrainerResource extends Resource
{
    protected static ?string $model = Trainer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static string|UnitEnum|null $navigationGroup = 'About Us';

    protected static ?string $navigationLabel = 'Tim Pelatih';

    protected static ?string $modelLabel = 'Pelatih';

    protected static ?string $pluralModelLabel = 'Pelatih';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            ImageField::make('image', 'trainers', 'Foto pelatih (portrait / tegak)'),
            TextInput::make('name')->label('Nama')->required()->maxLength(255),
            TextInput::make('role')->label('Jabatan')->required()->maxLength(255),
            Textarea::make('bio')->label('Bio singkat')->rows(4)->required(),
            ...ResourceKit::orderFields(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Foto')->disk('uploads')->imageHeight(48),
                TextColumn::make('name')->label('Nama')->searchable(),
                TextColumn::make('role')->label('Jabatan'),
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
            'index' => ManageTrainers::route('/'),
        ];
    }
}