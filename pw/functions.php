<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_a_203040004_pw');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $gambar = htmlspecialchars($data['gambar']);
  $penulis = htmlspecialchars($data['penulis']);
  $harga = htmlspecialchars($data['harga']);

  $query = "INSERT INTO
              buku
              VALUES
              (null, '$nama', '$gambar', '$penulis', '$harga')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $gambar = htmlspecialchars($data['gambar']);
  $penulis = htmlspecialchars($data['penulis']);
  $harga = htmlspecialchars($data['harga']);

  $query = "UPDATE buku SET
              nama = '$nama',
              gambar = '$gambar',
              penulis = '$penulis',
              harga = '$harga',
              gambar = '$gambar'
              WHERE id = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}
?>