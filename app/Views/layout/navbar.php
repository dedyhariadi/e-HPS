 <!-- navbar -->
 <nav id="navbar-example2" class="navbar py-0 bg-primary" data-bs-theme="dark">
     <div class="container">
         <!-- <a class="navbar-brand" href="/">
             <h2>e-SIAP</h2>
         </a> -->

         <?= anchor('/', 'e-Siap', ['class' => 'navbar-brand fs-1 fw-lighter fst-italic']); ?>

         <ul class="nav nav-pills">
             <li class="nav-item">
                 <?= anchor('/', 'Home', ['class' => 'nav-link active']); ?>
             </li>
             <li class="nav-item">
                 <?= anchor('kegiatan', 'Kegiatan', ['class' => 'nav-link']); ?>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="barang">Barang</a>
             </li>
             <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Lainnya</a>
                 <ul class="dropdown-menu">
                     <li>
                         <?= anchor('pejabat', 'Pejabat', ['class' => 'dropdown-item']); ?>
                     </li>
                     <li>
                         <?= anchor('satuan', 'Satuan', ['class' => 'dropdown-item']); ?>
                     </li>
                     <li>
                         <?= anchor('dasarsurat', 'Dasar Surat', ['class' => 'dropdown-item']); ?>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     <li>
                         <?php
                            if (logged_in()) {
                                echo anchor('home/logout', 'Logout (' . user()->username . ')', ['class' => 'dropdown-item']);
                            }
                            ?>
                     </li>
                 </ul>
             </li>
         </ul>
     </div>
 </nav>
 <!-- akhir navbar -->