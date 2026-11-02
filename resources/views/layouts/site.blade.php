<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Ozone Fitness & Aerobic Centre')</title>
<meta name="description" content="@yield('description', 'Pusat kebugaran dan aerobik modern di Kota Padang. Alat lengkap, pelatih bersertifikat, kelas aerobik setiap hari.')">
<link rel="canonical" href="{{ url()->current() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>
<link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body data-nav-solid="@yield('nav_solid')">

<header class="nav" id="navbar">
  <div class="wrap nav-inner">
    <a href="{{ route('about') }}" class="logo">
      <span class="logo-badge"><i data-lucide="dumbbell" style="width:22px;height:22px"></i></span>
      <span class="logo-text">OZONE <span class="accent">FITNESS</span><span class="logo-sub">&amp; Aerobic Centre</span></span>
    </a>
    <nav class="links">
      @foreach ([['about', 'About Us'], ['facilities', 'Facilities & Classes'], ['services', 'Our Service'], ['blog', 'Blog & News']] as [$r, $label])
        <a href="{{ route($r) }}" class="{{ request()->routeIs($r . '*') ? 'active' : '' }}">{{ $label }}</a>
      @endforeach
      <a href="{{ route('contact') }}" class="nav-contact {{ request()->routeIs('contact*') ? 'active' : '' }}">Contact</a>
    </nav>
    <button class="mobile-toggle" id="mobile-toggle" aria-label="Buka menu">
      <i data-lucide="menu"></i>
    </button>
  </div>
  <div class="mobile-menu" id="mobile-menu">
    @foreach ([['about', 'About Us'], ['facilities', 'Facilities & Classes'], ['services', 'Our Service'], ['blog', 'Blog & News'], ['contact', 'Contact']] as [$r, $label])
      <a href="{{ route($r) }}" class="{{ request()->routeIs($r . '*') ? 'active' : '' }}">{{ $label }}</a>
    @endforeach
  </div>
</header>

@yield('content')

<footer>
  <div class="wrap footer-grid">
    <div>
      <div class="logo">
        <span class="logo-badge"><i data-lucide="dumbbell" style="width:20px;height:20px"></i></span>
        <span class="logo-text">OZONE <span class="accent">FITNESS</span></span>
      </div>
      <p class="footer-desc">{{ $s->footer_description }}</p>
      @if ($s->instagram_url || $s->facebook_url || $s->tiktok_url)
        <div class="footer-socials">
          @if ($s->instagram_url)<a href="{{ $s->instagram_url }}" target="_blank" rel="noopener" aria-label="Instagram">Instagram</a>@endif
          @if ($s->facebook_url)<a href="{{ $s->facebook_url }}" target="_blank" rel="noopener" aria-label="Facebook">Facebook</a>@endif
          @if ($s->tiktok_url)<a href="{{ $s->tiktok_url }}" target="_blank" rel="noopener" aria-label="TikTok">TikTok</a>@endif
        </div>
      @endif
    </div>
    <div>
      <h3 class="footer-h">Kontak Kami</h3>
      <ul class="footer-list">
        <li><i data-lucide="phone"></i><a href="tel:{{ $s->phone }}">{{ $s->phone }}</a></li>
        <li><i data-lucide="map-pin"></i><span>{{ $s->address }}</span></li>
        <li><i data-lucide="clock"></i><span>{{ $s->hours_weekday }}<br>{{ $s->hours_sunday }}</span></li>
      </ul>
    </div>
    <div>
      <h3 class="footer-h">Menu</h3>
      <ul class="footer-list">
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ route('facilities') }}">Facilities &amp; Classes</a></li>
        <li><a href="{{ route('services') }}">Our Service</a></li>
        <li><a href="{{ route('blog') }}">Blog &amp; News</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">© {{ date('Y') }} Ozone Fitness &amp; Aerobic Centre. All rights reserved.</div>
</footer>

<script>
  const navbar = document.getElementById('navbar');
  const keepSolid = document.body.dataset.navSolid === '1';
  function onScroll() {
    navbar.classList.toggle('solid', keepSolid || window.scrollY > 40);
  }
  window.addEventListener('scroll', onScroll);
  onScroll();

  const mobileMenu = document.getElementById('mobile-menu');
  document.getElementById('mobile-toggle').addEventListener('click', function () {
    mobileMenu.style.display = mobileMenu.style.display === 'block' ? 'none' : 'block';
  });

  if (window.lucide) { lucide.createIcons(); }
</script>
@stack('scripts')
</body>
</html>