<?php

class produk {
    public $judul = "judul",
            $penulis = "penulis",
            $penerbit = "penerbit",
            $harga = "0";

    public function grtLabel() {
        return "$this->penulisan, $this->penerbit";
    }
     
}

$produk3 = new produk ();
$produk3->judul = "chitato";
$produk3->penulis = "jek";
$produk3->penertib = "luiz";
$produk3->harga = 30000;

$produk4 = new produk ();
$produk4->judul = "uncharted";
$produk4->penulis = "niel Druckmann";
$produk4->penertib = "sony computer";
$produk4->harga = 35000;

echo "Komik : " . $produk3->getLabel();
echo "<br>";
echo "Game : " . $produk4->getLabel();