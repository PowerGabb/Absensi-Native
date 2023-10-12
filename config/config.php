<?php 

$host = "localhost";
$password = "";
$user = "root";
$db = "karyawan";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    echo "Koneksi Ke Database Gagal";
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function tambah($data) {
    global $conn;
    
    $nik = $data["nik"];
    $nama = $data["nama"];
    $jabatan = $data["jabatan"];
    $keluar = NULL;

    $query = "INSERT INTO absen (NIK, nama, jabatan, masuk, keluar) VALUES ('$nik', '$nama', '$jabatan', now(), '$keluar')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "GAGAL WOI CEK ABSEN";
    }

    return 1;
}



function delete($nik){
    global $conn;

    $query = "DELETE FROM absen WHERE NIK='$nik'";
    $result = mysqli_query($conn, $query);

    return 1;
}


function update($data, $id) {
    global $conn;

    $nis = $data['nisn'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];

    $query = "UPDATE siswa SET nisn = '$nis', nama = '$nama', alamat = '$alamat' WHERE id = '$id'";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    return 1;
}


function keluar($nik) {
    global $conn;

    $query = "UPDATE absen SET keluar=now() WHERE NIK='$nik'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    return 1;
}



?>