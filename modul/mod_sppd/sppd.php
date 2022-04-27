<?php
$aksi="modul/mod_sppd/aksi_sppd.php";
$print ="modul/mod_sppd/cetak.php";

switch($_GET['act']){
default:
$tampil = mysqli_query($connect,"SELECT * FROM sppd,nppt,pegawai,tujuan WHERE sppd.id_nppt=nppt.id_nppt AND pegawai.id_pegawai=sppd.id_pegawai AND nppt.id_tujuan=tujuan.id_tujuan");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-envelope-open-text"></i> Data SPPD (Surat Perintah Perjalanan Dinas)</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data SPPD</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama</th>
						<th>No SPPD</th>
						<th>Tugas</th>
						<th>Tujuan</th>
						<th>Kwitansi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					while ($r=mysqli_fetch_array($tampil)){
					?>
					<tr align="center">
						<td class="align-middle"><?php echo $no ?></td>
						<td class="align-middle"><?php echo $r['nama']?></td>
						<td class="align-middle"><?php echo $r['no_sppd'] ?></td>
						<td class="align-middle text-justify"><?php echo $r['maksud'] ?></td>
						<td class="align-middle"><?php echo $r['tujuan'] ?></td>
						<td class="align-middle">
							<?php
							$cek=mysqli_num_rows(mysqli_query($connect,"SELECT * FROM kwitansi WHERE id_sppd='$r[id_sppd]'"));
							if ($cek > 0 ) {
							?>
							<a data-toggle="tooltip" data-placement="bottom" title="Kwitansi Telah Dibuat" href="#" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
							<?php
							}else {
							?>
							<a data-toggle="tooltip" data-placement="bottom" title="Buat Kwitansi" href="?module=kwitansi&act=tambahkwitansi&id=<?=$r['id_sppd']?>&id_pegawai=<?=$r['id_pegawai']?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
							<?php
							}
							?>
						</td>
						<td class="align-middle">
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Cetak Data" target="_blank" href="<?=$print?>?module=sppd<?=$act?>=print&id=<?php echo $r['id_sppd']?>" class="btn btn-secondary btn-sm"><i class="fa fa-print"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=sppd&act=hapus&id=<?php echo $r['id_sppd'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
							</div>
						</td>				
					</tr>
					<?php
					$no++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
break;
case "tambahsppd":
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-envelope-open-text"></i> Data SPPD (Surat Perintah Perjalanan Dinas)</h1>

	<a href="?module=sppd" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Data SPPD</h6>
    </div>
	
	<form method='POST' action='<?=$aksi?>?module=sppd&act=input'>
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pilih Pegawai</label>
					<select name="id_pegawai[]" required class="form-control selectpicker" multiple>
						<?php
						$sql=mysqli_query($connect,"SELECT * FROM spt WHERE id_spt='$_GET[id]'");
						while($r=mysqli_fetch_array($sql)) {
							$value =explode('-',$r['id_pegawai']);
							$nomer= 0;
							for($i=0;$i<count($value);$i++) { 
								$data=$value[$i];
								$nomer++;
								$sql=mysqli_query($connect,"SELECT * FROM pegawai WHERE id_pegawai='$data'");
								$t=mysqli_fetch_array($sql);
								echo "<option value='$t[id_pegawai]' selected>$t[nama]</option>";					
							}
						}
						?>
					</select>
				</div>
				<?php
					$sql=mysqli_query($connect,"SELECT * FROM spt WHERE id_spt='$_GET[id]'");
					$r=mysqli_fetch_array($sql);
					$edit=mysqli_query($connect,"SELECT * FROM nppt,tujuan WHERE id_nppt='$r[id_nppt]' AND nppt.id_tujuan=tujuan.id_tujuan");
					$t=mysqli_fetch_array($edit);
				?>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">No SPPD</label>
					<input autocomplete="off" type="text" name="no_sppd" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pejabat Yang Memberi Perintah</label>
					<input autocomplete="off" type="text" name="pemberi_perintah" required class="form-control"/>
				</div>
				
				<input type="hidden" name='id_nppt' value="<?=$r['id_nppt']?>">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tempat Tujuan</label>
					<input autocomplete="off" type="text" name="tujuan" value="<?=$t['tujuan']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Maksud Perjanalan Dinas</label>
					<input autocomplete="off" type="text" name="maksud" value="<?=$t['maksud']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Maksud Perjanalan Dinas</label>
					<select name="id_transportasi[]" required class="form-control selectpicker" multiple>
					<?php
						$value =explode('-',$t['id_transportasi']);
						for($i=0;$i<count($value);$i++) { 
						$data=$value[$i];
						$nomer++;
						$sql=mysqli_query($connect,"SELECT * FROM transportasi WHERE id_transportasi='$data'");
						$r=mysqli_fetch_array($sql);
						echo "<option value='$r[id_transportasi]' selected>$r[transportasi]</option>";
						}
					?>
					</select>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Lama Perjalanan</label>
					<input autocomplete="off" type="text" name="lama" value="<?=$t['lama']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal Berangkat</label>
					<input autocomplete="off" type="text" name="tgl_pergi" value="<?=$t['tgl_pergi']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal Kembali</label>
					<input autocomplete="off" type="text" name="tgl_kembali" value="<?=$t['tgl_kembali']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Instansi</label>
					<input autocomplete="off" type="text" name="instansi" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Mata Anggaran</label>
					<input autocomplete="off" type="text" name="mata_anggaran" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Keterangan Lain</label>
					<input autocomplete="off" type="text" name="keterangan" required class="form-control"/>
				</div>
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
