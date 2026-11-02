<?php

namespace App\Support;

class Site
{
    // Foto: link penuh (Unsplash) dipakai apa adanya, selain itu diambil dari public/uploads
    public static function img(?string $path): string
    {
        if (blank($path)) {
            return '';
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        return asset('uploads/' . ltrim($path, '/'));
    }

    public static function wa(?string $number, string $message = ''): string
    {
        $n = preg_replace('/\D+/', '', (string) $number);

        if (str_starts_with($n, '0')) {
            $n = '62' . substr($n, 1);
        }

        return 'https://wa.me/' . $n . ($message !== '' ? '?text=' . rawurlencode($message) : '');
    }

    public static function rupiah(int|string|null $n): string
    {
        return 'Rp ' . number_format((int) $n, 0, ',', '.');
    }

    public static function readTime(string $content): string
    {
        $words = count(preg_split('/\s+/', trim($content), -1, PREG_SPLIT_NO_EMPTY));

        return max(1, (int) round($words / 180)) . ' menit baca';
    }

    public static function paragraphs(string $content): array
    {
        return array_values(array_filter(preg_split('/\n+/', $content), fn ($p) => trim($p) !== ''));
    }

    public static function mapUrl(?string $address): string
    {
        return 'https://maps.google.com/maps?q=' . urlencode((string) $address) . '&t=&z=16&ie=UTF8&iwloc=&output=embed';
    }
}