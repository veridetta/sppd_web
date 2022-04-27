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
if(isset($_POST['apps'])){
    //ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    //cek data di database
    $sql = "SELECT * FROM pegawai WHERE username='$username' AND password='$password'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_num_rows($query);
    //jika data cocok
    if($row > 0){
        //ambil data user
        $data = mysqli_fetch_array($query);
        //json set
        $json['status'] = "sukses";
        $json['pesan'] = "Login Sukses";
        $dataResult = array(
            'id' => $data['id_pegawai'],
            'nip' => $data['nip'],
            'nama' => $data['nama'],
            'pangkat' => $data['pangkat'],
            'id_golongan' => $data['id_golongan'],
            'jabatan' => $data['jabatan'],
            'unitkerja' => $data['unitkerja'],

        );
        $json['data'] = $dataResult;
        //return json
        echo json_encode($json);
    }
    //jika data tidak cocok
    else{
        //username & password salah
        $json['status'] = "error";
        $json['pesan'] = 'Username & Password Salah';
        echo json_encode($json);
    }
}else{
    $json['status'] = "error";
    $json['pesan'] = 'Terjadi Kesalahan';
    echo json_encode($json);
}
?>