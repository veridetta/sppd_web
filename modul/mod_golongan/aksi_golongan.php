<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='golongan' AND $act=='update'){
    mysqli_query($connect,"UPDATE golongan SET golongan  = '$_POST[golongan]'
								 WHERE  id_golongan     = '$_POST[id]'");
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='golongan' AND $act=='hapus') {
	mysqli_query($connect,"DELETE FROM golongan WHERE id_golongan='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='golongan' AND $act=='input'){
	  mysqli_query($connect,"INSERT INTO golongan(golongan) 
	  VALUES('$_POST[golongan]')");
  header('location:../../media.php?module='.$module);
}

?>

