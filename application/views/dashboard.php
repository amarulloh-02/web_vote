<!DOCTYPE html>
<html lang="en">

<head>
   <?php $this->load->view('layout/head'); ?>
</head>

<body class="app sidebar-mini">
   <!-- Navbar-->
   <?php $this->load->view('layout/navbar'); ?>

   <!-- Sidebar menu-->
   <?php $this->load->view('layout/sidebar'); ?>

   <main class="app-content">
      <div class="app-title">
         <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
         </div>
         <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-inbox fa-3x"></i>
               <div class="info">
                  <h4>Suara Masuk</h4>
                  <p><b><?= $total_pilih ?></b></p>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-3">
            <a href="<?= base_url('pemilih') ?>">
               <div class="widget-small info coloured-icon"><i class="icon fa fa-check-square-o fa-3x"></i>
                  <div class="info">
                     <h4>Pemilih</h4>
                     <p><b><?= $total_pemilih ?></b></p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-6 col-lg-3">
            <a href="<?= base_url('kandidat') ?>">
               <div class="widget-small warning coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                  <div class="info">
                     <h4>Kandidat</h4>
                     <p><b><?= $total_kandidat ?></b></p>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-md-6 col-lg-3">
            <a href="<?= base_url('user') ?>">
               <div class="widget-small danger coloured-icon"><i class="icon fa fa-user-circle-o fa-3x"></i>
                  <div class="info">
                     <h4>User</h4>
                     <p><b><?= $total_user ?></b></p>
                  </div>
               </div>
            </a>
         </div>
      </div>

      <div class="row">
         <?php foreach ($kandidat as $k) { ?>
            <div class="col">
               <div class="card">
                  <h3 class="card-header text-center"><?= $k->no_kandidat ?></h3>
                  <div class="card-body text-center">
                     <h5 class="card-title"><?= $k->nama_kandidat ?></h5>
                     <?php
                     $pilih =  $this->db->get('pilih')->num_rows();
                     $cek = $this->db->get_where('pilih', ['id_kandidat' => $k->id_kandidat])->num_rows();
                     $suara = ($cek / $pilih) * 100;
                     ?>
                     <h6 class="text-center">Perolehan Suara : <?= $cek ?></h6>
                     <h6 class="text-center">Persentase Suara : <?= intval($suara) . "%" ?></h6>
                     <img class="img img-thumbnail" src="<?= base_url('foto/foto_kandidat/' . $k->foto_kandidat) ?>" width="500px">
                  </div>
               </div>
            </div>
         <?php } ?>
      </div>
   </main>

   <?php $this->load->view('layout/footer'); ?>
</body>

</html>