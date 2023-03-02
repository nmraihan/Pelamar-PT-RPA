
<?php
include('koneksi.php');

if (isset($_POST['save'])) {
  $ktp=$_POST['ktp'];
  $query = "SELECT * FROM `pelamar` WHERE `ktp` = '$ktp'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if ($count > 0) {
    // jika nomor NIP sudah ada, tampilkan pesan error
    echo "<script> 
    alert('NIP Telah Terdaftar');
    </script>" ;
  }elseif($count == 0){
  $jabatan=$_POST['jabatan'];
  $jabatan = strtoupper($jabatan);
  $nama=$_POST['nama'];
  $telp=$_POST['telp'];
  $mail=$_POST['email'];
  $referensi=$_POST['referensi'];
  $referensi_orang=$_POST['referensi_orang'];
  $alamat_kota=$_POST['alamat'];
  $alamat_luar=$_POST['alamat1'];
  $jenis_kelamin=$_POST['jenis_kelamin'];
  $tinggi=$_POST['tinggi'];
  $berat=$_POST['berat'];
  $agama=$_POST['agama'];
  $kebangsaan=$_POST['kebangsaan'];
  $tempat_lahir=$_POST['tempat_lahir'];
  $tgl_lahir=$_POST['tgl_lahir'];
  $status=$_POST['status'];
  $tempat_tinggal=$_POST['tempat_tinggal'];
  $subjects=implode(", ", $_POST['kendaraan']);
  $ibu=$_POST['ibu'];
  $pekerjaan_ibu=$_POST['pekerjaan_ibu'];
  $ayah=$_POST['ayah'];
  $pekerjaan_ayah=$_POST['pekerjaan_ayah'];
  $jenis_sim=implode(", ", $_POST['jenis_sim']);
  $pendidikan=$_POST['pendidikan'];
  $instansi_pendidikan=$_POST['instansi_pendidikan'];
  $jurusan=$_POST['jurusan'];
  $tahun_masuk=$_POST['tahun_masuk'];
  $tahun_kelulusan=$_POST['tahun_kelulusan'];
  $tempat_prakerin=$_POST['tempat_prakerin'];
  $bidang_prakerin=$_POST['bidang_prakerin'];
  $lama_prakerin=$_POST['lama_prakerin'];
  $instansi_bekerja=$_POST['instansi_bekerja'];
  $jabatan_kerja=$_POST['jabatan_kerja'];
  $lama_bekerja=$_POST['lama_bekerja'];
  $masuk_kerja=$_POST['masuk_kerja'];
  $keluar_kerja=$_POST['keluar_kerja'];
  $alasan_berhenti=$_POST['alasan_berhenti'];
  $sql = "INSERT INTO `pelamar` (`jabatan`, `nama`, `ktp`, `telp`, `mail`, `jenis_sim`, `alamat_kota`, `alamat_luar`, `jenis_kelamin`, `tinggi`, `berat`, `agama`, `kebangsaan`, `tempat_lahir`, `tgl_lahir`, `status`, `tempat_tinggal`, `kendaraan` ) VALUES ('$jabatan','$nama','$ktp', '$telp', '$mail', '$jenis_sim','$alamat_kota','$alamat_luar','$jenis_kelamin','$tinggi','$berat','$agama','$kebangsaan','$tempat_lahir','$tgl_lahir','$status','$tempat_tinggal', '$subjects')";
  mysqli_query($conn, $sql);

  $id_diri = $conn->insert_id;

  $sql2 = " INSERT INTO `keluarga`(`id`, `ibu`, `pekerjaan_ibu`, `ayah`, `pekerjaan_ayah`, `referensi`, `referensi_orang`) VALUES ('$id_diri','$ibu', '$pekerjaan_ibu' , '$ayah', '$pekerjaan_ayah', '$referensi', '$referensi_orang')";
  mysqli_query($conn, $sql2);  
  
  $sql3 = " INSERT INTO `pengalaman`(`id`, `pendidikan`, `instansi_pendidikan`, `jurusan`, `tahun_masuk`, `tahun_kelulusan`, `tempat_prakerin`, `bidang_prakerin`, `lama_prakerin`, `instansi_bekerja`, `jabatan_kerja`, `lama_bekerja`, `masuk_kerja`, `keluar_kerja`, `alasan_berhenti`) VALUES ('$id_diri','$pendidikan', '$instansi_bekerja' , '$jurusan', '$tahun_masuk', '$tahun_kelulusan', '$tempat_prakerin', '$bidang_prakerin', '$lama_prakerin', '$instansi_bekerja', '$jabatan_kerja', '$lama_bekerja', '$masuk_kerja', '$keluar_kerja', '$alasan_berhenti')";
  mysqli_query($conn, $sql3);  
  
  echo "<script> 
      alert('Data Berhasil Tersimpan');
      document.location.href = 'index.php';
      </script>" . mysqli_error($conn);
  } else{
      echo "<script> 
      alert('Pendaftaran Gagal : Silahkan periksa kembali data anda');
      document.location.href = 'index.php';
      </script>" . mysqli_error($conn);
  }
}
?>

<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/favicon.png">
  <title>Form Data Tenaga Kerja PT RPA</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  .box
  {
   width:800px;
   margin:0 auto;
  }
  .active_tab1
  {
   background-color:#fff;
   color:#333;
   font-weight: 600;
  }
  .inactive_tab1
  {
   background-color: #f5f5f5;
   color: #333;
   cursor: not-allowed;
  }
  .has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }
      form{
      margin-top:20px; 
    }
      .header {
        background: #fff;
        transition: all 0.5s;
        z-index: 997;
        padding: 0px 0;
        height: 80px;
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
        max-width: 55%;
      }
 
  </style>
 </head>
 <body>
 <nav class="navbar navbar-expand-lg fixed-top header">
    <a class="navbar-brand logo" href="#"><img src="images/logo.png"></a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    </div>
    </nav>
  <div class="container ">
     <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10 "> 
   <h2 >Form Data Tenaga Kerja PT RPA</h2>
   <form method="post" id="">
    <ul class="nav nav-tabs">
     <li class="nav-item">
      <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Data Pribadi</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Data Keluarga</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Data Pengalaman</a>
     </li>
    </ul>
    <div class="tab-content" style="margin-top:16px;">
     <div class="tab-pane active" id="login_details">
      <div class="panel panel-default">
       <div class="panel-heading">Data Pribadi</div>
       <div class="panel-body">
        <table class="table noborder">
                    <th width="30%"><label for="nama">Jabatan<span style="color:red;font-size: 10px;">*wajib diisi!</span> :</label></th>
                    <td><input type="text" class="form-control" id="jabatan" style="text-transform:uppercase;"placeholder="Masukan jabatan yang dilamar" name="jabatan" required>
                    <span id="error_jabatan" class="text-danger"></span>      
                </td>
                    <tr>  
                        <th> <label for="nama"><h5>Nama Lengkap<span style="color:red;font-size: 10px;">*wajib diisi!</span>:</h5></label>
                         </th>
                        <td><input type="text" class="form-control" id="nama" placeholder="Masuakan nama" name="nama" required>
                        <span id="error_nama" class="text-danger"></span> 
                    </td> </tr>
                    <tr >
                        <th ><label for="ktp"><h5>No.KTP<span style="color:red;font-size: 10px;">*wajib diisi!</span> :</h5></label>
                        </th>  
                        <td ><input type="text" class="form-control" id="ktp" placeholder="Masuakan nomor KTP" name="ktp" required>
                        <span id="error_ktp" class="text-danger"></span> </td>    
                    </td>
                    </tr>
                    <tr >
                        <th ><label for="telp"><h5>Telp<span style="color:red;font-size: 10px;">*wajib diisi!</span>:</h5></label>
                        </th>  
                        <td ><input type="text" class="form-control no_hp" id="telp" placeholder="62-xxx-xxxxx" name="telp" required>
                        </td>
                    </tr>
                    <tr >
                        <th ><label for="telp"><h5>Email:</h5></label></th>  
                        <td ><input type="text" placeholder="masukan alamat email" name="email" id="email" class="form-control" />
                         <span id="error_email" class="text-danger"></span> </td>
                    </tr>
                </table>
                        <table class="table noborder">
                
                        <th width="30%"><label for="jenis_kelamin"><h5>Jenis Kelamin<span style="color:red;font-size: 10px;">*wajib diisi!</span>:</h5></label></th>
                        <td><input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_laki" value="Laki-laki">
                        <label class="form-check-label" for="jenis_kelamin_laki">
                            <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;">Laki-laki
                        </label><br>
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_perempuan" value="Perempuan">
                        <label class="form-check-label" for="jenis_kelamin_perempuan">
                        <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;">Perempuan
                          </label></td> 
                        </table>
                    <table class="table noborder">
                        <th width="30%"><label for="alamat"><h5>Alamat Sesuai KTP:</h5></label></th>
                        <td><textarea class="form-control" id="alamat" placeholder="Masukkan alamat karyawan" name="alamat" required></textarea>
                        </td>
                    <tr >
                        <th ><label for="alamat"><h5>Alamat Domisili(Kosongkan apabila sama):</h5></label></th>
                        <td ><textarea class="form-control" id="alamat1" placeholder="Masukkan alamat karyawan" name="alamat1"></textarea></td>
                    </tr>
                    <tr >
                        <th > <label for="jk"><h5>Rumah Tempat Tingal:</h5></label></th>
                        <td ><select class="form-control"name="tempat_tinggal">
                        <option value="" selected>--Select Option--</option>
                        <option value="milik sendiri">Milik Sendiri</option>
                        <option value="milik orang tua">Miliki Orang Tua</option>
                        <option value="sewa kontrak">Sewa Kontrak</option>
                        <option value="indekost">indekost</option>
                        <option value="lain-lain">lain-lain</option>
                        </select></td>
                    </tr>
                    <tr >
                        <th><label for="tinggi"><h5>Tinggi:</h5></label></th>
                        <td><input type="number" class="form-control" id="tinggi" placeholder="dalam cm" name="tinggi" required></td>
                    </tr>
                    <tr >
                        <th><label for="berat"><h5>Berat:</h5></label></th>
                        <td><input type="number" class="form-control" id="berat" placeholder="dalam kg" name="berat" required>
                      </td>
                    </tr>
                </table>                                  
                <table class="table noborder">   
                   <th width="30%"><label for="Agama"><h5>Agama<span style="color:red;font-size: 10px;">*wajib diisi!</span> :</h5></label></th>
                   <td><select class="form-control"name="agama">
                        <option value="Islam" selected>Islam</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                        <option value="Hindu">Hindu</option>
                    </select></td> 
                    <tr >
                        <th ><label for="kebangsaan"><h5>Kebangsaan:</h5></label></th>
                        
                        <td ><input class="form-check-input" type="radio" name="kebangsaan" id="WNI" value="WNI">
                        <label class="form-check-label" for="WNI">
                        <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" >WNI
                        </label>
                        <br><input class="form-check-input" type="radio" name="kebangsaan" id="WNA" value="WNA">
                        <label class="form-check-label" for="WNA">
                        <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" >WNA
                    </label></td>
                    </tr>
                    <tr >
                        <th ><label for="tempat"><h5>Tempat lahir<span style="color:red;font-size: 10px;">*wajib diisi!</span>:</h5></label>
                        </th>
                        <td ><input type="text" class="form-control" id="tempat_lahir" placeholder="tempat lahir" name="tempat_lahir">
                        <span id="error_tempat_lahir" class="text-danger"></span>     
                    </td>
                    </tr>
                    <tr >
                        <th><label for="tgl_lhr"><h5>Tanggal lahir<span style="color:red;font-size: 10px;">*wajib diisi!</span>:</h5></label>
                        </th>
                        <td ><input type="date" class="form-control" id="tgl_lhr" placeholder="dalam angka" name="tgl_lahir" required>
                        </td>
                    </tr>
                </table>
                
                <table class="table noborder">
                <th width="30%"><label for="status"><h5>Status perkawinan</h5></label></th>
                    <td><input class="form-check-input" type="radio" name="status" id="belum_kawin" value="belum kawin" >
                    <label class="form-check-label" for="belum_kawin">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" >Belum Kawin
                    </label>
                    <br><input class="form-check-input" type="radio" name="status" id="kawin" value="kawin">
                    <label class="form-check-label" for="kawin">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" >Kawin
                    </label>
                    <br><input class="form-check-input" type="radio" name="status" id="janda/duda" value="janda/duda">
                    <label class="form-check-label" for="janda/duda">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" >Janda/Duda
                    </label>
                    <br><input class="form-check-input" type="radio" name="status" id="cerai" value="cerai">
                    <label class="form-check-label" for="cerai">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" > Cerai
                    </label>
                    </td>
                    <tr>  
                    <th><label for="kendaraan"><h5>Kendaraan:</h5></label></th>    
                    <td><input class="form-check-input" type="checkbox" name="kendaraan[]" id="mobil" value="mobil">
                    <label class="form-check-label" for="mobil">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" >Mobil
                    </label><br>
                    <input class="form-check-input" type="checkbox" name="kendaraan[]" id="motor" value="motor">
                    <label class="form-check-label" for="motor">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" > Motor
                    </label>
                    </td> 
                </tr>
                    <tr >
                        <th ><label for="jenis_sim"><h5>Jenis SIM:</h5></label></th>  
                        <td ><input class="form-check-input" type="checkbox" name="jenis_sim[]" id="sim" value="SIM A">
                    <label class="form-check-label" for="sim a">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" >SIM A
                    </label><br>
                    <input class="form-check-input" type="checkbox" name="jenis_sim[]" id="sim" value="SIM B1">
                    <label class="form-check-label" for="sim b1">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" > SIM B1
                    </label><br>
                    <input class="form-check-input" type="checkbox" name="jenis_sim[]" id="sim" value="SIM B1 UMUM">
                    <label class="form-check-label" for="sim b1">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" > SIM B1 UMUM
                    </label><br>
                    <input class="form-check-input" type="checkbox" name="jenis_sim[]" id="sim" value="SIM B2">
                    <label class="form-check-label" for="sim b2">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" > SIM B2
                    </label><br>
                    <input class="form-check-input" type="checkbox" name="jenis_sim[]" id="sim" value="SIM B2 UMUM">
                    <label class="form-check-label" for="sim b2">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" > SIM B2 UMUM
                    </label><br>
                    <input class="form-check-input" type="checkbox" name="jenis_sim[]" id="sim" value="SIM c">
                    <label class="form-check-label" for="sim c">
                    <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" > SIM C
                    </label>
                    </td>
                    </tr>
                    
                </table>
        <div align="center">
         <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>
      </div>
     </div>



     <div class="tab-pane fade" id="personal_details">
      <div class="panel panel-default">
       <div class="panel-heading">Data Keluarga</div>
       <div class="panel-body">
       <label for="hubungan_kelurga">Hubungan Keluarga:</label>
                    <table class="table noborder">
                    <th ><label for="ayah"><h5>Nama Ayah:</h5></label></th>
                        <td><input type="text" class="form-control" id="ayah" placeholder="masukan nama ayah kandung" name="ayah">
                        </td>
                        <tr >
                        <th ><label for="pekerjaan_ayah"><h5>Pekerjaan Ayah:</h5></label></th>
                        <td><input type="text" class="form-control" id="pekerjaan_ayah" placeholder="masukan pekerjaan ayah" name="pekerjaan_ayah" >
                        </td>
                    </tr>
                    <tr >
                        <th width="30%"><label for="ibu"><h5>Nama Ibu<span style="color:red;font-size: 10px;">*wajib diisi!</span>:</h5></label></th>
                        <td><input type="text" class="form-control" id="ibu" placeholder="masukan nama ibu kandung" name="ibu" required>
                        <span id="error_ibu" class="text-danger"></span></td>
                    </tr>
                    <tr >
                        <th ><label for="pekerjaan_ibu"><h5>Pekerjaan Ibu:</h5></label></th>
                        <td><input type="text" class="form-control" id="pekerjaan_ibu" placeholder="masukan pekerjaan ibu" name="pekerjaan_ibu" required>
                        </td>
                    </tr>
                    <tr>
                    <th><label for="referensi"><h5>Referensi <span style="color:red;font-size: 10px;">*wajib diisi!</span>:</h5></label></th>
                        <td><input class="form-check-input" type="radio" name="referensi" id="sekolah" value="sekolah">
                        <label class="form-check-label" for="sekolah">
                        <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" >Sekolah
                        </label><br>
                        <input class="form-check-input" type="radio" name="referensi" id="keluarga/kerabat/sodara" value="keluarga/kerabat/sodara">
                        <label class="form-check-label" for="keluarga/kerabat/sodara">
                        <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" >Keluarga/Kerabat/Sodara
                          </label><br>
                        <input class="form-check-input" type="radio" name="referensi" id="lainnya" value="lainnya">
                        <label class="form-check-label" for="lainnya">
                        <span style="font-size:15px; font-family: Arial, sans-serif;font-weight: normal;" >lainnya
                          </label></td> 
                          
                      </tr>
                      <tr>
                      <th ><label for="referensi_orang"><h5>Sebutkan nama orang yang mereferensikan anda?<span style="color:red;font-size: 10px;">*wajib diisi!</span></h5></label></th>
                        <td><input type="text" class="form-control" id="referensi_orang" placeholder="masukan nama" name="referensi_orang" required>
                        <span id="error_referensi_orang" class="text-danger"></span>        
                    </td>
                      </tr>
                </table>
        <div align="center">
         <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>
      </div>
     </div>

     <div class="tab-pane fade" id="contact_details">
      <div class="panel panel-default">
       <div class="panel-heading">Fill Contact Details</div>
       <div class="panel-body">
        <label for="riwayat_pendidikan">Riawayat Pendidikan :</label>
                    <table class="table noborder">
                        <th width="30%"><label for="pendidikan"><h5>Pendidikan Formal:<span style="color:red;font-size: 10px;">*wajib diisi!</span> :</h5></label></th>
                        <td ><select class="form-control" name="pendidikan">
                        <option value="" selected>--Select Option--</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMK/Sederajat" selected>SMK/SEDERAJAT</option>
                        <option value="diploma">Diploma I/II/III</option>
                        <option value="strata 1">Starata 1 (S1/D4)</option>
                        <option value="magister">Magister</option>
                        <option value="doktor">Doktor</option>
                    </select></td>
                    <tr >
                        <th ><label for="instansi_pendidikan"><h5>Sekolah/Perguruan Tinggi<span style="color:red;font-size: 10px;">*wajib diisi!</span> :</h5></label></th>
                        <td><input type="text" class="form-control" id="instansi_pendidikan" placeholder="masukan nama Sekolah/Perguruan Tinggi" name="instansi_pendidikan">
                        </td>
                    </tr>
                    <tr >
                        <th ><label for="Jurusan"><h5>Jurusan:</h5></label></th>
                        <td><input type="text" class="form-control" id="jurusan" placeholder="jurusan" name="jurusan" >
                        </td>
                    </tr> 
                    <tr >
                        <th ><label for="tahun_masuk"><h5>Tahun Awal Masuk:</h5></label></th>
                        <td><input type="text" class="form-control" id="tahun_masuk" placeholder="Tahun Awal Masuk" name="tahun_masuk">
                        </td>
                    </tr>
                    <tr >
                        <th ><label for="tahun_kelulusan"><h5>Tahun Kelulusan:</h5></label></th>
                        <td><input type="text" class="form-control" id="tahun_kelulusan" placeholder="Tahun Kelulusan" name="tahun_kelulusan">
                        </td>
                    </tr>
                    <tr >
                        <th ><label for="tempat_prakerin"><h5>Tempat Prakerin:</h5></label></th>
                        <td><input type="text" class="form-control" id="tempat_prakerin" placeholder="Tempat Praktek Kerja Industri" name="tempat_prakerin">
                        </td>
                    </tr>
                    <tr >
                        <th><label for="bidang_prakerin"><h5>Bidang Pekerjaan:</h5></label></th>
                        <td><input type="text" class="form-control" id="bidang_prakerin" placeholder="Bidang Pekerjaan" name="bidang_prakerin">
                        </td>
                    </tr>
                    <tr >
                        <th><label for="lama_prakerin"><h5>Lama Prakerin:</h5></label></th>
                        <td><input type="text" class="form-control" id="lama_prakerin" placeholder="Lama Prakerin (co:3 bulan)" name="lama_prakerin">
                        </td>
                    </tr>
                </table>
                <label for="pengalaman_bekerja">Pengalaman Bekerja :</label>
                    <table class="table noborder">
                        <th width="30%"><label for="instansi_bekerja"><h5>Instansi Tempat Bekerja</h5></label></th>
                        <td><input type="text" class="form-control" id="instansi_bekerja" placeholder="masukan instansi tempat bekerja" name="instansi_bekerja">
                        </td>
                    <tr >
                        <th ><label for="jabatan_kerja"><h5>Jabatan:</h5></label></th>
                        <td><input type="text" class="form-control" id="jabatan_kerja" placeholder="jabatan" name="jabatan_kerja">
                        </td>
                    </tr>
                    <tr >
                        <th ><label for="lama_bekerja"><h5>Lama Bekerja:</h5></label></th>
                        <td><input type="text" class="form-control" id="lama_bekerja" placeholder="lama bekerja (co:2 tahun)" name="lama_bekerja" >
                        </td>
                    </tr>
                    <tr >
                        <th ><label for="tahun_masuk"><h5>Tahun Masuk Kerja:</h5></label></th>
                        <td><input type="number" class="form-control" id="masuk_kerja" placeholder="Tahun Masuk Kerja" name="masuk_kerja">
                        </td>
                    </tr>
                    <tr >
                        <th ><label for="tahun_kelulusan"><h5>Tahun Keluar Kerja:</h5></label></th>
                        <td><input type="number" class="form-control" id="keluar_kerja" placeholder="Tahun Keluar Kerja" name="keluar_kerja">
                        </td>
                    </tr> 
                    <tr >
                        <th ><label for="alasan_berhenti"><h5>Alasan Berhenti:</h5></label></th>
                        <td ><select class="form-control" name="alasan_berhenti" required>
                        <option value="" selected>--Select Option--</option>
                        <option value="resign">Resign</option>
                        <option value="habis kontrak">Habis Kontrak</option>
                        <option value="pengalaman kerja">Pengalaman Kerja</option>
                        <option value="perusahaan tutup">Perusahaan Tutup</option>
                    </select></td>
                    </tr>
                    
                </table>
        <div align="center">
         <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
         <button type="submit" name="save" id="" class="btn btn-success btn-lg">Submit</button>
        </div>
        <br />
       </div>
      </div>
     </div>
    </div>
   </form>
   </div>
   </div>
  </div>
 </body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    // Format nomor HP.
	  $( '.no_hp' ).mask('62-000-0000-00000');
	})
</script>
</html>

<script>
$(document).ready(function(){

 $('#btn_login_details').click(function(){

  var error_email = '';
  var error_jabatan = '';
  var error_nama = '';
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var error_ktp = '';
  var ktp_validation = /^\d{16}$/;
  if($.trim($('#ktp').val()).length == 0)
  {
   error_ktp = 'Harap isi kolom nomor KTP';
   $('#error_ktp').text(error_ktp);
   $('#ktp').addClass('has-error');
  }
  else
  {
   if (!ktp_validation.test($('#ktp').val()))
   {
    error_ktp = 'Periksa kembali nomor KTP';
    $('#error_ktp').text(error_ktp);
    $('#ktp').addClass('has-error');
   }
   else
   {
    error_ktp = '';
    $('#error_ktp').text(error_ktp);
    $('#ktp').removeClass('has-error');
   }
  }

  if($.trim($('#email').val()).length == 0)
  {
   error_email = 'Email is required';
   $('#error_email').text(error_email);
   $('#email').addClass('has-error');
  }
  else
  {
   if (!filter.test($('#email').val()))
   {
    error_email = 'Invalid Email';
    $('#error_email').text(error_email);
    $('#email').addClass('has-error');
   }
   else
   {
    error_email = '';
    $('#error_email').text(error_email);
    $('#email').removeClass('has-error');
   }
  }

  if($.trim($('#jabatan').val()).length == 0)
  {
   error_jabatan = 'Harap isi kolom jabatan!';
   $('#error_jabatan').text(error_jabatan);
   $('#jabatan').addClass('has-error');
  }
  else
  {
   error_jabatan = '';
   $('#error_jabatan').text(error_jabatan);
   $('#jabatan').removeClass('has-error');
  }

  if($.trim($('#nama').val()).length == 0)
  {
   error_nama = 'Harap isi kolom nama!';
   $('#error_nama').text(error_nama);
   $('#nama').addClass('has-error');
  }
  else
  {
   error_nama = '';
   $('#error_nama').text(error_nama);
   $('#nama').removeClass('has-error');
  }

  if($.trim($('#tempat_lahir').val()).length == 0)
  {
   error_tempat_lahir = 'Harap isi kolom tempat lahir!';
   $('#error_tempat_lahir').text(error_tempat_lahir);
   $('#tempat_lahir').addClass('has-error');
  }
  else
  {
   error_tempat_lahir = '';
   $('#error_tempat_lahir').text(error_tempat_lahir);
   $('#tempat_lahir').removeClass('has-error');
  }

  if(error_email != '' || error_jabatan != '' || error_nama != '' || error_ktp != '' || error_tempat_lahir != '' )
  {
   return false;
  }
  else
  {
   $('#list_login_details').removeClass('active active_tab1');
   $('#list_login_details').removeAttr('href data-toggle');
   $('#login_details').removeClass('active');
   $('#list_login_details').addClass('inactive_tab1');
   $('#list_personal_details').removeClass('inactive_tab1');
   $('#list_personal_details').addClass('active_tab1 active');
   $('#list_personal_details').attr('href', '#personal_details');
   $('#list_personal_details').attr('data-toggle', 'tab');
   $('#personal_details').addClass('active in');
  }
 });

 $('#previous_btn_personal_details').click(function(){
  $('#list_personal_details').removeClass('active active_tab1');
  $('#list_personal_details').removeAttr('href data-toggle');
  $('#personal_details').removeClass('active in');
  $('#list_personal_details').addClass('inactive_tab1');
  $('#list_login_details').removeClass('inactive_tab1');
  $('#list_login_details').addClass('active_tab1 active');
  $('#list_login_details').attr('href', '#login_details');
  $('#list_login_details').attr('data-toggle', 'tab');
  $('#login_details').addClass('active in');
 });

 $('#btn_personal_details').click(function(){
  var error_first_name = '';
  var error_last_name = '';

  if($.trim($('#ibu').val()).length == 0)
  {
   error_ibu = 'Harap isi kolom ibu!';
   $('#error_ibu').text(error_ibu);
   $('#ibu').addClass('has-error');
  }
  else
  {
   error_ibu = '';
   $('#error_ibu').text(error_ibu);
   $('#ibu').removeClass('has-error');
  }

  if($.trim($('#referensi_orang').val()).length == 0)
  {
   error_referensi_orang = 'Harap diisi!';
   $('#error_referensi_orang').text(error_referensi_orang);
   $('#referensi_orang').addClass('has-error');
  }
  else
  {
   error_referensi_orang = '';
   $('#error_referensi_orang').text(error_referensi_orang);
   $('#referensi_orang').removeClass('has-error');
  }

  if(error_ibu != '' || error_referensi_orang !='')
  {
   return false;
  }
  else
  {
   $('#list_personal_details').removeClass('active active_tab1');
   $('#list_personal_details').removeAttr('href data-toggle');
   $('#personal_details').removeClass('active');
   $('#list_personal_details').addClass('inactive_tab1');
   $('#list_contact_details').removeClass('inactive_tab1');
   $('#list_contact_details').addClass('active_tab1 active');
   $('#list_contact_details').attr('href', '#contact_details');
   $('#list_contact_details').attr('data-toggle', 'tab');
   $('#contact_details').addClass('active in');
  }
 });

 $('#previous_btn_contact_details').click(function(){
  $('#list_contact_details').removeClass('active active_tab1');
  $('#list_contact_details').removeAttr('href data-toggle');
  $('#contact_details').removeClass('active in');
  $('#list_contact_details').addClass('inactive_tab1');
  $('#list_personal_details').removeClass('inactive_tab1');
  $('#list_personal_details').addClass('active_tab1 active');
  $('#list_personal_details').attr('href', '#personal_details');
  $('#list_personal_details').attr('data-toggle', 'tab');
  $('#personal_details').addClass('active in');
 });

});
</script>
