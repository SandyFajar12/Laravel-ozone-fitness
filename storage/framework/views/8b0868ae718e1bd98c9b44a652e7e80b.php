<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $__env->yieldContent('title', 'Ozone Fitness & Aerobic Centre'); ?></title>
<meta name="description" content="<?php echo $__env->yieldContent('description', 'Pusat kebugaran dan aerobik modern di Kota Padang. Alat lengkap, pelatih bersertifikat, kelas aerobik setiap hari.'); ?>">
<link rel="canonical" href="<?php echo e(url()->current()); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>
<link rel="stylesheet" href="<?php echo e(asset('css/site.css')); ?>">
</head>
<body data-nav-solid="<?php echo $__env->yieldContent('nav_solid'); ?>">

<header class="nav" id="navbar">
  <div class="wrap nav-inner">
    <a href="<?php echo e(route('about')); ?>" class="logo">
      <span class="logo-badge"><i data-lucide="dumbbell" style="width:22px;height:22px"></i></span>
      <span class="logo-text">OZONE <span class="accent">FITNESS</span><span class="logo-sub">&amp; Aerobic Centre</span></span>
    </a>
    <nav class="links">
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['about', 'About Us'], ['facilities', 'Facilities & Classes'], ['services', 'Our Service'], ['blog', 'Blog & News']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$r, $label]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route($r)); ?>" class="<?php echo e(request()->routeIs($r . '*') ? 'active' : ''); ?>"><?php echo e($label); ?></a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      <a href="<?php echo e(route('contact')); ?>" class="nav-contact <?php echo e(request()->routeIs('contact*') ? 'active' : ''); ?>">Contact</a>
    </nav>
    <button class="mobile-toggle" id="mobile-toggle" aria-label="Buka menu">
      <i data-lucide="menu"></i>
    </button>
  </div>
  <div class="mobile-menu" id="mobile-menu">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['about', 'About Us'], ['facilities', 'Facilities & Classes'], ['services', 'Our Service'], ['blog', 'Blog & News'], ['contact', 'Contact']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$r, $label]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route($r)); ?>" class="<?php echo e(request()->routeIs($r . '*') ? 'active' : ''); ?>"><?php echo e($label); ?></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
  </div>
</header>

<?php echo $__env->yieldContent('content'); ?>

<footer>
  <div class="wrap footer-grid">
    <div>
      <div class="logo">
        <span class="logo-badge"><i data-lucide="dumbbell" style="width:20px;height:20px"></i></span>
        <span class="logo-text">OZONE <span class="accent">FITNESS</span></span>
      </div>
      <p class="footer-desc"><?php echo e($s->footer_description); ?></p>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($s->instagram_url || $s->facebook_url || $s->tiktok_url): ?>
        <div class="footer-socials">
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($s->instagram_url): ?><a href="<?php echo e($s->instagram_url); ?>" target="_blank" rel="noopener" aria-label="Instagram">Instagram</a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($s->facebook_url): ?><a href="<?php echo e($s->facebook_url); ?>" target="_blank" rel="noopener" aria-label="Facebook">Facebook</a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($s->tiktok_url): ?><a href="<?php echo e($s->tiktok_url); ?>" target="_blank" rel="noopener" aria-label="TikTok">TikTok</a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <div>
      <h3 class="footer-h">Kontak Kami</h3>
      <ul class="footer-list">
        <li><i data-lucide="phone"></i><a href="tel:<?php echo e($s->phone); ?>"><?php echo e($s->phone); ?></a></li>
        <li><i data-lucide="map-pin"></i><span><?php echo e($s->address); ?></span></li>
        <li><i data-lucide="clock"></i><span><?php echo e($s->hours_weekday); ?><br><?php echo e($s->hours_sunday); ?></span></li>
      </ul>
    </div>
    <div>
      <h3 class="footer-h">Menu</h3>
      <ul class="footer-list">
        <li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
        <li><a href="<?php echo e(route('facilities')); ?>">Facilities &amp; Classes</a></li>
        <li><a href="<?php echo e(route('services')); ?>">Our Service</a></li>
        <li><a href="<?php echo e(route('blog')); ?>">Blog &amp; News</a></li>
        <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">© <?php echo e(date('Y')); ?> Ozone Fitness &amp; Aerobic Centre. All rights reserved.</div>
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
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\Users\JTII\ozone-fitness\resources\views/layouts/site.blade.php ENDPATH**/ ?>