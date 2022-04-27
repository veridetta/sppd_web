<?php
include "../../config/koneksi.php";
include "../../config/fungsi_terbilang.php";
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
	font-size:15px;
}
#ol {margin:0}
#header {clear:both;text-align:center;}

#garis1{border-top:solid 1px #fff;border-right:1px solid #fff}
#garis2 {border-bottom:1px solid #000}
#g4{border-right:1px solid #000}
#table {
	font-family: Verdana, Arial, Helvetica, sans-serif; 
	font-size: 10pt;
	border-width: 1px;
	border-style: solid;
	border-color: #fff;
	border-collapse: collapse;
	margin: 10px 0px;
}
#table td{
	padding: 0.5em;
}
th{
	text-transform: uppercase;
	text-align: center;
	padding: 0.5em;
	border-width: 1px;
	border-style: solid;
	border-color: #000;
	border-collapse: collapse;
}
td{
	padding: 0.5em;
	vertical-align: top;
	border-width: 1px;
	border-style: solid;
	border-color: #000;
	border-collapse: collapse;
	text-align:center;
}
#table2 {
	font-family: Verdana, Arial, Helvetica, sans-serif; 
	font-size: 10pt;
}
#table2 tr {padding:0px}
#table2 td {padding:0px}
.table {border:none;
	font-family: Verdana, Arial, Helvetica, sans-serif; 
	font-size: 10pt;
}
.table tr {border:none;text-align:left;padding:0px;}
.table td {border:none;text-align:left;padding:0px;}

</style>
<body onLoad="javascript:print()">
<div id="wrapper">
<div style="width:300px;float:right;margin-bottom:8px;">BKU No. </div>
<div style="text-align:center;clear:both;"><h3>KWITANSI</h3></div>

<?php
$t=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM kwitansi,pegawai,golongan WHERE id_kwitansi='$_GET[id]' AND kwitansi.id_pegawai=pegawai.id_pegawai AND golongan.id_golongan=pegawai.id_golongan"));
$lama = $t['lama'];
$tot_lumpsum = $t['lama'] * $t['lumpsum'];
$tot_penginapan = $t['lama'] * $t['penginapan'];
$tot_transportasi = $t['lama'] * $t['transportasi'];
$tot_lumpsum_rupiah = number_format($tot_lumpsum,0,'','.');
$tot_penginapan_rupiah = number_format($tot_penginapan,0,'','.');
$tot_transportasi_rupiah = number_format($tot_transportasi,0,'','.');
$lumpsum_rupiah = number_format($t['lumpsum'],0,'','.');
$penginapan_rupiah = number_format($t['penginapan'],0,'','.');
$transportasi_rupiah = number_format($t['transportasi'],0,'','.');
$total = $tot_lumpsum + $tot_penginapan + $tot_transportasi;
$tot_rupiah = number_format($total,0,'','.');
$n=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM ttdkwitansi"));
$terbilang=terbilang($total, $style=3);

	echo "<table id='table' width=100%>
		  <tr><td width=240 height=170>
		  PEMBAYARAN TAHUN DINAS<br />
		  2022<br />
		  KODE REKENING<br />
		  5.2.2.15.01
		  </td><td colspan=2 rowspan=2 id='garis1' style='text-align:left'>
		  <table class='table' width='100%'>
		  <tr><td>Telah Di Terima Dari </td><td>$t[dari]</td></tr>
		  <tr><td>Uang Sejumlah </td><td><b>Rp. $tot_rupiah</b><br><i> $terbilang Rupaiah</i></td></tr>
		  <tr><td>Untuk Keperluan </td><td>$t[untuk]</td></tr>
		  </table>
		  </td>
		  <tr><td height=170>
		  SETUJU BAYAR<br />
		  Kuasa Pengguna Anggaran<br />
		  Kepala BAgian Kesejahteraan Rakat<br />
		  Setda Kab.Kepulauan Meranti<br /><br /><br /><br />
		  <u>$n[kabag]</u><br />
		  NIP. $n[nip_kabag]
		  </td></tr>
		  <tr>
		  <td height=140>
		  LUNAS BAYAR<br />
		  Bendahara Pengeluaran Pembantu<br />
		  <br /><br /><br />
		  <u>$n[bendahara]</u><br />
		  NIP. $n[nip_bendahara]</td>
		  <td>
		  Mengetahui<br />
		  Pejabat Pelaksana Teknis Kegiatan<br />
		  <br /><br /><br />
		  <u>$n[pptk]</u><br />
		  NIP. $n[nip_pptk]</td>
		  <td>
		  $rin[kotainstansi]<br />
		  Yang Menerima &nbsp;&nbsp;&nbsp;2015<br />
		  <br /><br /><br />
		  <u>$t[nama]</u><br />
		  NIP. $t[nip]</td>
		  </tr>
		  </table>";		

?>
<div style="text-align:center"><b><u>RINCIAN BIAYA PERJALANAN DINAS</u></b></div>
<?Php
	echo "<table class='table'>
	<tr><td width=100>An</td><td width=240 align='left'>: $t[nama]</td><td width=200>Gol</td><td>:$t[golongan]</td></tr>
	<tr><td>		SPPD No.</td><td>:		  </td><td>			Tanggal </td><td>:</td></tr>
	<tr><td>Dari/ Ke		</td><td>:$rin[kotainstansi]/$t[tujuan]  </td><td>		     Lama	</td><td>:$t[lama] hari</td></tr>
	</table>";
?>
<?php
	echo "<table id='table' width=100%>
		 <tr><th>No</th><th>Uraian</th><th>Jumlah</th><th>Keterangan</th></tr>
		 <tr><td>1</td><td style='text-align:left'>Lumpsum 
		 <div style='text-align:right'>$lama x Rp. $lumpsum_rupiah</div></td><td>Rp. $tot_lumpsum_rupiah</td>
		 <td></td></tr>
		 <tr><td>2</td><td style='text-align:left'>Penginapan
		 <div style='text-align:right'>$lama x Rp. $penginapan_rupiah</div></td><td>Rp. $tot_penginapan_rupiah</td>
		 <td></td></tr>
		 <tr><td>3</td><td style='text-align:left'>Trasportasi<br />
		 -Angkutan Laut	 		<br />
		 -Angkutan Darat 		<br />
		 -Angkutan Udara 		<br />
		 <div style='text-align:right'>$lama x Rp. $transportasi_rupiah</div>
		</td><td>RP. $tot_transportasi_rupiah</td><td></td></tr>
		 <tr><td colspan=2><div style='text-align:right'>TOTAL</div></td><td>Rp. $tot_rupiah</td><td></td></tr>
		 </table>";

echo "<div style='float:left;width:60%'>
	  Telah dibayar Sejumlah Rp. $tot_rupiah<br />
	  Bendahara Pengeluaran Pembantu<br />
<br />
<br />
<br />
	<u>ABU BAKAR SALEH,A.Ma</u><br />
	  NIP: 19750702 201001 1 017
	  </div>";
echo "<div style='float:left;width:40%'>
	  $rin[kotainstansi], ".date('d-m-Y')."<br />
	  Telah menerima Uang Sejumlah Rp. $tot_rupiah<br />
	  Yang Menerima
<br />
<br />
<br />
	<u>$t[nama]</u><br />
	  NIP: $t[nip]
	  </div>";?>
</body>
