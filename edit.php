<?php
include "config/config.php";

if (isset($_GET["nik"])) {
    $nilai = $_GET["nik"];
    $hasil = keluar($nilai);

    if ($hasil) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Hapus Siswa Gagal";
    }
} else {
    echo "Invalid or missing ID parameter";
}
?>
