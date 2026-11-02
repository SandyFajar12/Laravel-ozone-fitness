<?php

namespace App\Filament\Support;

use Filament\Forms\Components\FileUpload;

class ImageField
{
    public static function make(string $name, string $directory, string $label = 'Foto'): FileUpload
    {
        return FileUpload::make($name)
            ->label($label)
            ->image()
            ->disk('uploads')
            ->directory($directory)
            ->visibility('public')
            ->maxSize(8192)
            ->imageResizeMode('contain')
            ->imageResizeTargetWidth('1600')
            ->imageResizeTargetHeight('1600')
            // Kalau kosong (misalnya foto sementara Unsplash), jangan menimpa isi database
            ->dehydrated(fn ($state): bool => filled($state))
            ->helperText('JPG/PNG/WebP. Foto besar otomatis diperkecil. Kosongkan jika tidak ingin mengganti.');
    }
}