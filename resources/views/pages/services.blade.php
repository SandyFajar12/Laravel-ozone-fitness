@use('App\Support\Site')
@extends('layouts.site')

@section('title', 'Our Service — Membership & Personal Trainer | Ozone Fitness')
@section('description', 'Paket membership dan personal trainer di Ozone Fitness & Aerobic Centre, Padang.')

@section('content')
<div class="page-banner">
  @if ($img = Site::img($s->banner_services))
    <img src="{{ $img }}" alt="Layanan Kami">
  @endif
  <div class="overlay"></div>
  <div class="wrap content">
    <h1>Our Service</h1>
    <p>Dua layanan utama kami: Membership untuk kebebasan berlatih, dan Personal Trainer untuk hasil maksimal.</p>
  </div>
</div>

<section class="wrap">
  <p class="lead" style="max-width:48rem">Di Ozone Fitness &amp; Aerobic Centre, kami percaya setiap orang punya kebutuhan latihan yang berbeda. Karena itu layanan kami terbagi menjadi dua: <strong style="color:var(--text)">Membership</strong> untuk kamu yang ingin kebebasan berlatih kapan saja, dan <strong style="color:var(--text)">Personal Trainer</strong> untuk kamu yang ingin dibimbing intensif menuju target spesifik.</p>

  <div class="grid grid-2" style="margin-top:3.5rem">
    <div class="service-panel">
      <span class="icon-badge"><i data-lucide="id-card" style="width:28px;height:28px"></i></span>
      <h2 style="font-size:1.6rem;font-weight:700">Membership</h2>
      <p class="desc" style="font-size:.95rem;margin-top:1rem">Satu kartu member untuk semua: akses penuh area gym, semua kelas grup, dan fasilitas penunjang. Pilih paket sesuai komitmenmu — makin panjang paketnya, makin hemat.</p>
      <ul class="benefit-list">
        @foreach ($benefits['membership'] ?? [] as $b)
          <li><i data-lucide="check"></i>{{ $b->text }}</li>
        @endforeach
      </ul>
      @foreach ($plans['membership'] ?? [] as $p)
        <div class="plan-row"><div><p class="name">{{ $p->name }}</p><p class="note">{{ $p->note }}</p></div><p class="price">{{ Site::rupiah($p->price) }}</p></div>
      @endforeach
      <a href="{{ route('contact') }}" class="btn-primary" style="margin-top:2rem">Daftar Member <i data-lucide="arrow-right" style="width:16px;height:16px"></i></a>
    </div>

    <div class="service-panel dark">
      <span class="icon-badge"><i data-lucide="user-check" style="width:28px;height:28px"></i></span>
      <h2 style="font-size:1.6rem;font-weight:700">Personal Trainer</h2>
      <p class="desc" style="font-size:.95rem;margin-top:1rem">Latihan 1-on-1 bersama trainer bersertifikat di zona private training. Cocok untuk pemula yang butuh arahan, atau kamu dengan target spesifik seperti turun berat badan, membentuk otot, atau pemulihan pasca cedera.</p>
      <ul class="benefit-list">
        @foreach ($benefits['trainer'] ?? [] as $b)
          <li><i data-lucide="check"></i>{{ $b->text }}</li>
        @endforeach
      </ul>
      @foreach ($plans['trainer'] ?? [] as $p)
        <div class="plan-row"><div><p class="name">{{ $p->name }}</p><p class="note">{{ $p->note }}</p></div><p class="price">{{ Site::rupiah($p->price) }}</p></div>
      @endforeach
      <a href="{{ route('contact') }}" class="btn-secondary" style="margin-top:2rem">Konsultasi Gratis <i data-lucide="arrow-right" style="width:16px;height:16px"></i></a>
    </div>
  </div>
  <p style="margin-top:1.5rem;font-size:.75rem;color:var(--muted)">* Harga di atas dapat berubah. Hubungi kami di {{ $s->phone }} untuk info harga terbaru.</p>
</section>
@endsection