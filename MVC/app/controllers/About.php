<?php

class About {
    public function index($nama = 'hasbulah', $pekerjaan = 'mahasiswa')
    {
        echo "Halo, nama saya $nama, saya adalah $pekerjaan";
    }
    public function page()
    {
        echo 'About/page';
    }
}