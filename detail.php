<?php
    if(isset($_GET['id'])){
        $id    =abs(intval($_GET['id']));
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "koneksi.php";
    
        $query = "SELECT pelamar.jabatan,pelamar.nama,pelamar.ktp, pelamar.telp,pelamar.mail,pelamar.jenis_sim, pelamar.alamat_kota, pelamar.alamat_luar,pelamar.jenis_kelamin, pelamar.tinggi, pelamar.berat,
        pelamar.agama, pelamar.kebangsaan, pelamar.kendaraan, pelamar.tempat_lahir,pelamar.tgl_lahir, pelamar.status, pelamar.tempat_tinggal, keluarga.ibu,keluarga.pekerjaan_ibu,keluarga.ayah, keluarga.pekerjaan_ayah,keluarga.referensi,keluarga.referensi_orang,
        pengalaman.pendidikan,pengalaman.instansi_pendidikan,pengalaman.jurusan, pengalaman.tahun_masuk, pengalaman.tahun_kelulusan, pengalaman.tempat_prakerin, pengalaman.bidang_prakerin, pengalaman.lama_prakerin, pengalaman.instansi_bekerja, pengalaman.jabatan_kerja, pengalaman.lama_bekerja, 
        pengalaman.masuk_kerja, pengalaman.keluar_kerja,pengalaman.alasan_berhenti
        FROM pelamar
        INNER JOIN keluarga ON pelamar.id = keluarga.id
        INNER JOIN pengalaman ON pelamar.id = pengalaman.id WHERE pelamar.id = '$id' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $no = 1;
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
         $data[] = $row;
        }
        foreach($data as $row) {
    
?>
<!DOCTYPE html>
<html>
<head>
  <title>Form Pendataan Calon Karyawan</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://rachmatperdana.co.id/wp-content/uploads/2017/02/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      form{
      margin-top:80px; 
    }
      .header {
        background: #fff;
        transition: all 0.5s;
        z-index: 997;
        padding: 10px 0;
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
      }
      .logo {
        font-size: 28px;
        margin: 0;
        margin-left:40px;
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
      h5{
    
        height: 30px;
        color: #088ca0;
      }
 </style>

</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top header">
    <a class="navbar-brand logo" href="#"><img src="images/logo.png"></a>
    </nav>
<div class="container">
<div class="bg-light p-5">
  <form method="" action="">
  <h2>Detail</h2>
  <h5>Data Diri</h5>
  <div class="row">  
    <div class="col-md-6">
    <div class="row"> 
    <div class="col-md-4">    
    <label for="nama">Jabatan:</label>
    </div>
    <div class="col-md-8">
        <p><?php echo $row['jabatan']?> </p>
    </div>
    </div>

    <div class="row"> 
    <div class="col-md-4">    
    <label for="nama">Nama:</label>
    </div>
    <div class="col-md-8">
        <p><?php echo $row['nama']?> </p>
    </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="nama">No.KTP:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['ktp']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Email:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['mail']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Alamat KTP:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['alamat_kota']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Alamat Domisili:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['alamat_luar']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Jenis Kelamin:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['jenis_kelamin']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Tinggi:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['tinggi']?> cm </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Berat:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['berat']?> kg </p>
        </div>
    </div>
     </div>
    <div class="col-md-6">
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Agama:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['agama']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Kebangsaan:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['kebangsaan']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Tempat lahir:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['tempat_lahir']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Tanggal lahir:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['tgl_lahir']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Status:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['status']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Tempat tinggal:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['tempat_tinggal']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">kendaraan:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['kendaraan']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Jenis SIM:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['jenis_sim']?> </p>
        </div>
    </div>
    </div>
    </div>
    <h5>Data Keluarga</h5>
    <div class="row">  
     <div class="col-md-6">
       
        <div class="row"> 
            <div class="col-md-4">    
            <label for="nama">Ayah:</label>
            </div>
            <div class="col-md-8">
            <p><?php echo $row['ayah']?> </p>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-4">    
            <label for="">Pekerjaan Ayah:</label>
            </div>
            <div class="col-md-8">
            <p><?php echo $row['pekerjaan_ayah']?> </p>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-4">    
            <label for="nama">Ibu:</label>
            </div>
            <div class="col-md-8">
                <p><?php echo $row['ibu']?> </p>
            </div>
        </div>

        <div class="row"> 
        <div class="col-md-4">    
        <label for="nama">Pekerjaan Ibu:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['pekerjaan_ibu']?> </p>
        </div>
        </div>
        <div class="row"> 
            <div class="col-md-4">    
            <label for="">Referensi:</label>
            </div>
            <div class="col-md-8">
            <p><?php echo $row['referensi']?> </p>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-4">    
            <label for="">Nama Pereferensi:</label>
            </div>
            <div class="col-md-8">
            <p><?php echo $row['referensi_orang']?> </p>
            </div>
        </div>
    </div>
    </div>

    <h5>Data Pengalaman</h5>
    <div class="row">  
    <div class="col-md-6">
    <div class="row"> 
    <div class="col-md-4">    
    <label for="">Pendidikan:</label>
    </div>
    <div class="col-md-8">
        <p><?php echo $row['pendidikan']?> </p>
    </div>
    </div>

    <div class="row"> 
    <div class="col-md-4">    
    <label for="">Instansi Pendidikan:</label>
    </div>
    <div class="col-md-8">
        <p><?php echo $row['instansi_pendidikan']?> </p>
    </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="nama">Jurusan:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['jurusan']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Tahun Masuk:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['tahun_masuk']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Tahun Kelulusan:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['tahun_kelulusan']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Tempat Prakerin:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['tempat_prakerin']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Bidang Prakerin:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['bidang_prakerin']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
        <label for="">Lama Prakerin:</label>
        </div>
        <div class="col-md-8">
        <p><?php echo $row['lama_prakerin']?> </p>
        </div>
    </div>
     </div>
    <div class="col-md-6">
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Instasi Bekerja:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['instansi_bekerja']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Jabatan Kerja:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['jabatan_kerja']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Lama Bekerja:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['lama_bekerja']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Alasan Berhenti:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['alasan_berhenti']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Tahun Masuk:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['masuk_kerja']?> </p>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-4">    
            <label for="nama">Tahun Keluar:</label>
        </div>
        <div class="col-md-8">
            <p><?php echo $row['keluar_kerja']?> </p>
        </div>
    </div>
    </div>
    </div>
    

<?php 
    }
    ?>
    <button class="btn btn-success btn-sm card-shadow-2" type="button" onclick="tutupHalaman()">Tutup</button>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</body>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
function tutupHalaman() {
    close();
}
</script>
</html>
