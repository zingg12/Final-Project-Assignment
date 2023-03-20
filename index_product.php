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
  <link rel="shortcut icon" type="image/svg" href="assets/D.svg" />
  <style type="text/css">
    * {
      font-family: "Poppins Regular";
    }
  </style>
</head>

<body>
  <div class="container my-5">
    <a href="main.php"><img src="assets/Digitalie.svg" alt="" class=""></a>
    <h1 class="text-center font-semibold blue-theme">Products</h1>
    <div class="text-center py-3">
      <a href="tambah_produk.php" type="button" class="btn button-theme text-light font-regular">+ &nbsp; Add Product</a>
    </div>
    <br />
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Dekripsi</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
        $query = "SELECT * FROM produk ORDER BY id ASC";
        $result = mysqli_query($conn, $query);
        //mengecek apakah ada error ketika menjalankan query
        if (!$result) {
          die("Query Error: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
        }

        //buat perulangan untuk element tabel dari data mahasiswa
        $no = 1; //variabel untuk membuat nomor urut
        // hasil query akan disimpan dalam variabel $data dalam bentuk array
        // kemudian dicetak dengan perulangan while
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nama_produk']; ?></td>
            <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
            <td>Rp<?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>
            <td>Rp<?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
            <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
            <td>
              <a class="btn button-theme text-light font-medium" href="#?id=<?php echo $row['id']; ?>">Edit</a> |
              <a class="btn button-theme2 blue-theme font-medium" href="#?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this data?  ')">Hapus</a>
            </td>
          </tr>

        <?php
          $no++; //untuk nomor urut terus bertambah 1
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>