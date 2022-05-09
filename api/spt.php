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
    'data' => array()
);
//if get apps
if(isset($_GET['apps'])){
    $sp=mysqli_query($connect, "select s.id_spt, s.no_spt, s.id_pegawai, s.tugas, s.id_nppt, n.tgl_pergi, n.tgl_kembali, n.status, n.lama from spt s inner join nppt n on n.id_nppt=s.id_nppt");
    $dataResult=array();
    while($spt=mysqli_fetch_array($sp)){
        $id_peg=explode("-",$spt['id_pegawai']);
        $nama_pegawai=array();
        //foreach $id_peg
        foreach($id_peg as $i =>$key) {
            $pegawa=mysqli_query($connect,"select * from pegawai where id_pegawai='$key'");
            $pegawai = mysqli_fetch_assoc($pegawa);
            $nama_pegawai[] = $pegawai['nama'];
        }
        $id = $spt['id_spt'];
        $no_spt = $spt['no_spt'];
        $tugas = $spt['tugas'];
        $tgl_pergi = $spt['tgl_pergi'];
        $tgl_kembali = $spt['tgl_kembali'];
        $status = $spt['status'];
        $lama = $spt['lama'];

        //tampung data sebelum di masukkan ke json
        $dataResult[] = array(
            'id'=>$id,
            'no_spt' => $no_spt,
            'id_pegawai' => $id_peg,
            'nama_pegawai' => implode(" - ",$nama_pegawai),
            'tugas' => $tugas,
            'tgl_pergi' => $tgl_pergi,
            'tgl_kembali' => $tgl_kembali,
            'status' => $status,
            'lama' => $lama);
    }
    //json set
    $json['status'] = "sukses";
    $json['pesan'] = "Data berhasil diambil";
    $json['data'] = $dataResult;
    //return json
    echo json_encode($json);
}else{
    $json['status'] = "error";
    $json['pesan'] = 'Terjadi Kesalahan';
    echo json_encode($json);
}
