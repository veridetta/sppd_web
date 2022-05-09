<?php
//include koneksi
include "../config/koneksi.php";
//content type json
header('Content-Type: application/json');
//handle post
$pesan="";
$status="";
$json = array(
    'status' => $status,
    'pesan' => $pesan
);
if(isset($_POST['apps'])){
    $id_pegarawai = $_POST['id_pegawai'];
    $maksud = $_POST['maksud'];
    $id_tujuan = $_POST['id_tujuan'];
    $tgl_pergi = $_POST['tgl_pergi'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $id_transportasi = $_POST['id_transportasi'];
    $lama = $_POST['lama'];
    //insert nppt
    $sql = mysqli_query($connect,"insert into nppt (id_pegawai, maksud, id_tujuan, tgl_pergi, tgl_kembali, id_transportasi, lama, status) values ('$id_pegarawai', '$maksud', '$id_tujuan', '$tgl_pergi', '$tgl_kembali', '$id_transportasi', '$lama','Y')");
    if($sql){
        $json['status'] = "sukses";
        $json['pesan'] = "Data berhasil ditambah";
        echo json_encode($json);
    }else{
        $json['status'] = "error";
        $json['pesan'] = "Data gagal ditambah";
        echo json_encode($json);
    }
}