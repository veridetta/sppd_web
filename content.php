<?php
ob_start();
error_reporting(0);
$mod = $_GET['module'];

// Home
if ($mod=='home'){
	include "home.php";
}
// SPPD
elseif ($mod=='nppd'){
    include "modul/mod_nppd/nppd.php";
}
elseif ($mod=='tambahnppd'){
    include "modul/mod_nppd/tambahnppd.php";
}
elseif ($mod=='spt'){
    include "modul/mod_spt/spt.php";
}
elseif ($mod=='sppd'){
    include "modul/mod_sppd/sppd.php";
}
// Pegawai
elseif ($mod=='pegawai'){
    include "modul/mod_pegawai/pegawai.php";
}
elseif ($mod=='golongan'){
    include "modul/mod_golongan/golongan.php";
}
// Biaya
elseif ($mod=='biaya'){
    include "modul/mod_biaya/biaya.php";
}
elseif ($mod=='tujuan'){
    include "modul/mod_tujuan/tujuan.php";
}
elseif ($mod=='transportasi'){
    include "modul/mod_transportasi/transportasi.php";
}
// Laporan
elseif ($mod=='kwitansi'){
    include "modul/mod_kwitansi/kwitansi.php";
}
elseif ($mod=='lpd'){
    include "modul/mod_lpd/lpd.php";
}
elseif ($mod=='riwayat'){
  include "modul/mod_lpd/riwayat.php";
}
// Setting
elseif ($mod=='ttdkwitansi'){
    include "modul/mod_ttdkwitansi/ttdkwitansi.php";
}
elseif ($mod=='instansi'){
    include "modul/mod_instansi/instansi.php";
}
elseif ($mod=='password'){
    include "modul/mod_password/password.php";
}

// Apabila modul tidak ditemukan
else{
  include "404.php";
}
?>
