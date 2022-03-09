 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>/barang">
         <div class="sidebar-brand-icon ">
             <img src="<?= base_url(); ?>/img/logo2.jpg" width="30" height="30" alt="">
         </div>
         <div class="sidebar-brand-text mx-3">Inventaris Kominfo </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item  <?= ($var == 'user') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?= base_url(); ?>/user">
             <i class="fas fa-fw fa-user"></i>
             <span>My Profile</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <!-- Nav Item - Dashboard -->
     <li class="nav-item  <?= ($var == 'home') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?= base_url(); ?>/home">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>






     <!-- Heading -->
     <!-- <div class="sidebar-heading">
         Interface
     </div> -->

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseBarang" aria-controls="collapseBarang">
             <i class="fas fa-fw fa-table"></i>
             <span>Barang</span></a>
         <div id="collapseBarang" class="collapse <?= ($var == 'barang' || $var == 'kondisi_barang') ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Status:</h6>

                 <a class="collapse-item" href="<?= base_url(); ?>/barang">Semua</a>
                 <a class="collapse-item" href="<?= base_url(); ?>/barang/kondisi/1">Baik</a>
                 <a class="collapse-item" href="<?= base_url(); ?>/barang/kondisi/2">Rusak</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Dashboard -->
     <li class="nav-item  <?= ($var == 'kategori') ? 'active' : ''; ?>">
         <a class="nav-link" href="<?= base_url(); ?>/kategori">
             <i class="fas fa-fw fa-table"></i>
             <span>Kategori</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->