<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'gym_name'         => 'Ozone Fitness & Aerobic Centre',
            'links_tagline'    => 'Pusat kebugaran dan aerobik modern di Kota Padang',
            'website_url'      => '',
            'website_label'    => 'Kunjungi Website',
            'whatsapp_number'  => '08126155592',
            'whatsapp_message' => 'Halo Ozone, saya mau tanya soal membership',
            'whatsapp_label'   => 'Chat via WhatsApp',

            // Kontak
            'phone'              => '08126155592',
            'address'            => 'Jalan Gg. Sakinah, Jl. Ketaping, Pasar Ambacang, Kuranji, Kota Padang, Sumatera Barat 25176',
            'hours_weekday'      => 'Senin - Sabtu: 06.00 - 21.00 WIB',
            'hours_sunday'       => 'Minggu: 08.00 - 17.00 WIB',

            // Footer
            'footer_description' => 'Pusat kebugaran dan aerobik modern di Kota Padang. Bangun versi terbaik dari dirimu bersama pelatih profesional dan komunitas yang suportif.',
            'instagram_url'      => 'https://www.instagram.com/ozone_padang',
            'facebook_url'       => '',
            'tiktok_url'         => '',

            // Teks halaman
            'career_text'        => 'Bergabunglah dengan tim Ozone Fitness & Aerobic Centre. Kami membuka kesempatan berkarir sebagai pelatih, instruktur kelas, hingga staf operasional bagi kamu yang bersemangat di dunia fitness dan ingin tumbuh bersama kami.',
            'opportunity_text'   => 'Ozone terus berkembang dan membuka peluang kemitraan serta kolaborasi — dari program corporate wellness, sponsorship event olahraga, hingga kerja sama komunitas fitness di Kota Padang dan sekitarnya.',
            'private_title'      => 'Zona Private Training',
            'private_text'       => 'Area khusus untuk sesi latihan 1-on-1 bersama personal trainer. Lebih fokus, lebih privat, dan program latihan sepenuhnya disesuaikan dengan kondisi serta target tubuhmu — cocok untuk pemula yang butuh bimbingan intensif maupun yang punya target spesifik seperti penurunan berat badan atau pembentukan otot.',
            'private_image'      => '',

            // Foto banner
            'banner_facilities'  => 'https://images.unsplash.com/photo-1761971974992-6df33df97c3a?crop=entropy&cs=srgb&fm=jpg&q=85',
            'banner_services'    => 'https://images.unsplash.com/photo-1554284126-aa88f22d8b74?crop=entropy&cs=srgb&fm=jpg&q=85',
            'banner_blog'        => 'https://images.unsplash.com/photo-1723117418183-2422c62a5a75?crop=entropy&cs=srgb&fm=jpg&q=85',
            'banner_contact'     => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?crop=entropy&cs=srgb&fm=jpg&q=85',
        ];

        foreach ($defaults as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}