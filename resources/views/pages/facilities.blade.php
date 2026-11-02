@use('App\Support\Site')
@extends('layouts.site')

@section('title', 'Fasilitas & Kelas — Ozone Fitness & Aerobic Centre')
@section('description', 'Peralatan fitness modern dan kelas grup bervariasi di Ozone Fitness & Aerobic Centre, Padang.')

@section('content')
<div class="page-banner">
  @if ($img = Site::img($s->banner_facilities))
    <img src="{{ $img }}" alt="Fasilitas & Kelas">
  @endif
  <div class="overlay"></div>
  <div class="wrap content">
    <h1>Fasilitas &amp; Kelas Kami</h1>
    <p>Peralatan modern dan kelas bervariasi untuk semua level, dari pemula hingga atlet.</p>
  </div>
</div>

<section class="wrap">
  <p class="eyebrow">Fasilitas</p>
  <h2 class="h2">Peralatan Lengkap untuk Setiap Target Latihan</h2>
  <p class="lead">Ozone Fitness &amp; Aerobic Centre dilengkapi alat-alat modern yang dirawat rutin. Setiap zona dirancang untuk fungsi latihan yang berbeda — mulai dari pemanasan kardio, pembentukan otot dengan beban bebas, hingga latihan terpandu dengan mesin.</p>
  <div class="grid grid-3" style="margin-top:3rem">
    @foreach ($facilities as $f)
      <div class="media-card wide">
        <div class="img-wrap">
          @if ($img = Site::img($f->image))
            <img src="{{ $img }}" alt="{{ $f->title }}" loading="lazy">
          @endif
        </div>
        <div class="body"><h3>{{ $f->title }}</h3><p class="desc">{{ $f->description }}</p></div>
      </div>
    @endforeach
  </div>

  <div class="private-panel">
    @if ($img = Site::img($s->private_image))
      <img src="{{ $img }}" alt="{{ $s->private_title }}" style="width:100%;max-width:280px;aspect-ratio:4/3;object-fit:cover;border-radius:.6rem" loading="lazy">
    @else
      <span class="icon-badge" style="padding:1rem"><i data-lucide="user-check" style="width:32px;height:32px"></i></span>
    @endif
    <div style="flex:1">
      <h3 style="font-size:1.3rem;font-weight:600">{{ $s->private_title }}</h3>
      <p class="desc" style="margin-top:.7rem">{{ $s->private_text }}</p>
    </div>
    <a href="{{ route('services') }}" class="btn-primary">Lihat Paket Trainer</a>
  </div>
</section>

<section style="background:rgba(2,6,23,.6);border-top:1px solid #1e293b">
  <div class="wrap">
    <p class="eyebrow">Classes</p>
    <h2 class="h2">Pilihan Kelas Grup</h2>
    <p class="lead">Semua kelas sudah termasuk dalam membership — dipandu instruktur bersertifikat dengan suasana yang seru.</p>
    <div class="grid grid-3 grid-3-lg" style="margin-top:3rem">
      @foreach ($classes as $c)
        <div class="card">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem">
            <span class="icon-badge" style="margin-bottom:0"><i data-lucide="{{ $c->icon }}" style="width:22px;height:22px"></i></span>
            <span class="badge-level badge-{{ strtolower($c->intensity) }}">{{ $c->intensity }}</span>
          </div>
          <h3>{{ $c->name }}</h3>
          <p class="class-schedule">{{ $c->schedule }}</p>
          <p class="desc">{{ $c->description }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection