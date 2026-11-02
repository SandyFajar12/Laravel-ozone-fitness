<?php use \App\Support\Site; ?>


<?php $__env->startSection('title', 'Ozone Fitness & Aerobic Centre — Gym & Aerobik di Padang'); ?>

<?php $__env->startSection('content'); ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($slides->count()): ?>
<section class="hero" id="hero">
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="hero-slide <?php echo e($i === 0 ? 'active' : ''); ?>" data-title="<?php echo e($slide->title); ?>" data-sub="<?php echo e($slide->subtitle); ?>">
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($img = Site::img($slide->image)): ?>
        <img src="<?php echo e($img); ?>" alt="<?php echo e($slide->title); ?>">
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      <div class="hero-overlay"></div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
  <div class="hero-content wrap">
    <p class="hero-label">Ozone Fitness &amp; Aerobic Centre</p>
    <h1 class="hero-title" id="hero-title"><?php echo e($slides[0]->title); ?></h1>
    <p class="hero-sub" id="hero-sub"><?php echo e($slides[0]->subtitle); ?></p>
    <div class="hero-ctas">
      <a href="<?php echo e(route('services')); ?>" class="btn-primary">Lihat Layanan</a>
      <a href="<?php echo e(route('contact')); ?>" class="btn-secondary">Hubungi Kami</a>
    </div>
  </div>
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($slides->count() > 1): ?>
    <button class="hero-arrow prev" id="hero-prev" aria-label="Sebelumnya"><i data-lucide="chevron-left"></i></button>
    <button class="hero-arrow next" id="hero-next" aria-label="Berikutnya"><i data-lucide="chevron-right"></i></button>
    <div class="hero-dots">
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button class="hero-dot <?php echo e($i === 0 ? 'active' : ''); ?>" aria-label="Slide <?php echo e($i + 1); ?>"></button>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<section class="wrap" id="benefits-section">
  <p class="eyebrow">Kenapa Ozone?</p>
  <h2 class="h2">Keuntungan Bergabung dengan Ozone Fitness</h2>
  <p class="lead">Lebih dari sekadar gym — kami adalah partner perjalanan sehatmu. Ini yang kamu dapatkan sebagai member Ozone.</p>
  <div class="grid grid-3 grid-3-lg" style="margin-top:3rem">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="card">
        <span class="icon-badge"><i data-lucide="<?php echo e($b->icon); ?>" style="width:24px;height:24px"></i></span>
        <h3><?php echo e($b->title); ?></h3>
        <p class="desc"><?php echo e($b->description); ?></p>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
  </div>
</section>

<section class="team-section">
  <div class="wrap">
    <p class="eyebrow">Our Team</p>
    <h2 class="h2">Kenalan dengan Tim Pelatih Kami</h2>
    <p class="lead">Pelatih andalan Ozone dengan keahlian berbeda, siap membantumu mencapai target fitness.</p>
    <div class="grid grid-3 grid-3-lg" style="margin-top:3rem">
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="media-card">
          <div class="img-wrap">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($img = Site::img($t->image)): ?>
              <img src="<?php echo e($img); ?>" alt="Foto <?php echo e($t->name); ?>" loading="lazy">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          </div>
          <div class="body">
            <h3><?php echo e($t->name); ?></h3>
            <p class="role"><?php echo e($t->role); ?></p>
            <p class="bio"><?php echo e($t->bio); ?></p>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
  </div>
</section>

<section class="split" style="padding:0">
  <div class="split-panel career">
    <span class="icon-badge"><i data-lucide="briefcase" style="width:22px;height:22px"></i></span>
    <h2>Career</h2>
    <p><?php echo e($s->career_text); ?></p>
    <a href="<?php echo e(route('contact')); ?>" class="btn-primary" style="margin-top:2rem">Kirim Lamaran <i data-lucide="arrow-right" style="width:16px;height:16px"></i></a>
  </div>
  <div class="split-panel opportunity">
    <span class="icon-badge"><i data-lucide="trending-up" style="width:22px;height:22px"></i></span>
    <h2>Opportunity</h2>
    <p><?php echo e($s->opportunity_text); ?></p>
    <a href="<?php echo e(route('contact')); ?>" class="btn-secondary" style="margin-top:2rem">Diskusi Peluang <i data-lucide="arrow-right" style="width:16px;height:16px"></i></a>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.site', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\JTII\ozone-fitness\resources\views/pages/about.blade.php ENDPATH**/ ?>