<?php 
    include 'koneksi.php';
    ?>
    <h1 align="center">Data Pelamar PT RPA</h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Jabatan Dilamar</th>
            <th>Nama</th>
            <th>KTP</th>
            <th>Telp</th>
            <th>Email</th>
            <th>Alamat KTP</th>
            <th>Alamat Domisili</th>
            <th>Jenis Kelamin</th>
            <th>Tinggi</th>
            <th>Berat</th>
            <th>Agama</th>
            <th>Kebangsaan</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Status Pernikahan</th>
            <th>Tempat Tinggal</th>
            <th>Kendaraan</th>
            <th>SIM</th>
            <th>Nama Ibu</th>
            <th>Pekerjaan Ibu</th>
            <th>Ayah</th>
            <th>Pekerjaan Ayah</th>
            <th>Referensi</th>
            <th>Nama Pereferensi</th>
            <th>Pendidikan</th>
            <th>Instansi Pendidikan</th>
            <th>Jurusan</th>
            <th>Tahun Masuk</th>
            <th>Tahun Lulus</th>
            <th>Tempat Prakerin</th>
            <th>Bidang Prakerin</th>
            <th>Lama Prakerin</th>
            <th>Instansi Kerja</th>
            <th>Jabatan</th>
            <th>Lama Bekerja</th>
            <th>Tahun Masuk</th>
            <th>Tahun Keluar</th>
            <th>Alasan Berhenti</th>
        </tr>
        <?php 
        $statement = mysqli_query($conn,"SELECT pelamar.jabatan,pelamar.nama,pelamar.ktp, pelamar.telp,pelamar.mail,pelamar.jenis_sim, pelamar.alamat_kota, pelamar.alamat_luar,pelamar.jenis_kelamin, pelamar.tinggi, pelamar.berat,
        pelamar.agama, pelamar.kebangsaan, pelamar.kendaraan, pelamar.tempat_lahir,pelamar.tgl_lahir, pelamar.status, pelamar.tempat_tinggal, keluarga.ibu,keluarga.pekerjaan_ibu,keluarga.ayah, keluarga.pekerjaan_ayah,keluarga.referensi,keluarga.referensi_orang,
        pengalaman.pendidikan,pengalaman.instansi_pendidikan,pengalaman.jurusan, pengalaman.tahun_masuk, pengalaman.tahun_kelulusan, pengalaman.tempat_prakerin, pengalaman.bidang_prakerin, pengalaman.lama_prakerin, pengalaman.instansi_bekerja, pengalaman.jabatan_kerja, pengalaman.lama_bekerja, 
        pengalaman.masuk_kerja, pengalaman.keluar_kerja,pengalaman.alasan_berhenti
        FROM pelamar
        INNER JOIN keluarga ON pelamar.id = keluarga.id
        INNER JOIN pengalaman ON pelamar.id = pengalaman.id ");
         
        $no = 1;
        foreach ($statement as $key ) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $key['jabatan']; ?></td>
            <td><?php echo $key['nama']; ?></td>
            <td><?php echo $key['ktp']; ?></td>
            <td><?php echo $key['telp']; ?></td>
            <td><?php echo $key['mail']; ?></td>
            <td><?php echo $key['alamat_kota']; ?></td>
            <td><?php echo $key['alamat_luar']; ?></td>
            <td><?php echo $key['jenis_kelamin']; ?></td>
            <td><?php echo $key['tinggi']; ?> cm</td>
            <td><?php echo $key['berat']; ?> kg</td>
            <td><?php echo $key['agama']; ?></td>
            <td><?php echo $key['kebangsaan']; ?></td>
            <td><?php echo $key['tempat_lahir']; ?></td>
            <td><?php echo $key['tgl_lahir']; ?></td>
            <td><?php echo $key['status']; ?></td>
            <td><?php echo $key['tempat_tinggal']; ?></td>
            <td><?php echo $key['kendaraan']; ?></td>
            <td><?php echo $key['jenis_sim']; ?></td>
            <td><?php echo $key['ibu']; ?></td>
            <td><?php echo $key['pekerjaan_ibu']; ?></td>
            <td><?php echo $key['ayah']; ?></td>
            <td><?php echo $key['pekerjaan_ayah']; ?></td>
            <td><?php echo $key['referensi']; ?></td>
            <td><?php echo $key['referensi_orang']; ?></td>
            <td><?php echo $key['pendidikan']; ?></td>
            <td><?php echo $key['instansi_pendidikan']; ?></td>
            <td><?php echo $key['jurusan']; ?></td>
            <td><?php echo $key['tahun_masuk']; ?></td>
            <td><?php echo $key['tahun_kelulusan']; ?></td>
            <td><?php echo $key['tempat_prakerin']; ?></td>
            <td><?php echo $key['bidang_prakerin']; ?></td>
            <td><?php echo $key['lama_prakerin']; ?></td>
            <td><?php echo $key['instansi_bekerja']; ?></td>
            <td><?php echo $key['jabatan_kerja']; ?></td>
            <td><?php echo $key['lama_bekerja']; ?></td>
            <td><?php echo $key['masuk_kerja']; ?></td>
            <td><?php echo $key['keluar_kerja']; ?></td>
            <td><?php echo $key['alasan_berhenti']; ?></td>

        </tr>
        <?php
        } 
        ?>
    </table>
