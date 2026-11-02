<?php

namespace App\Filament\Pages;

use App\Filament\Support\ImageField;
use App\Models\SiteSetting;
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class Pengaturan extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Pengaturan';

    protected static ?string $title = 'Pengaturan Website';

    protected static ?int $navigationSort = 100;

    protected string $view = 'filament.pages.pengaturan';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(SiteSetting::allAsArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Pengaturan')
                    ->tabs([
                        Tab::make('Kontak')->schema([
                            TextInput::make('phone')->label('Nomor telepon'),
                            TextInput::make('whatsapp_number')
                                ->label('Nomor WhatsApp')
                                ->helperText('Boleh ditulis 0812..., otomatis diubah ke format 62812...'),
                            Textarea::make('address')
                                ->label('Alamat')
                                ->rows(3)
                                ->helperText('Peta di halaman Contact dibuat otomatis dari alamat ini.'),
                            TextInput::make('hours_weekday')->label('Jam buka Senin - Sabtu'),
                            TextInput::make('hours_sunday')->label('Jam buka Minggu'),
                        ]),

                        Tab::make('Footer')->schema([
                            Textarea::make('footer_description')->label('Deskripsi singkat di footer')->rows(3),
                            TextInput::make('instagram_url')->label('Link Instagram')->url(),
                            TextInput::make('facebook_url')->label('Link Facebook')->url()
                                ->helperText('Kosongkan jika tidak ada, ikonnya otomatis tidak tampil.'),
                            TextInput::make('tiktok_url')->label('Link TikTok')->url()
                                ->helperText('Kosongkan jika tidak ada, ikonnya otomatis tidak tampil.'),
                        ]),

                        Tab::make('Teks Halaman')->schema([
                            Textarea::make('career_text')->label('Teks Career')->rows(4),
                            Textarea::make('opportunity_text')->label('Teks Opportunity')->rows(4),
                            TextInput::make('private_title')->label('Judul Zona Private Training'),
                            Textarea::make('private_text')->label('Teks Zona Private Training')->rows(5),
                            ImageField::make('private_image', 'pages', 'Foto Zona Private Training (opsional)'),
                        ]),

                        Tab::make('Foto Banner')->schema([
                            ImageField::make('banner_facilities', 'banners', 'Banner Fasilitas & Kelas'),
                            ImageField::make('banner_services', 'banners', 'Banner Our Service'),
                            ImageField::make('banner_blog', 'banners', 'Banner Blog & News'),
                            ImageField::make('banner_contact', 'banners', 'Banner Hubungi Kami'),
                        ]),

                        Tab::make('Linktree')->schema([
                            TextInput::make('gym_name')->label('Nama gym'),
                            TextInput::make('links_tagline')->label('Kalimat singkat'),
                            TextInput::make('website_url')
                                ->label('Link tombol website')
                                ->url()
                                ->helperText('Kosongkan untuk mengarah ke halaman utama website.'),
                            TextInput::make('website_label')->label('Tulisan tombol website'),
                            Textarea::make('whatsapp_message')
                                ->label('Pesan otomatis WhatsApp')
                                ->rows(2),
                            TextInput::make('whatsapp_label')->label('Tulisan tombol WhatsApp'),
                        ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value ?? '']);
        }

        Notification::make()
            ->title('Pengaturan tersimpan')
            ->success()
            ->send();
    }
}