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
            <h1><?= $title ?></h1>
         </div>
         <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3><?= $title ?></h3>
               </div>
               <div class="panel-body">
                  <?= form_open_multipart('kandidat/tambah') ?>
                  <div class="form-group">
                     <label>Nama Kandidat</label>
                     <input type="text" name="nama_kandidat" class="form-control" placeholder="Nama Kandidat" value="<?= set_value('nama_kandidat') ?>" autofocus>
                     <small class="text-danger"><?= form_error('nama_kandidat') ?></small>
                  </div>
                  <div class="form-group">
                     <label>No. Kandidat</label>
                     <input type="number" name="no_kandidat" class="form-control" placeholder="No. Kandidat" value="<?= set_value('no_kandidat') ?>">
                     <small class=" text-danger"><?= form_error('no_kandidat') ?></small>
                  </div>
                  <div class="form-group">
                     <label>Foto</label>
                     <input type="file" name="foto_kandidat" class="form-control">
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-success">Simpan</button>
                     <a href="<?= base_url('kandidat') ?>" class="btn btn-primary">Kembali</a>
                  </div>
                  <?= form_close() ?>
               </div>
            </div>
         </div>
      </div>
   </main>

   <?php $this->load->view('layout/footer'); ?>
</body>

</html>