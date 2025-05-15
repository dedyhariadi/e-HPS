<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- content -->

<!-- awal jumbotron -->
<section class="jumbotron text-center">
    <img src="/assets/images/e-hps.jpeg" alt="e-Harga Perkiraan Sendiri" width="200" class="rounded-circle mt-3">
    <h1 class="display-1 mt-4">Arsenal</h1>
    <p class="lead fs-4"> Simple | Effortless</p>

    <!-- bentuk gelombang  | ambil dari getwaves.io-->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#FFFFFF" fill-opacity="1" d="M0,192L30,181.3C60,171,120,149,180,160C240,171,300,213,360,224C420,235,480,213,540,181.3C600,149,660,107,720,117.3C780,128,840,192,900,197.3C960,203,1020,149,1080,144C1140,139,1200,181,1260,213.3C1320,245,1380,267,1410,277.3L1440,288L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    </svg>
    <!-- akhir bentuk gelombang -->

</section>
<!-- akhir jumbotron -->

<!-- akhir content -->

<?= $this->endSection(); ?>