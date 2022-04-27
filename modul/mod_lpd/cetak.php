<style type="text/css">
#wraper {width:700px;margin:0 auto;line-height:25px;}
h2 {text-align:center;text-decoration:underline;margin-top:40px;}
</style>
<body onLoad="javascript:print()">
<div id="wraper">
<?php
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
$tampil = mysqli_query($connect,"SELECT * FROM instansi");
$rin=mysqli_fetch_array($tampil);

      $t = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM lpd,pegawai,spt,golongan WHERE lpd.id_pegawai=pegawai.id_pegawai 
	  AND lpd.id_spt=spt.id_spt AND lpd.id_lpd='$_GET[id]' AND pegawai.id_golongan=golongan.id_golongan"));
	  $tanggalnya = tgl_indo($t['tanggal']);
echo "<h2>LAPORAN PERJALANAN DINAS </h2>";

echo "Pada hari ini $t[hari] tanggal $tanggalnya , Saya yang bertanda tangan dibawah ini : <br /><br />

	 <table>
	 <tr><td>Nama / Nip </td><td> : $t[nama]</td></tr>
	 <tr><td>Pangkat / Golongan </td><td> : $t[pangkat] / $t[golongan] </td></tr>
	 <tr><td>NIP				</td><td> : $t[nip] </td></tr>
	 <tr><td>Jabatan			</td><td> : $t[jabatan] </td></tr>
	 <tr><td>Unit Kerja			</td><td> : $t[unitkerja] </td></tr>
	 </table>";
  $c = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM spt,nppt,tujuan WHERE spt.id_nppt=nppt.id_nppt AND spt.id_spt='$t[id_spt]' AND tujuan.id_tujuan=nppt.id_tujuan"));
  $tgl_pergi = tgl_indo($c['tgl_pergi']);
  $tgl_kembali = tgl_indo($c['tgl_kembali']);
echo "<br />Telah melaksanakan Perjalanan Dinas dalam rangka $c[tugas] , berdasarkan
		  Surat Perintah Tugas Nomor : $c[no_spt] , dari tanggal $tgl_pergi s/d $tgl_kembali di $c[tujuan]";

echo "<br /><br />$t[hasil]<br />";	
echo "Demikianlah Laporan Hasil Perjalanan Dinas ini dibuat untuk dipergunakan seperlunya.<br /><br />";
echo "<div style='text-align:center;width:300px;float:right;'>
	  $rin[kotainstansi] , $tanggalnya<br>Yang Membuat Laporan";
echo "<br /><br /><br />";
echo "<b><u>
	  <div style='text-transform:uppercase;margin:0;padding:0'>$t[nama]</div></u></b>
	  NIP:$t[nip]
	  </div>";
	 
?>
</div>
</body>
