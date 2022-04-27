<?php
session_start();
include "../../config/koneksi.php";
include "../../config/library.php";
$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='lpd' AND $act=='hapus') {
	mysqli_query($connect,"DELETE FROM lpd WHERE id_lpd='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='lpd' AND $act=='input'){
mysqli_query($connect,"INSERT INTO lpd(id_spt,id_pegawai,hasil,hari,tanggal) 
	  VALUES('$_POST[id_spt]','$_POST[id_pegawai]','$_POST[hasil]','$hari_ini','$tgl_sekarang')");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='lpd' AND $act=='update'){
mysqli_query($connect,"UPDATE lpd SET hasil = '$_POST[hasil]',
							hari = '$hari_ini',
							tanggal = '$tgl_sekarang'
							WHERE id_lpd = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>

