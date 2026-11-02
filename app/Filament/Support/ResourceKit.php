<?php

namespace App\Filament\Support;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ToggleColumn;

class ResourceKit
{
    public static function recordActions(): array
    {
        return [EditAction::make(), DeleteAction::make()];
    }

    public static function toolbarActions(): array
    {
        return [BulkActionGroup::make([DeleteBulkAction::make()])];
    }

    public static function aktifColumn(): ToggleColumn
    {
        return ToggleColumn::make('aktif')->label('Tampil');
    }

    public static function orderFields(): array
    {
        return [
            TextInput::make('urutan')
                ->label('Urutan')
                ->numeric()
                ->default(0)
                ->helperText('Angka kecil tampil lebih dulu. Bisa juga diatur dengan tombol urutkan di daftar.'),
            Toggle::make('aktif')
                ->label('Tampilkan di website')
                ->default(true),
        ];
    }

    public static function typeOptions(): array
    {
        return [
            'membership' => 'Membership',
            'trainer'    => 'Personal Trainer',
        ];
    }

    public static function iconOptions(): array
    {
        return [
            'dumbbell'     => 'Dumbbell (alat beban)',
            'users'        => 'Orang / komunitas',
            'heart-pulse'  => 'Detak jantung',
            'wallet'       => 'Dompet / harga',
            'sparkles'     => 'Bersih / berkilau',
            'clock'        => 'Jam / waktu',
            'music'        => 'Musik',
            'circle-dot'   => 'Target / core',
            'flame'        => 'Api / bakar kalori',
            'zap'          => 'Petir / energi',
            'activity'     => 'Aktivitas',
            'shield-check' => 'Keamanan',
            'trophy'       => 'Piala',
            'star'         => 'Bintang',
            'heart'        => 'Hati',
            'timer'        => 'Timer',
        ];
    }
}