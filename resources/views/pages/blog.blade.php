@use('App\Support\Site')
@extends('layouts.site')

@section('title', 'Blog & News — Ozone Fitness & Aerobic Centre')
@section('description', 'Tips latihan, panduan nutrisi, dan kabar terbaru dari Ozone Fitness & Aerobic Centre.')

@section('content')
<div class="page-banner">
  @if ($img = Site::img($s->banner_blog))
    <img src="{{ $img }}" alt="Blog & Berita">
  @endif
  <div class="overlay"></div>
  <div class="wrap content">
    <h1>Blog &amp; News</h1>
    <p>Tips latihan, panduan nutrisi, dan kabar terbaru dari Ozone Fitness.</p>
  </div>
</div>

<section class="wrap">
  <div class="tabs">
    <a href="{{ route('blog') }}" class="tab-btn {{ $active ? '' : 'active' }}">Semua</a>
    @foreach ($categories as $c)
      <a href="{{ route('blog', ['kategori' => $c->slug]) }}" class="tab-btn {{ $active?->id === $c->id ? 'active' : '' }}">{{ $c->name }}</a>
    @endforeach
  </div>

  <div class="grid grid-3">
    @forelse ($posts as $p)
      <a href="{{ route('blog.show', $p->slug) }}" class="media-card wide blog-card">
        <div class="img-wrap">
          @if ($img = Site::img($p->image))
            <img src="{{ $img }}" alt="{{ $p->title }}" loading="lazy">
          @endif
        </div>
        <div class="body">
          <span class="blog-tag">{{ $p->category?->name }}</span>
          <h3 style="line-height:1.35">{{ $p->title }}</h3>
          <p class="excerpt">{{ $p->excerpt }}</p>
          <div class="blog-meta">
            <span><i data-lucide="user"></i>{{ $p->author }}</span>
            <span><i data-lucide="calendar"></i>{{ $p->published_at->translatedFormat('j F Y') }}</span>
            <span><i data-lucide="clock"></i>{{ Site::readTime($p->content) }}</span>
          </div>
        </div>
      </a>
    @empty
      <p style="color:var(--muted)">Belum ada artikel pada kategori ini.</p>
    @endforelse
  </div>
</section>
@endsection