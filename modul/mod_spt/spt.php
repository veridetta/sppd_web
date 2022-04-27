<?php
$aksi="modul/mod_spt/aksi_spt.php";
$print ="modul/mod_spt/cetak.php";

switch($_GET['act']){
default:

if ($_SESSION['level']=="operator") {
$tampil = mysqli_query($connect,"SELECT * FROM spt");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-envelope-open-text"></i> Data SPT (Surat Perintah Tugas)</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data SPT</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama</th>
						<th>Golongan</th>
						<th>No SPT</th>
						<th>Tugas</th>
						<th>SPPD</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$no=1;
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
						   $sql=mysqli_query($connect,"SELECT * FROM pegawai WHERE id_pegawai='$data'");
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
						<td class="align-middle"><?php echo $r['no_spt'] ?></td>
						<td class="align-middle"><?php echo $r['tugas'] ?></td>
						<td class="align-middle">
							<?php
							$cek=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM sppd WHERE id_nppt='$r[id_nppt]'"));
							if ($cek > 0) {
							?>
							<a data-toggle="tooltip" data-placement="bottom" title="SPPD Sudah Dibuat" href="#" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
							<?php
							}
							elseif ($r['no_spt'] != "") {
							?>
							<a data-toggle="tooltip" data-placement="bottom" title="Buat SPPD" href="?module=sppd&act=tambahsppd&id=<?=$r[id_spt]?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
							<?php
							}elseif ($r['no_spt']== ""){
							echo "No SPT Kosong";	 
							}
							?>
						</td>
						<td class="align-middle">
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Cetak Data" target="_blank" href="<?=$print?>?module=spt&act=print&id=<?php echo $r['id_spt']?>" class="btn btn-secondary btn-sm"><i class="fa fa-print"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=spt&act=editspt&id=<?php echo $r['id_spt'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=spt&act=hapus&id=<?php echo $r['id_spt'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
}
else {
$tampil = mysqli_query($connect,"SELECT * FROM spt,nppt WHERE spt.id_nppt=nppt.id_nppt AND spt.id_pegawai LIKE '%$_SESSION[id_pegawai]%'");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-envelope-open-text"></i> Data SPT (Surat Perintah Tugas)</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data SPT</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>No SPT</th>
						<th>Tugas</th>
						<th>Tgl Pergi</th>
						<th>Tgl Kembali</th>
						<th>Lama</th>
						<th>Laporan</th>
					</tr>
				</thead>
				<tbody>
				<?php
				while ($r=mysqli_fetch_array($tampil)){
				$no++;
				?>
					<tr align="center">
						<td><?php echo $no ?></td>
						<td><?php echo $r['no_spt'] ?></td>
						<td><?php echo $r['tugas'] ?></td>
						<td><?php echo $r['tgl_pergi'] ?></td>
						<td><?php echo $r['tgl_kembali'] ?></td>
						<td><?php echo $r['lama'] ?> Hari</td>
						<td>
						<?php
							$cek=mysqli_num_rows(mysqli_query($connect,"SELECT * FROM lpd WHERE id_spt='$r[id_spt]'"));
							if ($cek > 0 ) {
						?>
							<a data-toggle="tooltip" data-placement="bottom" title="Laporan Sudah Dibuat" href="#" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
						<?php
							}else {
						?>
							<a data-toggle="tooltip" data-placement="bottom" title="Buat Laporan" href="?module=lpd&act=tambahlpd&id=<?=$r[id_spt]?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
						<?php
							}
						?>
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
}
break;
case "tambahspt":
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-envelope-open-text"></i> Data SPT (Surat Perintah Tugas)</h1>

	<a href="?module=spt" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Data SPT</h6>
    </div>
	
	<form method="POST" action="<?=$aksi?>?module=spt&act=input">
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pilih Pegawai</label>
					<select name="id_pegawai[]" required class="form-control selectpicker" multiple>
					<?php
						$tam1=mysqli_query($connect,"SELECT * FROM pegawai");
						while ($k=mysqli_fetch_array($tam1)) {
							echo "<option value='$k[id_pegawai]'>$k[nama]</option>";
						}
					?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">No SPT</label>
					<input autocomplete="off" type="text" name="no_spt" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Untuk</label>
					<input autocomplete="off" type="text" name="tugas" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Dasar Hukum</label>
					<input autocomplete="off" type="text" name="dasar_hukum" required class="form-control"/>
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
case "editspt":
$edit=mysqli_query($connect,"SELECT * FROM spt WHERE id_spt='$_GET[id]'");
$c=mysqli_fetch_array($edit);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-envelope-open-text"></i> Data SPT (Surat Perintah Tugas)</h1>

	<a href="?module=spt" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Edit Data SPT</h6>
    </div>
	
	<form method="POST" action="<?=$aksi?>?module=spt&act=update">
		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id" value="<?=$c['id_spt']?>">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pilih Pegawai</label>
					<select name="id_pegawai[]" required class="form-control selectpicker" multiple>
					<?php
						$id2=explode("-",$c['id_pegawai']);
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
					<label class="font-weight-bold">No SPT</label>
					<input autocomplete="off" type="text" name="no_spt" value="<?=$c['no_spt']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Untuk</label>
					<input autocomplete="off" type="text" name="tugas" value="<?=$c['tugas']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Dasar Hukum</label>
					<input autocomplete="off" type="text" name="dasar_hukum" value="<?=$c['dasar_hukum']?>" required class="form-control"/>
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
