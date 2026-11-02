<?php

namespace App\Filament\Resources\ServicePlans;

use App\Filament\Resources\ServicePlans\Pages\ManageServicePlans;
use App\Filament\Support\ResourceKit;
use App\Models\ServicePlan;
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

class ServicePlanResource extends Resource
{
    protected static ?string $model = ServicePlan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static string|UnitEnum|null $navigationGroup = 'Our Service';

    protected static ?string $navigationLabel = 'Paket & Harga';

    protected static ?string $modelLabel = 'Paket';

    protected static ?string $pluralModelLabel = 'Paket';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('type')->label('Jenis paket')->options(ResourceKit::typeOptions())->required(),
            TextInput::make('name')->label('Nama paket')->required()->maxLength(255),
            TextInput::make('price')
                ->label('Harga')
                ->numeric()
                ->prefix('Rp')
                ->minValue(0)
                ->required()
                ->helperText('Ketik angka saja, tanpa titik. Contoh: 150000'),
            TextInput::make('note')->label('Catatan')->maxLength(255)->helperText('Contoh: per bulan, hemat Rp 50.000'),
            ...ResourceKit::orderFields(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->formatStateUsing(fn ($state) => ResourceKit::typeOptions()[$state] ?? $state),
                TextColumn::make('name')->label('Paket')->searchable(),
                TextColumn::make('price')
                    ->label('Harga')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format((int) $state, 0, ',', '.')),
                TextColumn::make('note')->label('Catatan'),
                ResourceKit::aktifColumn(),
            ])
            ->filters([
                SelectFilter::make('type')->label('Jenis')->options(ResourceKit::typeOptions()),
            ])
            ->defaultSort('urutan')
            ->reorderable('urutan')
            ->recordActions(ResourceKit::recordActions())
            ->toolbarActions(ResourceKit::toolbarActions());
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageServicePlans::route('/'),
        ];
    }
}