<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo e($gymName); ?></title>
<meta name="description" content="<?php echo e($tagline); ?>">
<style>
  *{box-sizing:border-box;margin:0;padding:0;}
  body{
    min-height:100vh;display:flex;align-items:center;justify-content:center;
    background:#0f172a;color:#f8fafc;padding:1.5rem;
    font-family:system-ui,-apple-system,"Segoe UI",Roboto,sans-serif;
  }
  .box{width:100%;max-width:420px;text-align:center;}
  .badge{
    width:84px;height:84px;margin:0 auto 1.25rem;border-radius:50%;
    background:#0ea5e9;color:#020617;font-size:2.4rem;font-weight:800;
    display:flex;align-items:center;justify-content:center;
  }
  h1{font-size:1.4rem;line-height:1.3;}
  p.tag{margin-top:.6rem;color:#94a3b8;font-size:.95rem;line-height:1.5;}
  .btns{margin-top:2rem;display:flex;flex-direction:column;gap:1rem;}
  .btn{
    display:block;padding:1rem 1.25rem;border-radius:.8rem;
    font-weight:600;font-size:1rem;text-decoration:none;transition:.2s;
  }
  .btn:active{transform:scale(.97);}
  .btn-web{background:#0ea5e9;color:#020617;}
  .btn-web:hover{background:#38bdf8;}
  .btn-wa{background:#1e293b;color:#f8fafc;border:1px solid #475569;}
  .btn-wa:hover{background:#334155;}
</style>
</head>
<body>
  <main class="box">
    <div class="badge">O</div>
    <h1><?php echo e($gymName); ?></h1>
    <p class="tag"><?php echo e($tagline); ?></p>

    <div class="btns">
      <a class="btn btn-web" href="<?php echo e($websiteUrl); ?>"><?php echo e($websiteLabel); ?></a>
      <a class="btn btn-wa" href="<?php echo e($waUrl); ?>" target="_blank" rel="noopener"><?php echo e($waLabel); ?></a>
    </div>
  </main>
</body>
</html><?php /**PATH C:\Users\JTII\ozone-fitness\resources\views/links.blade.php ENDPATH**/ ?>