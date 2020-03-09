<?php
$conn = new mysqli('localhost', 'id12777767_keluhan', '123456', 'id12777767_keluhan');

if(!$conn){
    echo json_encode(['status' => 0, 'msg' => 'Koneksi Error!!!']);
    exit();
}

if($_GET['nama']){
    $nama = $_GET['nama'];
    $keluhan = $_GET['keluhan'];
    $tanggal = date('d m Y');
    $cek_ = mysqli_query($conn, "SELECT * FROM keluhan WHERE keluhan='$keluhan'");
    $cek = mysqli_num_rows($cek_);
    if(!$cek){
        $insert = mysqli_query($conn, "INSERT INTO keluhan (nama, keluhan, tanggal) VALUES ('$nama', '$keluhan', '$tanggal')");
        if($insert){
            echo json_encode(['status' => 1, 'msg' => 'Data Berhasil di Masukkan.']);
            exit();
        }else{
            echo json_encode(['status' => 0, 'msg' => 'Data Tidak masuk.']);
            exit();
        }
    }else{
        echo json_encode(['status' => 0, 'msg' => 'Data Sudah Ada.']);
        exit();
    }
}

echo json_encode(['status' => 0, 'msg' => 'Error.']);
    exit();
