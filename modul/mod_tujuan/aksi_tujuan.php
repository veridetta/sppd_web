<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='tujuan' AND $act=='update'){
    mysqli_query($connect,"UPDATE tujuan SET tujuan  = '$_POST[tujuan]'
								 WHERE  id_tujuan     = '$_POST[id]'");
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='tujuan' AND $act=='hapus') {
	mysqli_query($connect,"DELETE FROM tujuan WHERE id_tujuan='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='tujuan' AND $act=='input'){
	  mysqli_query($connect,"INSERT INTO tujuan(tujuan) 
	  VALUES('$_POST[tujuan]')");
  header('location:../../media.php?module='.$module);
}

?>

