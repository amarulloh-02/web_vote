<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
   <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= base_url('assets/images/profile.png') ?>" alt="User Image">
      <div>
         <p class="app-sidebar__user-name"><?= ucwords($this->session->userdata('nama_user')) ?></p>
      </div>
   </div>
   <ul class="app-menu">
      <li><a class="app-menu__item" href="<?= base_url('home') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Kelola</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url('user') ?>"><i class="icon fa fa-circle-o"></i> User</a></li>
            <li><a class="treeview-item" href="<?= base_url('kandidat') ?>"><i class="icon fa fa-circle-o"></i> Kandidat</a></li>
            <li><a class="treeview-item" href="<?= base_url('pemilih') ?>"><i class="icon fa fa-circle-o"></i> Pemilih</a></li>
         </ul>
      </li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url('user/report') ?>"><i class=" icon fa fa-circle-o"></i> Laporan User</a></li>
            <li><a class="treeview-item" href="<?= base_url('kandidat/report') ?>"><i class=" icon fa fa-circle-o"></i> Laporan Kandidat</a></li>
            <li><a class="treeview-item" href="<?= base_url('pemilih/report') ?>"><i class="icon fa fa-circle-o"></i> Laporan Pemilih</a></li>
            <li><a class="treeview-item" href="<?= base_url('home/report') ?>"><i class="icon fa fa-circle-o"></i> Laporan Perhitungan Suara</a></li>
         </ul>
      </li>
   </ul>
</aside>