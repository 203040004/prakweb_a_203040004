<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "prakweb_a_203040004_pw");




// ambil dari tabel film / query
$result = mysqli_query($conn, "SELECT * FROM buku");

// ubah data ke dalam array
// $row = mysqli_fetch_row($result); // array numerik
// $row = mysqli_fetch_assoc($result); // array associative
// $row = mysqli_fetch_array($result); // keduanya
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}
// tampung ke variabel buku
$buku = $rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buku</title>

</head>

<body style="background-color: darkSeaGreen;">

  <h1>Daftar Buku harian</h1>

  <table border="1" cellpading="10" cellspacing="0"style="background-color: aqua;">
    <tr>
      <th>#</th>
      <th>nama</th>
      <th>img</th>
      <th>penulis</th>
      <th>harga buku</th>
      <th>aksi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($buku as $row) : ?>
      <tr>
        <td><?= $i++; ?></td>
        
        <td><?= $row["nama"]; ?> </td>
        <td><img src="<?= $row["gambar"]; ?>" alt="" width="100"></td>
        <td><?= $row["penulis"]; ?></td>
        <td><?= $row["harga"];?></td>
        <td>

        <center>
                  <button>
                    <div class="update"> <a href="ubah.php?id=<?= $row["id"]; ?>" onclick="return confirm('Ubah Data??')" class="btn btn-primary mt-4">Ubah</a></div>
                  </button>
                  <button>
                    <div class="update"><a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus Data??')" class="btn btn-danger mt-3">Hapus</a></div>
                  </button>
                  <a href="tambah.php">
  <button>Tambah</button>
</a>
                </center>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

</body>

</html>