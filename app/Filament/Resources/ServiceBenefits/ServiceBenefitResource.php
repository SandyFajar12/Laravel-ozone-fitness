<?php

namespace App\Filament\Resources\ServiceBenefits;

use App\Filament\Resources\ServiceBenefits\Pages\ManageServiceBenefits;
use App\Filament\Support\ResourceKit;
use App\Models\ServiceBenefit;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class ServiceBenefitResource extends Resource
{
    protected static ?string $model = ServiceBenefit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static string|UnitEnum|null $navigationGroup = 'Our Service';

    protected static ?string $navigationLabel = 'Poin Benefit';

    protected static ?string $modelLabel = 'Poin benefit';

    protected static ?string $pluralModelLabel = 'Poin benefit';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('type')->label('Untuk')->options(ResourceKit::typeOptions())->required(),
            TextInput::make('text')->label('Teks benefit')->required()->maxLength(255),
            ...ResourceKit::orderFields(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->label('Untuk')
                    ->badge()
                    ->formatStateUsing(fn ($state) => ResourceKit::typeOptions()[$state] ?? $state),
                TextColumn::make('text')->label('Teks benefit')->searchable()->limit(60),
                ResourceKit::aktifColumn(),
            ])
            ->filters([
                SelectFilter::make('type')->label('Untuk')->options(ResourceKit::typeOptions()),
            ])
            ->defaultSort('urutan')
            ->reorderable('urutan')
            ->recordActions(ResourceKit::recordActions())
            ->toolbarActions(ResourceKit::toolbarActions());
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageServiceBenefits::route('/'),
        ];
    }
}