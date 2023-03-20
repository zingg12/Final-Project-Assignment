<?php
include('conn.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
session_start();
if (!isset($_SESSION['id'])) {
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/font/font-face.css">
  <link rel="stylesheet" href="bootstrap_custom.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>Add Product | Digitalie</title>
  <style type="text/css">
    * {
      font-family: "Poppins Regular";
    }



    button {
      background-color: #112f91;
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
      border: 0px;
      margin-top: 20px;
    }

    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }

    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #112f91;
    }

    div {
      width: 100%;
      height: auto;
    }

    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
  </style>
</head>

<body>
  <div class="container my-5">
    <a href="index_product.php"><img src="assets/Digitalie.svg" alt="" class=""></a>
    <h1 class="text-center font-semibold blue-theme">Add Product</h1>

    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
      <section class="base">
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
          <input type="text" name="deskripsi" />
        </div>
        <div>
          <label>Harga Beli</label>
          <input type="text" name="harga_beli" required="" />
        </div>
        <div>
          <label>Harga Jual</label>
          <input type="text" name="harga_jual" required="" />
        </div>
        <div>
          <label>Gambar Produk</label>
          <input type="file" name="gambar_produk" required="" />
        </div>
        <div>
          <button type="submit" class="btn button-theme text-light font-regular">Add Product</button>
        </div>
      </section>
    </form>
  </div>
</body>

</html>