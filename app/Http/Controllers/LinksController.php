<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;

class LinksController extends Controller
{
    public function index()
    {
        $s = SiteSetting::allAsArray();

        // Rapikan nomor: buang selain angka, awalan 0 diganti 62
        $number = preg_replace('/\D+/', '', $s['whatsapp_number'] ?? '');
        if (str_starts_with($number, '0')) {
            $number = '62' . substr($number, 1);
        }

        $waUrl = 'https://wa.me/' . $number . '?text=' . rawurlencode($s['whatsapp_message'] ?? '');

        return view('links', [
            'gymName'      => $s['gym_name'] ?? 'Ozone Fitness & Aerobic Centre',
            'tagline'      => $s['links_tagline'] ?? '',
            'websiteUrl'   => ($s['website_url'] ?? '') ?: url('/'),
            'websiteLabel' => $s['website_label'] ?? 'Kunjungi Website',
            'waUrl'        => $waUrl,
            'waLabel'      => $s['whatsapp_label'] ?? 'Chat via WhatsApp',
        ]);
    }
}