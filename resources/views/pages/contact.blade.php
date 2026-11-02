@use('App\Support\Site')
@extends('layouts.site')

@section('title', 'Hubungi Kami — Ozone Fitness & Aerobic Centre')
@section('description', 'Hubungi Ozone Fitness & Aerobic Centre di Padang untuk info membership, kelas, dan personal trainer.')

@section('content')
<div class="page-banner">
  @if ($img = Site::img($s->banner_contact))
    <img src="{{ $img }}" alt="Hubungi Kami">
  @endif
  <div class="overlay"></div>
  <div class="wrap content">
    <h1>Hubungi Kami</h1>
    <p>Ada pertanyaan soal membership atau kelas? Tim kami siap membantu.</p>
  </div>
</div>

<section class="wrap contact-grid">
  <div style="display:flex;flex-direction:column;gap:1.1rem">
    <a href="tel:{{ $s->phone }}" class="contact-card">
      <span class="icon-badge"><i data-lucide="phone" style="width:22px;height:22px"></i></span>
      <div><p class="label">Telepon</p><p class="value">{{ $s->phone }}</p></div>
    </a>
    <a href="{{ Site::wa($s->whatsapp_number) }}" target="_blank" rel="noopener noreferrer" class="contact-card">
      <span class="icon-badge"><i data-lucide="message-circle" style="width:22px;height:22px"></i></span>
      <div><p class="label">WhatsApp</p><p class="value">Chat via WhatsApp</p></div>
    </a>
    <div class="contact-card">
      <span class="icon-badge"><i data-lucide="map-pin" style="width:22px;height:22px"></i></span>
      <div><p class="label">Alamat</p><p style="font-size:.9rem;margin-top:.25rem;color:var(--text2);line-height:1.5">{{ $s->address }}</p></div>
    </div>
    <div class="contact-card">
      <span class="icon-badge"><i data-lucide="clock" style="width:22px;height:22px"></i></span>
      <div><p class="label">Jam Operasional</p><p style="font-size:.9rem;margin-top:.25rem;color:var(--text2);line-height:1.5">{{ $s->hours_weekday }}<br>{{ $s->hours_sunday }}</p></div>
    </div>
  </div>

  <div class="contact-form-panel" id="form-kirim">
    <h2 style="font-size:1.4rem;font-weight:700">Kirim Pesan</h2>
    <p style="margin-top:.5rem;font-size:.9rem;color:var(--muted)">Isi form di bawah dan kami akan membalas secepatnya.</p>

    @if (session('sent'))
      <div class="notice ok" style="margin-top:1.25rem">Pesan berhasil dikirim! Kami akan segera menghubungimu.</div>
    @endif
    @if ($errors->any())
      <div class="notice err" style="margin-top:1.25rem">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('contact.send') }}" style="margin-top:1.75rem">
      @csrf
      <div style="position:absolute;left:-9999px" aria-hidden="true">
        <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
      </div>
      <div class="field-row">
        <div><label class="field-label">Nama</label><input name="name" value="{{ old('name') }}" required placeholder="Nama lengkap"></div>
        <div><label class="field-label">Email</label><input type="email" name="email" value="{{ old('email') }}" required placeholder="email@contoh.com"></div>
      </div>
      <div class="field-row">
        <div><label class="field-label">Nomor Telepon</label><input name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx"></div>
        <div><label class="field-label">Subjek</label><input name="subject" value="{{ old('subject') }}" required placeholder="Tanya membership, kelas, dll"></div>
      </div>
      <div style="margin-bottom:1.5rem">
        <label class="field-label">Pesan</label>
        <textarea name="message" required rows="5" placeholder="Tulis pesanmu di sini...">{{ old('message') }}</textarea>
      </div>
      <button type="submit" class="btn-primary"><i data-lucide="send" style="width:16px;height:16px"></i> Kirim Pesan</button>
    </form>
  </div>
</section>

<section class="wrap" style="padding-top:0">
  <h2 class="h2" style="margin-bottom:1.5rem">Lokasi Kami</h2>
  <div class="map-frame">
    <iframe title="Lokasi Ozone Fitness" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="{{ Site::mapUrl($s->address) }}"></iframe>
  </div>
</section>
@endsection