<!DOCTYPE html>
<html lang="en">

<head>
   <?php $this->load->view('layout_pemilih/head'); ?>
</head>

<body class="app sidebar-mini">
   <!-- Navbar-->
   <?php $this->load->view('layout_pemilih/navbar'); ?>

   <!-- Sidebar menu-->
   <?php $this->load->view('layout_pemilih/sidebar'); ?>

   <main class="app-content">
      <div class="app-title">
         <div>
            <h1><i class="fa fa-dashboard"></i> <?= $title ?></h1>
         </div>
         <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
         </ul>
      </div>
      <div class="row">
         <?php foreach ($kandidat as $k) { ?>
            <div class="col">
               <div class="card">
                  <h3 class="card-header text-center"><?= $k->no_kandidat ?></h3>
                  <div class="card-body text-center">
                     <h5 class="card-title"><?= $k->nama_kandidat ?></h5>
                     <img class="img img-thumbnail" src="<?= base_url('foto/foto_kandidat/' . $k->foto_kandidat) ?>" width="500px">
                     <a href="<?= base_url('home_pemilih/simpan/' . $k->id_kandidat) ?>" class="btn btn-success btn-block btn-lg mt-3">Pilih</a>
                  </div>
               </div>
            </div>
         <?php } ?>
      </div>
      <a href="<?= base_url('home_pemilih') ?>" class="btn btn-primary mt-3">Kembali</a>
   </main>

   <?php $this->load->view('layout_pemilih/footer'); ?>
</body>

</html>