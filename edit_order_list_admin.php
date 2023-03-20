<?php
// memanggil file koneksi.php untuk membuat koneksi
include 'conn.php';

//mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
  // ambil nilai id dari url dan disimpan dalam variabel $id
  $id = ($_GET["id"]);

  // menampilkan data dari database yang mempunyai id=$id
  $query = "SELECT
   * FROM shopping_cart JOIN material ON material.id_material=shopping_cart.id_material
 WHERE cart_id = $id";
  $result = mysqli_query($conn, $query);
  // jika data gagal diambil maka akan tampil error berikut
  if (!$result) {
    die("Query Error: " . mysqli_errno($conn) .
      " - " . mysqli_error($conn));
  }
  // mengambil data dari database
  $data = mysqli_fetch_assoc($result);
  // apabila data tidak ada pada database maka akan dijalankan perintah ini
  if (!count($data)) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='main.php';</script>";
  }
} else {
  // apabila tidak ada data GET id pada akan di redirect ke index.php
  echo "<script>alert('Masukkan data id.');window.location='main.php';</script>";
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
  <link rel="shortcut icon" type="image/svg" href="assets/D.svg" />
  <title>Edit Material | Digitalie</title>
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
    <h1 class="text-center font-semibold blue-theme">Update Orderlist</h1>

    <form method="POST" action="edit_order_list_admin_process.php" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="order_id" value="<?php echo $id; ?>" hidden />
        <div>
          <label>Order Id</label>
             <div class="input-group flex-nowrap">
              <span class="input-group-text" id="addon-wrapping">DL060802</span>
              <input readonly type="text" name="order_id" value="<?php echo $data['cart_id']; ?>" autofocus="" required="" />
            </div>
         
        </div>
        <div>
          <label>Total</label>
          <input readonly type="text" name="total" value="Rp. <?php echo $data['total']; ?>" />
        </div>
        <div>
          <label>Payment Status</label>
          <select class = "form-control font-regular" name="payment" id="payment">
            <option selected disabled value="">-</option>
            <option value="Sudah Bayar">Sudah Bayar</option>
            <option value="Pembayaran Gagal">Pembayaran Gagal</option>
            <option value="Belum Bayar">Belum Bayar</option>
          </select>
        </div>
        <div>
          <label>Order Status</label>
          <select class = "form-control font-regular" name="status" id="status">
          <option selected disabled value="">-</option>
          <option value="Order Dibatalkan">Order Dibatalkan</option>
            <option value="Order Sedang Diproses">Order Sedang Diproses</option>
            <option value="Order Sudah Selesai">Order Sudah Selesai </option>
            <option value="Order Sedang Dikirim">Order Dikirim</option>
          </select>
        </div>
        <div>
          <button type="submit" class="btn button-theme text-light">Simpan Perubahan</button>
        </div>
      </section>
    </form>
  </div>
</body>

</html>