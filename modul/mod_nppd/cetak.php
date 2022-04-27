<style>
h2,h1,h3{ padding:0;margin:0;}
h1 {font-size:22px;font-weight:bold}
h2 {font-size:22px;font-weight:normal}
#wrapper {
	width:780px;
	margin:0 auto;
}
#ol {margin:0}
#logo {
	width:95px;
	float:left;	
}
hr{border-bottom: 5px double #000;}
#cop {
	float:left;width:600px;text-align:center;
}
#kodepos{clear:both;text-align:right}
#header {clear:both;text-align:center;margin-top:60px;}
</style>
<body onLoad="javascript:print()">
<div id="wrapper">
<div id="header">
<h1><u>NOTA PERMINTAAN PERJALANAN DINAS</u></h1>
</div>
<?php
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
$tampil = mysqli_query($connect,"SELECT * FROM instansi");
$rin=mysqli_fetch_array($tampil);

$qry=mysqli_query($connect,"Select * FROM nppt WHERE id_nppt='$_GET[id]'");
$r=mysqli_fetch_array($qry);
$value= explode("-",$r['id_pegawai']);
$no=0;
echo "<ol>";
for ($i=0;$i<count($value);$i++) {
	$data=$value[$i];
	$no++;
	$qs=mysqli_query($connect,"Select * from pegawai,golongan WHERE id_pegawai='$data'AND golongan.id_golongan=pegawai.id_golongan");
	$t=mysqli_fetch_array($qs); 
	
	echo "<table>
			<tr><td width=250>$no.Nama/NIP			</td><td>: <b> $t[nama]</b>/$t[nip]</td></tr>
		     <tr><td>&nbsp; &nbsp;Pangkat/Golongan Ruang	</td><td>: $t[pangkat]/$t[golongan]</td></tr>
			 <tr><td>&nbsp; &nbsp;Jabatan					</td><td>: $t[jabatan]</td></tr>
			 <tr><td>&nbsp; &nbsp;Unit Kerja				</td><td>: $t[unitkerja]</td></tr>
			 <tr></tr></table>";		
}
echo "<br>Mohon diberikan surat Perintah Tugas & Surat Perintah Perjalanan Dinas</ol>";
$qry=mysqli_query($connect,"Select * FROM nppt,tujuan,transportasi WHERE id_nppt='$_GET[id]' AND nppt.id_tujuan=tujuan.id_tujuan
AND nppt.id_transportasi=transportasi.id_transportasi");
$t=mysqli_fetch_array($qry);
$tglpergi= tgl_indo ($t['tgl_pergi']);
$tglkembali= tgl_indo ($t['tgl_kembali']);

	echo "<ol><table>
			<tr><td width=250>1. Tempat Tujuan		</td><td>: <b> $t[tujuan]</td></tr>
		     <tr><td>2. Maksud Perjalanan Dinas		</td><td>: $t[maksud]</td></tr>
			 <tr><td>3. Kendaraan Yang Dipergunakan	</td><td>: $t[transportasi]</td></tr>
			 <tr><td>4.	Lama Perjalanan				</td><td>: $t[lama] hari</td></tr>
			 <tr><td>&nbsp;&nbsp;&nbsp;a.  Tanggal Berangkat	</td><td>: $tglpergi</td></tr>
			 <tr><td>&nbsp;&nbsp;&nbsp;b.  Tanggal Kembali	</td><td>: $tglkembali</td></tr>
			 </table></ol>";	
?>
<div style="width:300px;float:right;">
DIKELUARKAN 	: <span style="text-transform:uppercase"><?= $rin['kotainstansi']?></span><br>
PADA TANGGAL  : <?=date('d-m-Y') ?><br>
<div style="font-weight:bold;text-align:center">
KUASA PENGGUNA ANGGARAN DINAS KESEJAHTERAAN SOSIAL<br/> <span style="text-transform:uppercase"><?= $rin['namainstansi']?></span></p>
<p>&nbsp;</p>
<br />
<p><u>Puji Haryanti, SH</u><br>
 Pejabat Pengadaan Barang dan Jasa<br>
NIP. 19591010 199103 1 003</p></div>
</div>
</body>