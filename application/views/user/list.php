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

   <main class="app-content bg-white">
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
         <div class="col-lg-12 col-md-12">
            <div class="panel-heading">
               <h3> <?= $title ?></h3>
            </div>
            <a href="<?= base_url('user/tambah') ?>" class="btn btn-success mb-2"><i class="fa fa-plus"></i> Tambah</a>
            <div class="panel-body table-responsive">
               <?php
               if ($this->session->flashdata('success')) {
                  echo '<div class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="Close">&times;</button>';
                  echo $this->session->flashdata('success');
                  echo '</div>';
               }
               if ($this->session->flashdata('gagal')) {
                  echo '<div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="Close">&times;</button>';
                  echo $this->session->flashdata('gagal');
                  echo '</div>';
               }
               ?>
               <table class="table table-bordered table-hover" id="dataTables">
                  <thead>
                     <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama User</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($user as $key => $value) { ?>
                        <tr>
                           <td><?= $key + 1 ?></td>
                           <td><?= ucwords($value->nama_user) ?></td>
                           <td><?= $value->username ?></td>
                           <td>
                              <a href="<?= base_url('user/edit/' . $value->id_user) ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                              <a href="<?= base_url('user/delete/' . $value->id_user) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data ini ?')"><i class="fa fa-trash"></i> Hapus</a>
                           </td>
                        <?php } ?>
                        </tr>
                  </tbody>
                  <!-- END MAIN CONTENT -->
               </table>
            </div>
         </div>
      </div>
   </main>

   <?php $this->load->view('layout/footer'); ?>
</body>

</html>