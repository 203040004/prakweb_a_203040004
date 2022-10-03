<?php
session_start();

require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "data gagal ditambahkan!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Buku</title>
</head>

<body>
<h3>Form Tambah Data Buku</h3>

<form method="POST" action="">
  <input type="hidden" name="id">
  <ul>
    <li>
      <label>
        Nama :
        <input type="text" name="nama" autofocus required value="">
      </label>
    </li>

    <li>
      <label>
        Gambar :
        <input type="text" name="gambar" required value="">
      </label>
    </li>

    <li>
      <label>
        Penulis :
        <input type="text" name="penulis" required value="">
      </label>
    </li>

    <li>
      <label>
        Harga :
        <input type="text" name="harga" required value="">
      </label>
    </li>
    <li>
        <button type="submit" name="tambah">Tambah Buku!</button>
      </li>
    </ul>
  </form>
  </ul>
</form>
</body>

</html>