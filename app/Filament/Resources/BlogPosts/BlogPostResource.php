<?php

namespace App\Filament\Resources\BlogPosts;

use App\Filament\Resources\BlogPosts\Pages\ManageBlogPosts;
use App\Filament\Support\ImageField;
use App\Models\BlogPost;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static string|UnitEnum|null $navigationGroup = 'Blog & News';

    protected static ?string $navigationLabel = 'Artikel';

    protected static ?string $modelLabel = 'Artikel';

    protected static ?string $pluralModelLabel = 'Artikel';

    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('blog_category_id')
                ->label('Kategori')
                ->relationship('category', 'name')
                ->preload()
                ->required(),
            TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn ($set, $state, string $operation) => $operation === 'create'
                    ? $set('slug', Str::slug((string) $state))
                    : null),
            TextInput::make('slug')
                ->label('Slug (alamat artikel)')
                ->required()
                ->unique(ignoreRecord: true)
                ->helperText('Terisi otomatis dari judul.'),
            TextInput::make('author')->label('Penulis')->required()->maxLength(255),
            DatePicker::make('published_at')->label('Tanggal terbit')->default(now())->required(),
            ImageField::make('image', 'blog', 'Foto artikel'),
            Textarea::make('excerpt')->label('Ringkasan')->rows(3)->required(),
            Textarea::make('content')
                ->label('Isi artikel')
                ->rows(12)
                ->required()
                ->columnSpanFull()
                ->helperText('Pisahkan paragraf dengan satu baris kosong.'),
            Toggle::make('is_published')->label('Terbitkan')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Foto')->disk('uploads')->imageHeight(48),
                TextColumn::make('title')->label('Judul')->searchable()->limit(40),
                TextColumn::make('category.name')->label('Kategori')->badge(),
                TextColumn::make('author')->label('Penulis'),
                TextColumn::make('published_at')->label('Terbit')->date('d M Y')->sortable(),
                IconColumn::make('is_published')->label('Terbit?')->boolean(),
            ])
            ->defaultSort('published_at', 'desc')
            ->recordActions([
                EditAction::make()->modalWidth(Width::FourExtraLarge),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageBlogPosts::route('/'),
        ];
    }
}