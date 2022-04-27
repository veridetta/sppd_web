<?php
$aksi="modul/mod_biaya/aksi_biaya.php";

switch($_GET['act']){
default:
$tampil = mysqli_query($connect,"SELECT * FROM biaya,golongan WHERE biaya.id_golongan=golongan.id_golongan ");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-receipt"></i> Data Biaya Perjalanan</h1>

	
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data Biaya Perjalanan</h6>
        <br>
        <a href="?module=biaya&act=tambahbiaya" class="btn btn-success"> <i class="fa fa-plus"></i> </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Tujuan</th>
						<th>Golongan</th>
						<th>Lumpsum</th>
						<th>Penginapan</th>
						<th>Transportasi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no=1;
				while ($r=mysqli_fetch_array($tampil)){
				$value =explode('-',$r['id_tujuan']);
				?>
					<tr align="center">
						<td><?php echo $no ?></td>
						<td>
							<?php
							$nomer= 0;
							for($i=0;$i<count($value);$i++) { 
								$data=$value[$i];
								$nomer++;
								$sql=mysqli_query($connect,"SELECT * FROM tujuan WHERE id_tujuan='$data'");
								$t=mysqli_fetch_array($sql);
								echo "$t[tujuan]<br/> ";
							}
							?>
						</td>
						<td><?php echo $r['golongan'] ?></td>
						<td><?php echo $r['lumpsum'] ?></td>
						<td><?php echo $r['penginapan'] ?></td>
						<td><?php echo $r['transportasi'] ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=biaya&act=editbiaya&id=<?php echo $r['id_biaya'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=biaya&act=hapus&id=<?php echo $r['id_biaya'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
case "tambahbiaya":
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-receipt"></i> Data Biaya Perjalanan</h1>

	<a href="?module=biaya" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Data Biaya Perjalanan</h6>
    </div>
	
	<form method="POST" action="<?=$aksi?>?module=biaya&act=input">
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pilih Kota</label>
					<select name="id_tujuan[]" required class="form-control selectpicker" multiple>
					<?php
						$sql=mysqli_query($connect,"SELECT * FROM tujuan");
						while($r=mysqli_fetch_array($sql)) {
							echo "<option value='$r[id_tujuan]'>$r[tujuan]</option>";
						}
					?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Golongan</label>
					<select name="id_golongan" required class="form-control">
						<option value="">--Pilih Golongan--</option>
						<?php
						$tampil=mysqli_query($connect,"SELECT * FROM golongan");
						while($r=mysqli_fetch_array($tampil)){
							echo "<option value=$r[id_golongan]>$r[golongan]</option>";
						}
						?>
					</select>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Lumpsum</label>
					<input autocomplete="off" type="text" name="lumpsum" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Penginapan</label>
					<input autocomplete="off" type="text" name="penginapan" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Transportasi</label>
					<input autocomplete="off" type="text" name="transportasi" required class="form-control"/>
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
case "editbiaya":
$edit=mysqli_query($connect,"SELECT * FROM biaya WHERE id_biaya='$_GET[id]'");
$r=mysqli_fetch_array($edit);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-receipt"></i> Data Biaya Perjalanan</h1>

	<a href="?module=biaya" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Edit Data Biaya Perjalanan</h6>
    </div>
	
	<form method="POST" action="<?=$aksi?>?module=biaya&act=update">
		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id" value="<?=$r['id_biaya']?>">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pilih Kota</label>
					<select name="id_tujuan[]" required class="form-control selectpicker" multiple>
					<?php
						$id2=explode("-",$r['id_tujuan']);
						$tam1=mysqli_query($connect,"SELECT * FROM tujuan");
						while ($k=mysqli_fetch_array($tam1)) {
							if (in_array($k['id_tujuan'],$id2)){
								echo "<option value='$k[id_tujuan]' selected>$k[tujuan]</option>";
							}else{
								echo "<option value='$k[id_tujuan]'>$k[tujuan]</option>";
							}
						}
					?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Golongan</label>
					<select name="id_golongan" required class="form-control">
					<?php
					$tampil=mysqli_query($connect,"SELECT * FROM golongan"); 
						while($w=mysqli_fetch_array($tampil)){
							if ($r[id_golongan]==$w[id_golongan]){
								echo "<option value=$w[id_golongan] selected>$w[golongan]</option>";
							}else{
								echo "<option value=$w[id_golongan]>$w[golongan]</option> </p> ";
							}
						}
					?>
					</select>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Lumpsum</label>
					<input autocomplete="off" type="text" name="lumpsum" value="<?=$r['lumpsum']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Penginapan</label>
					<input autocomplete="off" type="text" name="penginapan" value="<?=$r['penginapan']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Transportasi</label>
					<input autocomplete="off" type="text" name="transportasi" value="<?=$r['transportasi']?>" required class="form-control"/>
				</div>
			</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> </button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> </button>
        </div>
	</form>
</div>
    
<?php
break;  
}
?>
