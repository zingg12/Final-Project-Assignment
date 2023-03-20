<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'conn.php';

	// membuat variabel untuk menampung data dari form
  $nama_material   = $_POST['nama_material'];
  $deskripsi_material     = $_POST['deskripsi_material'];
  $harga_beli_material    = $_POST['harga_beli_material'];
  $harga_jual_material   = $_POST['harga_jual_material'];
  $gambar_material = $_FILES['gambar_material']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gambar_material != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_material); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_material']['tmp_name'];   
  $nama_gambar_baru = $gambar_material; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO material (nama_material, deskripsi_material, harga_beli_material, harga_jual_material, gambar_material) VALUES ('$nama_material', '$deskripsi_material', '$harga_beli_material', '$harga_jual_material', '$nama_gambar_baru')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index_material.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_material.php';</script>";
            }
} else {
   $query = "INSERT INTO material (nama_material, deskripsi_material, harga_beli_material, harga_jual_material, gambar_material) VALUES ('$nama_material', '$deskripsi_material', '$harga_beli_material', '$harga_jual_material', null)";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index_material.php';</script>";
                  }
}