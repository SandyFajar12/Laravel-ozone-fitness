<?php use \App\Support\Site; ?>


<?php $__env->startSection('title', 'Fasilitas & Kelas — Ozone Fitness & Aerobic Centre'); ?>
<?php $__env->startSection('description', 'Peralatan fitness modern dan kelas grup bervariasi di Ozone Fitness & Aerobic Centre, Padang.'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-banner">
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($img = Site::img($s->banner_facilities)): ?>
    <img src="<?php echo e($img); ?>" alt="Fasilitas & Kelas">
  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="media-card wide">
        <div class="img-wrap">
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($img = Site::img($f->image)): ?>
            <img src="<?php echo e($img); ?>" alt="<?php echo e($f->title); ?>" loading="lazy">
          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <div class="body"><h3><?php echo e($f->title); ?></h3><p class="desc"><?php echo e($f->description); ?></p></div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
  </div>

  <div class="private-panel">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($img = Site::img($s->private_image)): ?>
      <img src="<?php echo e($img); ?>" alt="<?php echo e($s->private_title); ?>" style="width:100%;max-width:280px;aspect-ratio:4/3;object-fit:cover;border-radius:.6rem" loading="lazy">
    <?php else: ?>
      <span class="icon-badge" style="padding:1rem"><i data-lucide="user-check" style="width:32px;height:32px"></i></span>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div style="flex:1">
      <h3 style="font-size:1.3rem;font-weight:600"><?php echo e($s->private_title); ?></h3>
      <p class="desc" style="margin-top:.7rem"><?php echo e($s->private_text); ?></p>
    </div>
    <a href="<?php echo e(route('services')); ?>" class="btn-primary">Lihat Paket Trainer</a>
  </div>
</section>

<section style="background:rgba(2,6,23,.6);border-top:1px solid #1e293b">
  <div class="wrap">
    <p class="eyebrow">Classes</p>
    <h2 class="h2">Pilihan Kelas Grup</h2>
    <p class="lead">Semua kelas sudah termasuk dalam membership — dipandu instruktur bersertifikat dengan suasana yang seru.</p>
    <div class="grid grid-3 grid-3-lg" style="margin-top:3rem">
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem">
            <span class="icon-badge" style="margin-bottom:0"><i data-lucide="<?php echo e($c->icon); ?>" style="width:22px;height:22px"></i></span>
            <span class="badge-level badge-<?php echo e(strtolower($c->intensity)); ?>"><?php echo e($c->intensity); ?></span>
          </div>
          <h3><?php echo e($c->name); ?></h3>
          <p class="class-schedule"><?php echo e($c->schedule); ?></p>
          <p class="desc"><?php echo e($c->description); ?></p>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\JTII\ozone-fitness\resources\views/pages/facilities.blade.php ENDPATH**/ ?>