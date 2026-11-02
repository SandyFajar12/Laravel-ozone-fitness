<?php

namespace Database\Seeders;

use App\Models\Benefit;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Facility;
use App\Models\GymClass;
use App\Models\HeroSlide;
use App\Models\ServiceBenefit;
use App\Models\ServicePlan;
use App\Models\Trainer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Hanya jalan sekali, supaya data yang sudah diedit tidak tertimpa
        if (HeroSlide::exists()) {
            return;
        }

        // Foto sementara dari Unsplash, nanti diganti foto asli lewat admin
        $u = fn (string $id) => "https://images.unsplash.com/{$id}?crop=entropy&cs=srgb&fm=jpg&q=85";

        $seed = function (string $model, array $rows) {
            foreach ($rows as $i => $row) {
                $model::create($row + ['urutan' => $i + 1]);
            }
        };

        $seed(HeroSlide::class, [
            ['image' => $u('photo-1554284126-aa88f22d8b74'), 'title' => 'Bangun Kekuatan & Kepercayaan Dirimu', 'subtitle' => 'Latihan beban terpandu bersama pelatih profesional Ozone'],
            ['image' => $u('photo-1723117418183-2422c62a5a75'), 'title' => 'Energi Tanpa Batas di Kelas Aerobik', 'subtitle' => 'Bakar kalori dengan irama musik yang menyenangkan'],
            ['image' => $u('photo-1518611012118-696072aa579a'), 'title' => 'Fasilitas Modern & Komunitas Solid', 'subtitle' => 'Lingkungan latihan yang nyaman di jantung Kota Padang'],
        ]);

        $seed(Benefit::class, [
            ['icon' => 'dumbbell', 'title' => 'Alat Modern & Lengkap', 'description' => 'Peralatan fitness terkini dari cardio, free weight, hingga mesin resistance untuk semua level latihan.'],
            ['icon' => 'users', 'title' => 'Pelatih Bersertifikat', 'description' => 'Didampingi trainer profesional berpengalaman yang siap membimbing teknik dan program latihanmu.'],
            ['icon' => 'heart-pulse', 'title' => 'Kelas Aerobik Setiap Hari', 'description' => 'Beragam kelas grup seperti aerobik, zumba, dan HIIT dengan instruktur energik dan musik pilihan.'],
            ['icon' => 'wallet', 'title' => 'Harga Terjangkau', 'description' => 'Paket membership fleksibel dan ramah kantong, dari bulanan hingga tahunan dengan benefit maksimal.'],
            ['icon' => 'sparkles', 'title' => 'Fasilitas Bersih & Nyaman', 'description' => 'Ruang latihan ber-AC, loker pribadi, kamar mandi bersih, dan area istirahat yang nyaman.'],
            ['icon' => 'clock', 'title' => 'Jam Operasional Fleksibel', 'description' => 'Buka dari pagi hingga malam hari, menyesuaikan jadwal sibukmu sebelum atau sesudah beraktivitas.'],
        ]);

        $seed(Trainer::class, [
            ['name' => 'Budi Santoso', 'role' => 'Head Strength & Conditioning Coach', 'bio' => 'Spesialis pembentukan otot dan strength training dengan pengalaman lebih dari 8 tahun. Ahli menyusun program latihan yang aman sekaligus menantang, termasuk pendampingan rehabilitasi cedera.', 'image' => $u('photo-1584466977773-e625c37cdd50')],
            ['name' => 'Siti Rahmawati', 'role' => 'Aerobic & Functional Fitness Master', 'bio' => 'Instruktur aerobik tersertifikasi internasional yang dikenal energik. Kelasnya selalu penuh semangat dan terbukti efektif membakar kalori dengan gerakan yang mudah diikuti semua usia.', 'image' => $u('photo-1571019614242-c5c5dee9f50b')],
            ['name' => 'Andi Wijaya', 'role' => 'Personal Trainer & Nutrition Specialist', 'bio' => 'Pakar transformasi tubuh dan nutrisi. Menggabungkan latihan terukur dengan panduan pola makan berkelanjutan untuk hasil yang nyata dan tahan lama.', 'image' => $u('photo-1519311965067-36d3e5f33d39')],
        ]);

        $seed(Facility::class, [
            ['title' => 'Area Kardio Premium', 'image' => $u('photo-1761971974992-6df33df97c3a'), 'description' => 'Deretan treadmill, exercise bike, dan elliptical modern dengan layar monitor detak jantung. Berfungsi melatih jantung, membakar kalori, dan meningkatkan stamina sebelum latihan beban.'],
            ['title' => 'Zona Free Weight Lengkap', 'image' => $u('photo-1775993703558-e7afab02b7bd'), 'description' => 'Dumbbell dari bobot ringan hingga berat, barbell, dan bench press. Berfungsi membangun massa otot dan kekuatan dengan gerakan bebas yang melatih otot stabilisator.'],
            ['title' => 'Mesin Resistance & Isolation', 'image' => $u('photo-1761971975769-97e598bf526b'), 'description' => 'Mesin cable, leg press, lat pulldown, dan chest press dengan jalur gerak terpandu. Ideal untuk pemula karena aman, dan efektif melatih otot secara terisolasi.'],
        ]);

        $seed(GymClass::class, [
            ['name' => 'Aerobic', 'icon' => 'music', 'schedule' => 'Senin, Rabu, Jumat — 17.00 & 19.00', 'intensity' => 'Sedang', 'description' => 'Latihan kardio ritmis dengan iringan musik energik. Membakar kalori, memperkuat jantung, dan menyenangkan untuk semua usia.'],
            ['name' => 'Core Workout', 'icon' => 'circle-dot', 'schedule' => 'Selasa & Kamis — 18.00', 'intensity' => 'Sedang', 'description' => 'Fokus melatih otot perut, punggung bawah, dan panggul. Membentuk postur tubuh yang kuat dan perut lebih kencang.'],
            ['name' => 'Zumba', 'icon' => 'flame', 'schedule' => 'Sabtu — 08.00', 'intensity' => 'Ringan', 'description' => 'Perpaduan tarian latin dan fitness. Gerakan mudah diikuti, cocok untuk pemula yang ingin olahraga sambil bersenang-senang.'],
            ['name' => 'HIIT', 'icon' => 'zap', 'schedule' => 'Selasa & Sabtu — 19.00', 'intensity' => 'Tinggi', 'description' => 'High Intensity Interval Training: latihan singkat intensitas tinggi untuk pembakaran lemak maksimal dalam waktu efisien.'],
            ['name' => 'Body Pump', 'icon' => 'activity', 'schedule' => 'Kamis — 19.00 & Minggu — 09.00', 'intensity' => 'Tinggi', 'description' => 'Latihan beban barbell ringan dengan repetisi tinggi berirama musik. Membentuk dan mengencangkan seluruh otot tubuh.'],
        ]);

        $seed(ServiceBenefit::class, [
            ['type' => 'membership', 'text' => 'Akses penuh semua alat gym setiap hari'],
            ['type' => 'membership', 'text' => 'Gratis semua kelas grup: aerobik, zumba, HIIT, dan lainnya'],
            ['type' => 'membership', 'text' => 'Loker pribadi dan fasilitas kamar mandi'],
            ['type' => 'membership', 'text' => 'Konsultasi program latihan awal bersama trainer'],
            ['type' => 'membership', 'text' => 'Jam operasional fleksibel pagi hingga malam'],
            ['type' => 'trainer', 'text' => 'Program latihan 100% disesuaikan target tubuhmu'],
            ['type' => 'trainer', 'text' => 'Pendampingan teknik 1-on-1 agar aman dari cedera'],
            ['type' => 'trainer', 'text' => 'Panduan nutrisi dan meal plan personal'],
            ['type' => 'trainer', 'text' => 'Evaluasi progres berkala dengan pengukuran tubuh'],
            ['type' => 'trainer', 'text' => 'Motivasi dan akuntabilitas agar tetap konsisten'],
        ]);

        $seed(ServicePlan::class, [
            ['type' => 'membership', 'name' => 'Bulanan', 'price' => 150000, 'note' => 'per bulan'],
            ['type' => 'membership', 'name' => '3 Bulan', 'price' => 400000, 'note' => 'hemat Rp 50.000'],
            ['type' => 'membership', 'name' => 'Tahunan', 'price' => 1400000, 'note' => 'hemat Rp 400.000'],
            ['type' => 'trainer', 'name' => 'Per Sesi', 'price' => 100000, 'note' => 'coba dulu 1 sesi'],
            ['type' => 'trainer', 'name' => '10 Sesi', 'price' => 850000, 'note' => 'hemat Rp 150.000'],
            ['type' => 'trainer', 'name' => '20 Sesi', 'price' => 1500000, 'note' => 'hemat Rp 500.000'],
        ]);

        $names = ['Nutrisi', 'Latihan', 'Tips Kesehatan', 'Event'];
        $seed(BlogCategory::class, array_map(fn ($n) => ['name' => $n, 'slug' => Str::slug($n)], $names));
        $cat = BlogCategory::pluck('id', 'name');

        $posts = [
            [
                'category' => 'Tips Kesehatan', 'title' => '5 Tips Memulai Latihan Gym untuk Pemula', 'author' => 'Tim Ozone',
                'published_at' => '2026-08-02', 'image' => $u('photo-1554284126-aa88f22d8b74'),
                'excerpt' => 'Baru pertama kali ke gym? Simak 5 tips penting agar latihan pertamamu aman, efektif, dan menyenangkan.',
                'content' => "Memulai latihan di gym bisa terasa menantang, tapi dengan persiapan yang tepat semuanya jadi lebih mudah.\n\nPertama, mulailah dengan pemanasan 5-10 menit untuk menyiapkan otot dan sendi. Kedua, fokus pada teknik yang benar sebelum menambah beban. Ketiga, susun jadwal latihan yang realistis, misalnya 3 kali seminggu. Keempat, jangan lupa istirahat dan tidur yang cukup karena otot tumbuh saat recovery. Kelima, manfaatkan pelatih kami di Ozone Fitness untuk membimbingmu.\n\nIngat, konsistensi lebih penting daripada intensitas. Sampai jumpa di lantai gym!",
            ],
            [
                'category' => 'Latihan', 'title' => 'Manfaat Aerobik untuk Kesehatan Jantung', 'author' => 'Siti Rahmawati',
                'published_at' => '2026-08-10', 'image' => $u('photo-1723117418183-2422c62a5a75'),
                'excerpt' => 'Kelas aerobik bukan hanya seru, tapi juga sangat bermanfaat untuk jantung dan stamina tubuh Anda.',
                'content' => "Aerobik adalah latihan kardiovaskular yang melibatkan gerakan ritmis dengan iringan musik.\n\nLatihan aerobik rutin terbukti memperkuat otot jantung, memperlancar peredaran darah, dan menurunkan tekanan darah. Selain itu, aerobik membantu membakar kalori secara efektif sehingga mendukung program penurunan berat badan.\n\nDi Ozone Fitness & Aerobic Centre, kelas aerobik dipandu instruktur bersertifikat dengan musik energik yang membuat Anda tidak terasa sudah berolahraga satu jam penuh. Yuk gabung kelas aerobik kami!",
            ],
            [
                'category' => 'Nutrisi', 'title' => 'Panduan Nutrisi Sebelum dan Sesudah Latihan', 'author' => 'Andi Wijaya',
                'published_at' => '2026-08-18', 'image' => $u('photo-1761971974992-6df33df97c3a'),
                'excerpt' => 'Asupan yang tepat sebelum dan sesudah latihan sangat menentukan hasil latihan Anda. Berikut panduannya.',
                'content' => "Nutrisi adalah separuh dari keberhasilan program fitness Anda.\n\nSebelum latihan, konsumsi karbohidrat kompleks seperti oat atau roti gandum 1-2 jam sebelumnya untuk energi maksimal. Hindari makanan berlemak tinggi yang sulit dicerna.\n\nSesudah latihan, tubuh membutuhkan protein untuk memperbaiki jaringan otot. Konsumsi sumber protein seperti ayam, telur, atau protein shake dalam 30-60 menit setelah latihan. Jangan lupa hidrasi yang cukup sepanjang hari.\n\nButuh panduan nutrisi personal? Personal trainer kami siap menyusun meal plan sesuai target Anda.",
            ],
            [
                'category' => 'Event', 'title' => 'Promo Member Baru Ozone Fitness Bulan Ini', 'author' => 'Tim Ozone',
                'published_at' => '2026-08-25', 'image' => $u('photo-1518611012118-696072aa579a'),
                'excerpt' => 'Kabar gembira! Dapatkan diskon pendaftaran member baru dan gratis 1 sesi personal trainer bulan ini.',
                'content' => "Ozone Fitness & Aerobic Centre mengadakan promo spesial untuk member baru!\n\nSetiap pendaftaran membership baru bulan ini mendapatkan diskon biaya pendaftaran dan gratis 1 sesi konsultasi dengan personal trainer kami. Promo berlaku untuk semua paket membership, baik bulanan maupun tahunan.\n\nKunjungi langsung gym kami di Jalan Gg. Sakinah, Jl. Ketaping, Pasar Ambacang, Kuranji, Kota Padang atau hubungi 08126155592 untuk informasi lebih lanjut. Kuota promo terbatas, jangan sampai kehabisan!",
            ],
        ];

        foreach ($posts as $p) {
            BlogPost::create([
                'blog_category_id' => $cat[$p['category']],
                'title'            => $p['title'],
                'slug'             => Str::slug($p['title']),
                'author'           => $p['author'],
                'published_at'     => $p['published_at'],
                'image'            => $p['image'],
                'excerpt'          => $p['excerpt'],
                'content'          => $p['content'],
            ]);
        }
    }
}