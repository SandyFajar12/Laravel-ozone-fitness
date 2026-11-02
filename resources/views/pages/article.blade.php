@use('App\Support\Site')
@extends('layouts.site')

@section('title', $post->title . ' — Ozone Fitness')
@section('description', $post->excerpt)
@section('nav_solid', '1')

@section('content')
@php $img = Site::img($post->image); @endphp
<div class="article-page">
  <article class="article-modal">
    @if ($img)
      <div class="article-hero">
        <img src="{{ $img }}" alt="{{ $post->title }}">
        <div class="overlay"></div>
      </div>
    @endif
    <div class="article-body-card" @if (! $img) style="margin-top:0" @endif>
      <a href="{{ route('blog') }}" class="back-link"><i data-lucide="arrow-left" style="width:16px;height:16px"></i> Kembali ke Blog</a>
      <span class="blog-tag">{{ $post->category?->name }}</span>
      <h1 class="article-title">{{ $post->title }}</h1>
      <div class="blog-meta" style="border:none;padding-top:.75rem;margin-top:.75rem">
        <span><i data-lucide="user"></i>{{ $post->author }}</span>
        <span><i data-lucide="calendar"></i>{{ $post->published_at->translatedFormat('j F Y') }}</span>
        <span><i data-lucide="clock"></i>{{ Site::readTime($post->content) }}</span>
      </div>
    </div>
    <div class="article-content">
      @foreach (Site::paragraphs($post->content) as $par)
        <p>{{ $par }}</p>
      @endforeach
    </div>
  </article>
</div>
@endsection