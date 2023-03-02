<!-- # @Author: Wahid Ari <wahidari>
# @Date:   8 January 2018, 5:05
# @Copyright: (c) wahidari 2018 -->
<?php
    // database
    require_once("koneksi.php");
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $sql = "INSERT INTO `mekanik` (`username`, `nama`, `password`) VALUES ('$username', '$nama', MD5('$password'))";
        $stmt = $db->prepare($sql);
        $stmt->execute();;
        if ($sql) {
           echo '<script type="text/javascript">alert("Data berhasil di tambah")</script>' ;
           header("Location: data_mekanik.php");
           exit;
        }
    }

    if (isset($_POST['Hapus'])) {
      $id_hapus = $_POST['id'];
      // hapus laporan
      $statement = mysqli_query($conn,"DELETE FROM `pelamar` WHERE `pelamar`.`id` = $id_hapus");
      $statement2 = mysqli_query($conn,"DELETE FROM `keluarga` WHERE `keluarga`.`id` = $id_hapus");
      $statement3 = mysqli_query($conn,"DELETE FROM `pengalaman` WHERE `pengalaman`.`id` = $id_hapus");
      if ($statement) {
          echo "Data berhasil dihapus.";
          header("Location: data_pelamar.php");
      } else {
        echo "Data Tidak Berhasil Dihapus";
      }
  }

    if (isset($_POST['edit'])) {
        $nama1 = $_POST['nama'];
        $username1 = $_POST['username'];
        $chgpass = $_POST['password'];
        // hapus laporan
        $statement = $db->query("UPDATE `mekanik` SET `password` = md5('$chgpass') ,`nama` = '$nama1' WHERE `mekanik`.`username` = '$username1'");
        echo '<script language="javascript">';
        echo 'alert("Data telah diubah")';
        echo '</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Data Pelamar</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/admin.css" rel="stylesheet">
    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <style>
  .header {
        background: #fff;
        transition: all 0.5s;
        z-index: 997;
        padding: 10px 0px 10px  ;
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
      }
      .logo {
        font-size: 28px;
        margin: 0;
        margin-left:20px;
        margin-bottom:0px;
        line-height: 1;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
      }

      .logo img {
        max-height: 100px;
        max-width: 50%;
      }
  </style>
</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg fixed-top header">
    <a class="navbar-brand logo" href="#"><img src="images/logo.png"></a>
        </nav><br>
    <div class="content">
        <div class="container-fluid">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4  border-bottom">
        <h1 class="h2">Data Pelamar</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          <button class="btn btn-sm "><a href="export.php">Ekspor</button></a>
          </div>
        </div>
      </div>
      <br>
    <!-- Body  <!-- DataTables Card-->
            <main role="main" class="col-md-10 ml-sm-auto col-lg-12 px-4">
            <div class="card mb-3">   
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Telp</th>
                                <th>Mail</th>
                                <th>Alamat</th>
                                <th>Tempat lahir</th>
                                <th class="th-no-border sorting_asc_disabled sorting_desc_disabled" style="text-align:center">Aksi</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled"></th>
            
                                </tr>
                            </thead>
                       
                            <?php
          $no=0;
          $statement = mysqli_query($conn,"SELECT * FROM `pelamar` ORDER BY id DESC");
                                
          foreach ($statement as $key ) {
            $no++;
          ?>
          
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $key['nama'];?></td>
              <td><?php echo $key['telp'];?></td>
              <td><?php echo $key['mail'];?></td>
              <td><?php echo $key['alamat_kota'];?></td>
              <td><?php echo $key['tempat_lahir']. ", ".$key['tgl_lahir'];?></td>
               <td class="td-no-border">
              <a href="detail.php?id=<?php echo $key['id']?>" type="button" target="_blank" class="btn btn-success btn-md" >Detail</a>
              </td>
               <td class="td-no-border">
                 <button type="button" class="btn btn-danger btn-sm btn-custom card-shadow-2" data-toggle="modal" data-target="#ModalHapus<?php echo $key['id']; ?>">
                    Hapus
                 </button>
               </td>
            </tr>
           <?php
              }
           ?>                            
          
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated <?php echo date('l, d-m-Y');?></div>
            </div>
            </main>
        </div>
    

        <?php
            $statement = mysqli_query($conn,"SELECT * FROM `pelamar` ORDER BY id DESC");

            foreach ($statement as $key ) {
                // cek apakah laporan sudah ditanggapi atau belum
                $nomor = $key['id'];
                $stat = mysqli_query($conn,"SELECT * FROM `pelamar` WHERE id = $nomor");

          ?>
   <!-- hapus -->
        <div class="modal fade" id="ModalHapus<?php echo $key['id']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm " role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title text-center">Hapus Data Pelamar</h5>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Hapus Data</p>
                        <h6 class="text-center"><br><?php echo $key['ktp']. " a.n <br>".$key['nama']; ?>?</h6>
                    </div>
                    <div class="modal-footer">
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                            <input type="submit" class="btn btn-danger btn-sm card-shadow-2" name="Hapus" value="Hapus">
                            <button type="button" class="btn btn-close btn-sm card-shadow-2" data-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Modal Hapus-->
        <?php
            }
        ?>

    <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © PT Rachmat Perdana Adhimetal</small>
                </div>
            </div>
        </footer>


        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/admin.js"></script>
        <!-- Custom scripts for this page-->
        <script src="js/admin-datatables.js"></script>
        <!-- Text Area -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    </div>
    <!-- /.content-wrapper-->
</body>
<script>
    $(document).ready(function() {
  $('#dataTable').DataTable();
});
    </script>
</html>
