<?php
include "../../config/koneksi.php";
$tampil = mysqli_query($connect,"SELECT * FROM instansi");
$rin=mysqli_fetch_array($tampil);

?>
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
	text-align:center;
}

#kodepos{clear:both;text-align:right}
#header {clear:both;text-align:center}
</style>
<body onLoad="javascript:print()">
<div id="wrapper">
<div id="cop">
  <h2><span style="text-transform:uppercase"><?= $rin['namainstansi']?></span></h2>
  <h1><span style="text-transform:uppercase"><?= $rin['keteranganinstansi']?></span></h1>
  <?= $rin['alamatlengkapinstansi']?><br/>Telp. <?= $rin['telp']?> Fax. <?= $rin['faks']?> Kode Pos : <?= $rin['kodepos']?><br>
</div>
<div id="kodepos"></div>
<hr>
<?php
$qry=mysqli_query($connect,"Select * FROM spt WHERE id_spt='$_GET[id]'");
$r=mysqli_fetch_array($qry);
echo "
<div id='header'>
<h2><u>SURAT PERINTAH TUGAS</u></h2>
NOMOR : &nbsp;&nbsp;&nbsp;&nbsp;  /$r[no_spt]
<div id='isi'>
<table>
<tr><td width='180' valign='top'>Menimbang</td><td>Bahwa untuk kelancaran dalam $r[tugas]</td></tr>
<tr><td valign='top'>Dasar</td><td> 
<ol style='padding:0;margin-left:0'>
$r[dasar_hukum]
</ol>
</td></tr>
</table>
<h1>MEMERINTAHKAN</h1></div>
<div style='float:left'>Kepada :</div><br>";

$value= explode("-",$r['id_pegawai']);
$no=0;
echo "<ol>";
for ($i=0;$i<count($value);$i++) {
	$data=$value[$i];
	$no++;
	$qs=mysqli_query($connect,"Select * from pegawai,golongan WHERE id_pegawai='$data' AND golongan.id_golongan=pegawai.id_golongan");
	$t=mysqli_fetch_array($qs); 
	
	echo "<table>
			<tr><td width=250>$no.Nama/NIP			</td><td>: <b> $t[nama]</b>/$t[nip]</td></tr>
		     <tr><td>&nbsp; &nbsp;Pangkat/Golongan Ruang	</td><td>: $t[pangkat]/$t[golongan]</td></tr>
			 <tr><td>&nbsp; &nbsp;Jabatan					</td><td>: $t[jabatan]</td></tr>
			 <tr><td>&nbsp; &nbsp;Unit Kerja				</td><td>: $t[unitkerja]</td></tr></table>";		
}
echo "</ol>";
echo "<div style='float:left;width:50px;'>Untuk :</div>";
echo "<div style='float:left;width:730px;padding:0'>$r[tugas]</div>";

?>
</div>
<div style="width:300px;float:right;margin-top:10px;">
DIKELUARKAN 	: <span style="text-transform:uppercase"><?= $rin['kotainstansi']?></span><br>
PADA TANGGAL  : <?=date('d-m-Y') ?><br>
<div style="text-align:center;font-weight:bold">
An.<span style="text-transform:uppercase"><?= $rin['pimpinaninstansi']?></span><br>
<span style="text-transform:uppercase"><?= $rin['keteranganinstansi']?></span></p>
<p>&nbsp;</p>
<p>
<u><?= $rin['namapimpinaninstansi']?></u><br/>

<span style="text-transform:uppercase"><?= $rin['jabatanpimpinaninstansi']?></span><br/>

NIP. <?= $rin['nippimpinaninstansi']?>
</p>
</div>
</div>

</div>
</body>
