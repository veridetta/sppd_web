<?php
$aksi="modul/mod_nppd/aksi_nppd.php";
$print ="modul/mod_nppd/cetak.php";
error_reporting(1);
switch($_GET['act']){
	default:
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-envelope-open-text"></i> Data NPPD (Nota Permintaan Perjalanan Dinas)</h1>

    
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data NPPD</h6><br>
        <a href="?module=tambahnppd" class="btn btn-success"> <i class="fa fa-plus"></i></a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Penugasan Kepada</th>
						<th>Golongan</th>
						<th>Tujuan</th>
						<th>Maksud Perjalan Dinas</th>
						<th>Tgl Pergi s/d Tgl Kembali</th>
						<th>Lama</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no=1;
					$tampil = mysqli_query($connect,"SELECT * FROM nppt,tujuan WHERE nppt.id_tujuan=tujuan.id_tujuan ORDER BY id_nppt DESC");
					while ($r=mysqli_fetch_array($tampil)){
					$value =explode('-',$r['id_pegawai']);
				?>
					<tr align="center">
						<td class="align-middle"><?php echo $no; ?></td>
						<td class="align-middle" align="left">
						<?php
						$nomer= 0;
						for($i=0;$i<count($value);$i++) { 
						$data=$value[$i];
						$nomer++;
						   $sql=mysqli_query($connect,"SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan AND id_pegawai='$data'");
						   $t=mysqli_fetch_array($sql);
						   echo "$nomer. $t[nama]";
						   echo "<br/>";
						}
						?>
						</td>
						<td class="align-middle">
						<?php
						$value =explode('-',$r['id_pegawai']);
						$nomer= 0;
						for($i=0;$i<count($value);$i++) { 
						$data=$value[$i];
						$nomer++;
						   $sql=mysqli_query($connect,"SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan AND id_pegawai='$data'");
						   $t=mysqli_fetch_array($sql);
						   echo "$t[golongan] ";
						   echo "<br/>";
						}
						?>
						</td>
						<td class="align-middle"><?php echo $r['tujuan'] ?></td>
						<td class="align-middle"><?php echo $r['maksud'] ?></td>
						<td class="align-middle"><?php echo $r['tgl_pergi'] ?> s/d <?php echo $r['tgl_kembali'] ?></td>
						<td class="align-middle"><?php echo $r['lama'] ?> hari</td>
						<td class="align-middle">
						<?php
						if ($r['status']== 'Y') {
						?>
						<a data-toggle="tooltip" data-placement="bottom" title="Data Terverifikasi" href="#" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
						<?php
						}else{
						if ($_SESSION['level']=="kabag"){
						?>
						<a data-toggle="tooltip" data-placement="bottom" title="Terima Pengajuan" href="<?=$aksi?>?module=nppd&act=editstatus&id=<?php echo $r[id_nppt]?>&status=Y" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a>
						<?php
						}else{
						?>
						<a data-toggle="tooltip" data-placement="bottom" title="Data Belum Disetujui" href="#" class="btn btn-success btn-sm"><i class="fa fa-clock"></i></a>
						<?php
						}
						}
						?>
						</td>
						<td class="align-middle">						
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Cetak Data" target="_blank" href="<?=$print?>?module=nppd<?=$act?>=print&id=<?php echo $r['id_nppt']?>" class="btn btn-secondary btn-sm"><i class="fa fa-print"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=nppd&act=editnppd&id=<?php echo $r['id_nppt'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=nppd&act=hapus&id=<?php echo $r['id_nppt'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
case "editnppd":
	$edit=mysqli_query($connect,"SELECT * FROM nppt WHERE id_nppt='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-envelope-open-text"></i> Data NPPD (Nota Permintaan Perjalanan Dinas)</h1>

	<a href="?module=nppd" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Edit Data NPPD</h6>
    </div>
	
	<form method="POST" action="<?=$aksi?>?module=nppd&act=update">
		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id" value="<?=$r['id_nppt']?>">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pilih Pegawai</label>
					<select name="id_pegawai[]" required class="form-control selectpicker" multiple>
					<?php
						$id2=explode("-",$r['id_pegawai']);
						$tam1=mysqli_query($connect,"SELECT * FROM pegawai");
						while ($k=mysqli_fetch_array($tam1)) {
							if (in_array($k['id_pegawai'],$id2)){
								echo "<option value='$k[id_pegawai]' selected>$k[nama]</option>";
							}else{
								echo "<option value='$k[id_pegawai]'>$k[nama]</option>";
							}
						}
					?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pilih Lokasi Tujuan</label>
					<select name="tujuan" required class="form-control">
					<?php
						$tampil=mysqli_query($connect,"SELECT * FROM tujuan");
						if ($r[id_tujuan]==0){
							echo "<option value='' selected>--Pilih Lokasi Tujuan--</option>";
						}
						while($w=mysqli_fetch_array($tampil)){
							if ($r[id_tujuan]==$w[id_tujuan]){
								echo "<option value='$w[id_tujuan]' selected>$w[tujuan]</option>";
							}else{
								echo "<option value='$w[id_tujuan]'>$w[tujuan]</option>";
							}
						}
					?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Maksud Tujuan Perjalanan</label>
					<input autocomplete="off" type="text" name="maksud" value="<?=$r[maksud]?>" required class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jenis Transportasi</label>
					<select name="id_transportasi[]" required class="form-control selectpicker" multiple>
					<?php
						$id2=explode("-",$r['id_transportasi']);
						$tam1=mysqli_query($connect,"SELECT * FROM transportasi");
						while ($k=mysqli_fetch_array($tam1)) {
							if (in_array($k['id_transportasi'],$id2)){
								echo "<option value='$k[id_transportasi]' selected>$k[transportasi]</option>";
							}else{
								echo "<option value='$k[id_transportasi]'>$k[transportasi]</option>";
							}
						}
					?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal Pergi</label>
					<input autocomplete="off" type="date" name='tgl_pergi' id='tgl_pergi' value='<?=$r[tgl_pergi]?>' required class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal Pulang</label>
					<input autocomplete="off" type="date" name='tgl_kembali' id='tgl_kembali' value='<?=$r[tgl_kembali]?>' required class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Lama Perjalanan</label>
					<input autocomplete="off" type="text" name="lama" value="<?=$r[lama]?>" required class="form-control"/>
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


