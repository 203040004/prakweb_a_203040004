<?php
// koneksi ke database
function koneksi()
{
  return mysqli_connect("localhost", "root", "", "prakweb_a_203040004_pw");
}
function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya satu data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    // echo "<script>
    //         alert ('pilih gambar terlebih dahulu');
    //       </script>";
    return 'akun.png';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
            alert ('yang anda pilih bukan gambar');
          </script>";
    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
            alert ('yang anda pilih bukan gambar');
          </script>";
    return false;
  }

  // cek ukuran file
  // maksimal 5mb == 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
            alert ('ukuran terlalu besar');
          </script>";
    return false;
  }

  // lolos pengecekkan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}


function tambah($data)
{
  // ambil data dari tiap elemen dalam form
  $conn = koneksi();

  $nama = htmlspecialchars($data["nama"]);
  $gambar = htmlspecialchars($data["gambar"]);
  $penulis = htmlspecialchars($data["penulis"]);

  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  // query insert data
  $query = "INSERT INTO buku
              VALUES
              (null, '$nama', '$gambar', '$penulis');
              ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  // mengahpus gambar di folder img
  $b = query("SELECT * FROM buku WHERE id = $id");
  if ($b['gambar'] != 'nophoto.jpg') {
    unlink('img/' . $b['gambar']);
  }

  mysqli_query($conn, "DELETE FROM buku WHERE id = $id ") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  // ambil data dari tiap elemen dalam form
  $conn = koneksi();
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $gambar = htmlspecialchars($data["gambar"]);
  $penulis = htmlspecialchars($data["penulis"]);
  $gambar_lama = htmlspecialchars($data["gambar_lama"]);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'akun.png') {
    $gambar = $gambar_lama;
  }

  // query insert data
  $query = "UPDATE mahasiswa SET
              nama = '$nama',
              nrp = '$gambar',
              email = '$penulis'
            WHERE id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}
