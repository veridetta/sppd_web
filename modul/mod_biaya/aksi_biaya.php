<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='biaya' AND $act=='update'){
	 $value = (count($_POST['id_tujuan']) > 0) ? implode('-', $_POST['id_tujuan']) : ""; 
    mysqli_query($connect,"UPDATE biaya SET id_tujuan = '$value',
								  lumpsum  = '$_POST[lumpsum]',
								 penginapan = '$_POST[penginapan]',
								 transportasi = '$_POST[transportasi]',
								 id_golongan = '$_POST[id_golongan]'
								 WHERE  id_biaya     = '$_POST[id]'");
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='biaya' AND $act=='hapus') {
	mysqli_query($connect,"DELETE FROM biaya WHERE id_biaya='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='biaya' AND $act=='input'){
	 $value = (count($_POST['id_tujuan']) > 0) ? implode('-', $_POST['id_tujuan']) : ""; 
	  mysqli_query($connect,"INSERT INTO biaya(id_tujuan,lumpsum,penginapan,transportasi,id_golongan) 
	  VALUES('$value','$_POST[lumpsum]','$_POST[penginapan]','$_POST[transportasi]','$_POST[id_golongan]')");
  header('location:../../media.php?module='.$module);
}

?>

