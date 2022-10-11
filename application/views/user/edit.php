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
                  <?= form_open('user/edit/' . $user->id_user) ?>
                  <div class="form-group">
                     <label>Nama User</label>
                     <input type="text" name="nama_user" class="form-control" placeholder="Nama User" value="<?= $user->nama_user ?>" autofocus>
                     <small class="text-danger"><?= form_error('nama_user') ?></small>
                  </div>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user->username ?>" readonly>
                     <small class=" text-danger"><?= form_error('username') ?></small>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password">
                     <small class="text-danger"><?= form_error('password') ?></small>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-success">Simpan</button>
                     <a href="<?= base_url('user') ?>" class="btn btn-primary">Kembali</a>
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