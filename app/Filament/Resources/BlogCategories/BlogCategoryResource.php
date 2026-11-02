<?php

namespace App\Filament\Resources\BlogCategories;

use App\Filament\Resources\BlogCategories\Pages\ManageBlogCategories;
use App\Filament\Support\ResourceKit;
use App\Models\BlogCategory;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

class BlogCategoryResource extends Resource
{
    protected static ?string $model = BlogCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static string|UnitEnum|null $navigationGroup = 'Blog & News';

    protected static ?string $navigationLabel = 'Kategori Blog';

    protected static ?string $modelLabel = 'Kategori';

    protected static ?string $pluralModelLabel = 'Kategori';

    protected static ?int $navigationSort = 9;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Nama kategori')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($set, $state, string $operation) => $operation === 'create'
                    ? $set('slug', Str::slug((string) $state))
                    : null),
            TextInput::make('slug')
                ->label('Slug (alamat kategori)')
                ->required()
                ->unique(ignoreRecord: true)
                ->helperText('Terisi otomatis dari nama.'),
            TextInput::make('urutan')->label('Urutan')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Kategori')->searchable(),
                TextColumn::make('slug')->label('Slug'),
                TextColumn::make('posts_count')->label('Jumlah artikel')->counts('posts'),
            ])
            ->defaultSort('urutan')
            ->reorderable('urutan')
            ->recordActions(ResourceKit::recordActions())
            ->toolbarActions(ResourceKit::toolbarActions());
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageBlogCategories::route('/'),
        ];
    }
}