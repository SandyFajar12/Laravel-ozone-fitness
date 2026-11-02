<?php

namespace App\Filament\Resources\ContactMessages;

use App\Filament\Resources\ContactMessages\Pages\ManageContactMessages;
use App\Filament\Support\ResourceKit;
use App\Models\ContactMessage;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $navigationLabel = 'Pesan Masuk';

    protected static ?string $modelLabel = 'Pesan';

    protected static ?string $pluralModelLabel = 'Pesan Masuk';

    protected static ?int $navigationSort = 50;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        $unread = static::getModel()::where('is_read', false)->count();

        return $unread > 0 ? (string) $unread : null;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->label('Nama'),
            TextInput::make('email')->label('Email'),
            TextInput::make('phone')->label('Telepon'),
            TextInput::make('subject')->label('Subjek'),
            Textarea::make('message')->label('Pesan')->rows(6),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('is_read')->label('Dibaca')->boolean(),
                TextColumn::make('name')->label('Nama')->searchable(),
                TextColumn::make('phone')->label('Telepon'),
                TextColumn::make('subject')->label('Subjek')->limit(40),
                TextColumn::make('created_at')->label('Masuk')->dateTime('d M Y H:i')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                ViewAction::make(),
                Action::make('tandaiDibaca')
                    ->label('Tandai dibaca')
                    ->icon(Heroicon::OutlinedCheck)
                    ->visible(fn (ContactMessage $record) => ! $record->is_read)
                    ->action(fn (ContactMessage $record) => $record->update(['is_read' => true])),
                DeleteAction::make(),
            ])
            ->toolbarActions(ResourceKit::toolbarActions());
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageContactMessages::route('/'),
        ];
    }
}