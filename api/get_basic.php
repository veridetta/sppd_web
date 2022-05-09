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
    'pesan' => $pesan,
    'pegawai' => array(),
    'tujuan' => array(),
    'transportasi' => array()
);
//if get apps
if(isset($_GET['apps'])){
    $peg=mysqli_query($connect, "select * from pegawai");
    $datPeg=array();
    while($pegawai=mysqli_fetch_array($peg)){
        $id = $pegawai['id_pegawai'];
        $nama = $pegawai['nama'];
        $datPeg[] = array(
            'id'=>$id,
            'nama' => $nama);
    }
    $tuj = mysqli_query($connect, "select * from tujuan");
    while($tujuan=mysqli_fetch_array($tuj)){
        $id = $tujuan['id_tujuan'];
        $tujuan = $tujuan['tujuan'];
        $datTuj[] = array(
            'id'=>$id,
            'tujuan' => $tujuan);
    }
    $trans = mysqli_query($connect, "select * from transportasi");
    while($transportasi = mysqli_fetch_array($trans)){
        $id = $transportasi['id_transportasi'];
        $transportasie = $transportasi['transportasi'];
        $datTrans []=array(
            'id' =>$id,
            'transportasi' => $transportasie);
    }
    //json set
    $json['status'] = "sukses";
    $json['pesan'] = "Data berhasil diambil";
    $json['pegawai'] = $datPeg;
    $json['tujuan'] = $datTuj;
    $json['transportasi'] = $datTrans;
    //return json
    echo json_encode($json);
}else{
    $json['status'] = "error";
    $json['pesan'] = 'Terjadi Kesalahan';
    echo json_encode($json);
}
