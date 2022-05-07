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
    $sp=mysqli_query($connect, "select s.id_sppd,s.no_sppd, s.id_pegawai, s.id_nppt, n.id_tujuan, n.maksud, t.tujuan from sppd s inner join nppt n on n.id_nppt=s.id_nppt inner join tujuan t on t.id_tujuan=n.id_tujuan");
    $dataResult=array();
    while($sppd=mysqli_fetch_array($sp)){
        $id_peg=explode("-",$sppd['id_pegawai']);
        //foreach $id_peg
        $nama_pegawai="";
        foreach($id_peg as $i =>$key) {
            $pegawa=mysqli_query($connect,"select * from pegawai where id_pegawai='$key'");
            $pegawai = mysqli_fetch_assoc($pegawa);
            $nama_pegawai .= $pegawai['nama'].", ";
        }
        $id = $sppd['id_sppd'];
        $no_sppd = $sppd['no_sppd'];
        $tugas = $sppd['maksud'];
        $tujuan = $sppd['tujuan'];


        //tampung data sebelum di masukkan ke json
        $dataResult[] = array(
            'id'=>$id,
            'no_sppd' => $no_sppd,
            'nama_pegawai' => $nama_pegawai,
            'tugas' => $tugas,
            'tujuan' => $tujuan);
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

if(isset($_POST['apps'])){
    $id_nppt = $_POST['id_nppt'];
    $maksud = $_POST['maksud'];
    //edit table nppd
    $edit = mysqli_query($connect, "update nppt set maksud='$maksud' where id_nppt='$id_nppt'");
    if($edit){
        $json['status'] = "sukses";
        $json['pesan'] = "Data berhasil diubah";
        echo json_encode($json);
    }else{
        $json['status'] = "error";
        $json['pesan'] = "Data gagal diubah";
        echo json_encode($json);
    }
}

//hapus
if(isset($_POST['hapus'])){
    $id_nppt = $_POST['id_nppt'];
    //hapus
    $hapus = mysqli_query($connect, "delete from nppt where id_lpd='$id_nppt'");
    if($hapus){
        $json['status'] = "sukses";
        $json['pesan'] = "Data berhasil dihapus";
        echo json_encode($json);
    }else{
        $json['status'] = "error";
        $json['pesan'] = "Data gagal dihapus";
        echo json_encode($json);
    }
}
