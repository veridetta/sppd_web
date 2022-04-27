<?php
$aksi="modul/mod_kwitansi/aksi_kwitansi.php";
$print ="modul/mod_kwitansi/cetak.php";

switch($_GET['act']){
default:
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-file-alt"></i> Data Kwitansi</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data Kwitansi</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama</th>
						<th>Tujuan</th>
						<th>Lama</th>
						<th>Lumpsum</th>
						<th>Penginapan</th>
						<th>Transportasi</th>
						<th>Total</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no=0;
				$tampil = mysqli_query($connect,"SELECT * FROM kwitansi,pegawai WHERE kwitansi.id_pegawai=pegawai.id_pegawai");
				while ($t=mysqli_fetch_array($tampil)){
				$lumpsum= $t['lama'] * $t['lumpsum'];
				$penginapan= $t['lama'] * $t['penginapan'];
				$transportasi= $t['lama'] * $t['transportasi'];
				$tot =$lumpsum + $penginapan + $transportasi;
				$total = number_format($tot,0,'','.');
				$no++;
				?>
					<tr align="center">
						<td><?php echo $no ?></td>
						<td><?php echo $t['nama'] ?></td>
						<td><?php echo $t['tujuan'] ?></td>
						<td><?php echo $t['lama'] ?></td>
						<td><?php echo $lumpsum ?></td>
						<td><?php echo $penginapan ?></td>
						<td><?php echo $transportasi ?></td>
						<td>Rp. <?php echo $total ?></td>
						<td>						
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Cetak Data" target="_blank" href="<?=$print?>?module=kwitansi<?=$act?>=print&id=<?php echo $t['id_kwitansi']?>" class="btn btn-secondary btn-sm"><i class="fa fa-print"></i></a>
								<?php if($_SESSION['level']!="kabag") {?>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=kwitansi&act=hapus&id=<?php echo $t['id_kwitansi'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								<?php } ?>
							</div>
						</td>
					</tr>
					<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
break;
case "tambahkwitansi":
$t=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM sppd,pegawai,golongan,nppt,tujuan WHERE id_sppd='$_GET[id]'
AND sppd.id_pegawai=pegawai.id_pegawai AND golongan.id_golongan=pegawai.id_golongan AND sppd.id_nppt=nppt.id_nppt
AND tujuan.id_tujuan=nppt.id_tujuan"));
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-file-alt"></i> Data Kwitansi</h1>

	<a href="?module=kwitansi" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Data Kwitansi</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=kwitansi&act=input'>
		<div class="card-body">
			<input type="hidden" name="id_pegawai" value="<?=$_GET['id_pegawai']?>">
			<input type="hidden" name="id_sppd" value="<?=$t['id_sppd']?>">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama</label>
					<input autocomplete="off" type="text" value="<?=$t['nama']?>" readonly required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Golongan</label>
					<input autocomplete="off" type="text" value="<?=$t['golongan']?>" readonly required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tujuan</label>
					<input autocomplete="off" type="text" value="<?=$t['tujuan']?>" readonly required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Lama Perjalanan</label>
					<input autocomplete="off" type="text" value="<?=$t['lama']?>" readonly required class="form-control"/>
				</div>
				<?php
				$c=mysqli_query($connect,"SELECT * FROM biaya WHERE id_golongan='$t[id_golongan]' AND id_tujuan LIKE '%$t[id_tujuan]%'");
				$b=mysqli_fetch_array($c);
				$lumpsum = $t['lama'] * $b['lumpsum'];
				$penginapan = $t['lama'] * $b['penginapan'];
				$transportasi = $t['lama'] * $b['transportasi'];
				?>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Lumpsum</label>
					<input autocomplete="off" type="text" value="<?=$t['lama']?> x <?=$b['lumpsum']?>" readonly required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Total Lumpsum</label>
					<input autocomplete="off" type="text" name="" value="<?=$lumpsum?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Penginapan</label>
					<input autocomplete="off" type="text" name="" value="<?=$t['lama']?> x <?=$b['penginapan']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Total Penginapan</label>
					<input autocomplete="off" type="text" name="" value="<?=$penginapan?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Transportasi</label>
					<input autocomplete="off" type="text" name="" value="<?=$transportasi?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Sudah Diterima Dari</label>
					<input autocomplete="off" type="text" name="dari" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Untuk Pembayaran</label>
					<input autocomplete="off" type="text" name="untuk" required class="form-control"/>
				</div>
				<input type="hidden" name="tujuan" value="<?=$t['tujuan']?>">
				<input type="hidden" name="lama" value="<?=$t['lama']?>">
				<input type="hidden" name="lumpsum" value="<?=$b['lumpsum']?>">
				<input type="hidden" name="penginapan" value="<?=$b['penginapan']?>">
				<input type="hidden" name="transportasi" value="<?=$b['transportasi']?>">
			</div>
		</div>
		<div class="card-footer text-right">
            <button name="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> </button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> </button>
        </div>
	</form>
</div>
<?php
break;
}
?>
