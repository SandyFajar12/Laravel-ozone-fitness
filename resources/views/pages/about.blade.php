@use('App\Support\Site')
@extends('layouts.site')

@section('title', 'Ozone Fitness & Aerobic Centre — Gym & Aerobik di Padang')

@section('content')
@if ($slides->count())
<section class="hero" id="hero">
  @foreach ($slides as $i => $slide)
    <div class="hero-slide {{ $i === 0 ? 'active' : '' }}" data-title="{{ $slide->title }}" data-sub="{{ $slide->subtitle }}">
      @if ($img = Site::img($slide->image))
        <img src="{{ $img }}" alt="{{ $slide->title }}">
      @endif
      <div class="hero-overlay"></div>
    </div>
  @endforeach
  <div class="hero-content wrap">
    <p class="hero-label">Ozone Fitness &amp; Aerobic Centre</p>
    <h1 class="hero-title" id="hero-title">{{ $slides[0]->title }}</h1>
    <p class="hero-sub" id="hero-sub">{{ $slides[0]->subtitle }}</p>
    <div class="hero-ctas">
      <a href="{{ route('services') }}" class="btn-primary">Lihat Layanan</a>
      <a href="{{ route('contact') }}" class="btn-secondary">Hubungi Kami</a>
    </div>
  </div>
  @if ($slides->count() > 1)
    <button class="hero-arrow prev" id="hero-prev" aria-label="Sebelumnya"><i data-lucide="chevron-left"></i></button>
    <button class="hero-arrow next" id="hero-next" aria-label="Berikutnya"><i data-lucide="chevron-right"></i></button>
    <div class="hero-dots">
      @foreach ($slides as $i => $slide)
        <button class="hero-dot {{ $i === 0 ? 'active' : '' }}" aria-label="Slide {{ $i + 1 }}"></button>
      @endforeach
    </div>
  @endif
</section>
@endif

<section class="wrap" id="benefits-section">
  <p class="eyebrow">Kenapa Ozone?</p>
  <h2 class="h2">Keuntungan Bergabung dengan Ozone Fitness</h2>
  <p class="lead">Lebih dari sekadar gym — kami adalah partner perjalanan sehatmu. Ini yang kamu dapatkan sebagai member Ozone.</p>
  <div class="grid grid-3 grid-3-lg" style="margin-top:3rem">
    @foreach ($benefits as $b)
      <div class="card">
        <span class="icon-badge"><i data-lucide="{{ $b->icon }}" style="width:24px;height:24px"></i></span>
        <h3>{{ $b->title }}</h3>
        <p class="desc">{{ $b->description }}</p>
      </div>
    @endforeach
  </div>
</section>

<section class="team-section">
  <div class="wrap">
    <p class="eyebrow">Our Team</p>
    <h2 class="h2">Kenalan dengan Tim Pelatih Kami</h2>
    <p class="lead">Pelatih andalan Ozone dengan keahlian berbeda, siap membantumu mencapai target fitness.</p>
    <div class="grid grid-3 grid-3-lg" style="margin-top:3rem">
      @foreach ($trainers as $t)
        <div class="media-card">
          <div class="img-wrap">
            @if ($img = Site::img($t->image))
              <img src="{{ $img }}" alt="Foto {{ $t->name }}" loading="lazy">
            @endif
          </div>
          <div class="body">
            <h3>{{ $t->name }}</h3>
            <p class="role">{{ $t->role }}</p>
            <p class="bio">{{ $t->bio }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="split" style="padding:0">
  <div class="split-panel career">
    <span class="icon-badge"><i data-lucide="briefcase" style="width:22px;height:22px"></i></span>
    <h2>Career</h2>
    <p>{{ $s->career_text }}</p>
    <a href="{{ route('contact') }}" class="btn-primary" style="margin-top:2rem">Kirim Lamaran <i data-lucide="arrow-right" style="width:16px;height:16px"></i></a>
  </div>
  <div class="split-panel opportunity">
    <span class="icon-badge"><i data-lucide="trending-up" style="width:22px;height:22px"></i></span>
    <h2>Opportunity</h2>
    <p>{{ $s->opportunity_text }}</p>
    <a href="{{ route('contact') }}" class="btn-secondary" style="margin-top:2rem">Diskusi Peluang <i data-lucide="arrow-right" style="width:16px;height:16px"></i></a>
  </div>
</section>
@endsection

@push('scripts')
<script>
(function () {
  var slides = document.querySelectorAll('.hero-slide');
  if (slides.length < 2) return;
  var dots = document.querySelectorAll('.hero-dot');
  var title = document.getElementById('hero-title');
  var sub = document.getElementById('hero-sub');
  var idx = 0, timer;

  function setSlide(i) {
    idx = (i + slides.length) % slides.length;
    slides.forEach(function (s, j) { s.classList.toggle('active', j === idx); });
    dots.forEach(function (d, j) { d.classList.toggle('active', j === idx); });
    title.textContent = slides[idx].dataset.title;
    sub.textContent = slides[idx].dataset.sub || '';
  }
  function start() {
    clearInterval(timer);
    timer = setInterval(function () { setSlide(idx + 1); }, 6000);
  }

  document.getElementById('hero-prev').onclick = function () { setSlide(idx - 1); start(); };
  document.getElementById('hero-next').onclick = function () { setSlide(idx + 1); start(); };
  dots.forEach(function (d, j) { d.onclick = function () { setSlide(j); start(); }; });
  setSlide(0);
  start();
})();
</script>
@endpush