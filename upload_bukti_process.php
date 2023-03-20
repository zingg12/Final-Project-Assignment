<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'conn.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
  $gambar_material = $_FILES['bukti_pembayaran']['name'];

  //cek dulu jika merubah gambar produk jalankan coding ini
  if($gambar_material != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_material); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];   
    $nama_gambar_baru = $gambar_material; //menggabungkan angka acak dengan nama file sebenarnya
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query = "UPDATE shopping_cart SET bukti_pembayaran = '$nama_gambar_baru'";
                    $query .= "WHERE user_id = '$id'";
                    $result = mysqli_query($conn, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil ditambah.');window.location='profile.php';</script>";
                    }
  
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='profile.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "INSERT INTO shopping_cart (bukti_pembayaran) VALUE '$nama_gambar_baru'";
                    $query .= "WHERE id = '$id'";
      $result = mysqli_query($conn, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Aman.');window.location='profile.php';</script>";
      }
    }

    //update konfirmasi
    // $conn->query("UPDATE shopping_cart SET confirm='sudah bayar' WHERE user_id='$id'");