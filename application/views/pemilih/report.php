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
            <a href="<?= base_url('pemilih/cetak') ?>" target="_blank" class="btn btn-secondary mb-2"><i class="fa fa-print"></i> Cetak</a>
            <div class="panel-body table-responsive">
               <table class="table table-bordered table-hover" id="dataTables">
                  <thead>
                     <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Pemilih</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Username</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($pemilih as $key => $value) { ?>
                        <tr>
                           <td><?= $key + 1 ?></td>
                           <td><?= ucwords($value->nama_pemilih) ?></td>
                           <td><?= ucwords($value->jk_pemilih) ?></td>
                           <td><?= $value->username ?></td>
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