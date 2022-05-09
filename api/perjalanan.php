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
    $sp=mysqli_query($connect, "select l.id_pegawai, l.id_spt, l.id_lpd, l.hasil, l.tanggal, s.no_spt from lpd l inner join spt s on s.id_spt=l.id_spt");
    $dataResult=array();
    while($lpd=mysqli_fetch_array($sp)){
        $id_peg=explode("-",$lpd['id_pegawai']);
        //foreach $id_peg
        $nama_pegawai=array();
        foreach($id_peg as $i =>$key) {
            $pegawa=mysqli_query($connect,"select * from pegawai where id_pegawai='$key'");
            $pegawai = mysqli_fetch_assoc($pegawa);
            $nama_pegawai[] = $pegawai['nama'];
        }
        $id = $lpd['id_lpd'];
        $no_spt = $lpd['no_spt'];
        $hasil = $lpd['hasil'];
        $tanggal = $lpd['tanggal'];

        //tampung data sebelum di masukkan ke json
        $dataResult[] = array(
            'id' => $id,
            'no_spt' => $no_spt,
            'nama_pegawai' => implode(" - ",$nama_pegawai),
            'hasil'=>$hasil,
            'tanggal'=>$tanggal
        );
    }
    //json set
    $json['status'] = "sukses";
    $json['pesan'] = "Data berhasil diambil";
    $json['data'] = $dataResult;
    //return json
    echo json_encode($json);
}else if(isset($_POST['edit'])){
    $id_lpd = $_POST['id_lpd'];
    $hasil = $_POST['hasil'];
    //edit table lpd
    $edit = mysqli_query($connect, "update lpd set hasil='$hasil' where id_lpd='$id_lpd'");
    if($edit){
        $json['status'] = "sukses";
        $json['pesan'] = "Data berhasil diubah";
        $dataResult[] = array(
            'id' => "",
            'no_spt' => "",
            'nama_pegawai' => "",
            'hasil'=>"",
            'tanggal'=>""
        );
        $json['data'] = $dataResult;
        echo json_encode($json);
    }else{
        $json['status'] = "error";
        $json['pesan'] = "Data gagal diubah";
        $dataResult[] = array(
            'id' => "",
            'no_spt' => "",
            'nama_pegawai' => "",
            'hasil'=>"",
            'tanggal'=>""
        );
        $json['data'] = $dataResult;
        echo json_encode($json);
    }
}else if(isset($_POST['hapus'])){
    $id_lpd = $_POST['id_lpd'];
    //hapus table lpd
    $hapus = mysqli_query($connect, "delete from lpd where id_lpd='$id_lpd'");
    if($hapus){
        $json['status'] = "sukses";
        $json['pesan'] = "Data berhasil dihapus";
        $dataResult[] = array(
            'id' => "",
            'no_spt' => "",
            'nama_pegawai' => "",
            'hasil'=>"",
            'tanggal'=>""
        );
        $json['data'] = $dataResult;
        echo json_encode($json);
    }else{
        $json['status'] = "error";
        $json['pesan'] = "Data gagal dihapus";
        $dataResult[] = array(
            'id' => "",
            'no_spt' => "",
            'nama_pegawai' => "",
            'hasil'=>"",
            'tanggal'=>""
        );
        $json['data'] = $dataResult;
        echo json_encode($json);
    }
}else{
    $json['status'] = "error";
    $json['pesan'] = 'Terjadi Kesalahan';
    echo json_encode($json);
}
