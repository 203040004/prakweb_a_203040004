<?php

require 'functions.php';

// jika tidak ada id di url

// ambil id dari URl
$id = $_GET['id'];

// query buku berdasarkan id
$buku = query("SELECT * FROM buku where id = $id");

// cek apakah tombol sudah ditekan atau belum
if (isset($_POST["ubah"])) {


  // cek apakah data berhasil di tambahkan atau tidak
  if (ubah($_POST) > 0) {
    echo "
            <script>
                alert('data berhasil diubah')
                document.location.href = 'index.php';
            </script>
        ";
  } else {
    echo "alert('data gagal diubah';";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Buku</title>
</head>

<body>
  <h1>Ubah data buku</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $buku["id"]; ?>">
    <ul>
      <li>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" autofocus required value="<?= $buku["nama"]; ?>">
      </li>
      <li>
        <label for="gambar">Gambar : </label>
        <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        <img src="img/<?= $buku["gambar"]; ?>" alt="" width="120" style="display: block;" class="img-preview">
      </li>
      <li>
        <label for="penulis">Penulis : </label>
        <input type="text" name="penulis" id="penulis" autofocus required value="<?= $buku["penulis"]; ?>">
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data</button>
      </li>
    </ul>
  </form>

</body>

</html>