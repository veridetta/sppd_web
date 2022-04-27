<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='instansi' AND $act=='update'){
    mysqli_query($connect,"UPDATE instansi SET namainstansi  = '$_POST[namainstansi]',
								 keteranganinstansi = '$_POST[keteranganinstansi]',
								 alamatlengkapinstansi = '$_POST[alamatlengkapinstansi]',
								 kotainstansi = '$_POST[kotainstansi]',
								 kodepos = '$_POST[kodepos]',
								 telp = '$_POST[telp]',
								 faks = '$_POST[faks]',
								 pimpinaninstansi = '$_POST[pimpinaninstansi]',
								 namapimpinaninstansi = '$_POST[namapimpinaninstansi]',
								 nippimpinaninstansi = '$_POST[nippimpinaninstansi]',
								 jabatanpimpinaninstansi = '$_POST[jabatanpimpinaninstansi]'
								 WHERE  id     = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>

