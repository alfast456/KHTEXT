<?php

require 'vendor/autoload.php';

use CodeIgniter\Database\Config;

try {
    // Hubungkan ke database
    $db = Config::connect();

    // Tes query sederhana
    $query = $db->query('SELECT * FROM user');
    if ($query) {
        echo "Koneksi database berhasil!";
    } else {
        echo "Koneksi database gagal!";
    }
} catch (\Exception $e) {
    echo "Kesalahan: " . $e->getMessage();
}
