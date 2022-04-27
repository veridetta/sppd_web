<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='transportasi' AND $act=='update'){
    mysqli_query($connect,"UPDATE transportasi SET transportasi  = '$_POST[transportasi]'
								 WHERE  id_transportasi     = '$_POST[id]'");
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='transportasi' AND $act=='hapus') {
	mysqli_query($connect,"DELETE FROM transportasi WHERE id_transportasi='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='transportasi' AND $act=='input'){
	  mysqli_query($connect,"INSERT INTO transportasi(transportasi) 
	  VALUES('$_POST[transportasi]')");
  header('location:../../media.php?module='.$module);
}

?>

