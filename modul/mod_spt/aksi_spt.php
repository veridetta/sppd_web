<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='spt' AND $act=='hapus') {
	mysqli_query($connect,"DELETE FROM spt WHERE id_spt='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='spt' AND $act=='input'){
	  $value = (count($_POST['id_pegawai']) > 0) ? implode('-', $_POST['id_pegawai']) : ""; 
	  mysqli_query($connect,"INSERT INTO spt(id_pegawai,no_spt,tugas,dasar_hukum) 
	  VALUES('$value','$_POST[no_spt]','$_POST[tugas]','$_POST[dasar_hukum]')");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='spt' AND $act=='update'){
	  $value = (count($_POST['id_pegawai']) > 0) ? implode('-', $_POST['id_pegawai']) : ""; 
    mysqli_query($connect,"UPDATE spt SET id_pegawai  = '$value',
								no_spt = '$_POST[no_spt]',
								 tugas = '$_POST[tugas]',
								 dasar_hukum = '$_POST[dasar_hukum]'
								 WHERE  id_spt    = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}

?>

