<?php
$aksi="modul/mod_instansi/aksi_instansi.php";

switch($_GET['act']){
default:
$tampil = mysqli_query($connect,"SELECT * FROM instansi");
$r=mysqli_fetch_array($tampil);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cog"></i> Data Instansi</h1>
	
	<a href="?module=instansi&act=editinstansi&id=<?php echo $r['id'] ?>" class="btn btn-warning"> <i class="fa fa-edit"></i>  </a>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data Instansi</h6>
    </div>

    <div class="card-body">
		<div class="row">
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Nama Instansi</label>
				<input autocomplete="off" type="text" value="<?=$r['namainstansi']?>" required readonly class="form-control"/>
			</div>
			
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Keterangan Instansi</label>
				<input autocomplete="off" type="text" value="<?=$r['keteranganinstansi']?>" required readonly class="form-control"/>
			</div>
		</div>
		
		<hr class="mt-3 mb-4"/>
		<div class="row">
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Alamat Lengkap Instansi</label>
				<input autocomplete="off" type="text" value="<?=$r['alamatlengkapinstansi']?>" required readonly class="form-control"/>
			</div>
			
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Kota Instansi</label>
				<input autocomplete="off" type="text" value="<?=$r['kotainstansi']?>" required readonly class="form-control"/>
			</div>
			
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Kode Pos</label>
				<input autocomplete="off" type="text" value="<?=$r['kodepos']?>" required readonly class="form-control"/>
			</div>
			
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Telp Instansi</label>
				<input autocomplete="off" type="text" value="<?=$r['telp']?>" required readonly class="form-control"/>
			</div>
			
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Faks Instansi</label>
				<input autocomplete="off" type="text" value="<?=$r['faks']?>" required readonly class="form-control"/>
			</div>
		</div>
		<hr class="mt-3 mb-4"/>
		<div class="row">
			
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Pimpinan Tertinggi Instansi</label>
				<input autocomplete="off" type="text" value="<?=$r['pimpinaninstansi']?>" required readonly class="form-control"/>
			</div>
			
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Nama Pimpinan Tertinggi Instansi</label>
				<input autocomplete="off" type="text" value="<?=$r['namapimpinaninstansi']?>" required readonly class="form-control"/>
			</div>
			
			<div class="form-group col-md-6">
				<label class="font-weight-bold">NIP Pimpinan Tertinggi Instansi</label>
				<input autocomplete="off" type="text" value="<?=$r['nippimpinaninstansi']?>" required readonly class="form-control"/>
			</div>
			
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Jabatan Pimpinan Tertinggi Instansi</label>
				<input autocomplete="off" type="text" value="<?=$r['jabatanpimpinaninstansi']?>" required readonly class="form-control"/>
			</div>
		</div>
	</div>
</div>

<?php
break;
case "editinstansi":
$edit=mysqli_query($connect,"SELECT * FROM instansi WHERE id='$_GET[id]'");
$r=mysqli_fetch_array($edit);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cog"></i> Data Instansi</h1>

	<a href="?module=instansi" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Edit Data</h6>
    </div>
	
	<form method="POST" action="<?=$aksi?>?module=instansi&act=update">
		<div class="card-body">
			<input type="hidden" name="id" value="<?=$r['id']?>">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Instansi</label>
					<input autocomplete="off" type="text" name="namainstansi" value="<?=$r['namainstansi']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Keterangan Instansi</label>
					<input autocomplete="off" type="text" name="keteranganinstansi" value="<?=$r['keteranganinstansi']?>" required class="form-control"/>
				</div>
			</div>
			
			<hr class="mt-3 mb-4"/>
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Alamat Lengkap Instansi</label>
					<input autocomplete="off" type="text" name="alamatlengkapinstansi" value="<?=$r['alamatlengkapinstansi']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Kota Instansi</label>
					<input autocomplete="off" type="text" name="kotainstansi" value="<?=$r['kotainstansi']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Kode Pos</label>
					<input autocomplete="off" type="text" name="kodepos" value="<?=$r['kodepos']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Telp Instansi</label>
					<input autocomplete="off" type="text" name="telp" value="<?=$r['telp']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Faks Instansi</label>
					<input autocomplete="off" type="text" name="faks" value="<?=$r['faks']?>" required class="form-control"/>
				</div>
			</div>
			<hr class="mt-3 mb-4"/>
			<div class="row">
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pimpinan Tertinggi Instansi</label>
					<input autocomplete="off" type="text" name="pimpinaninstansi" value="<?=$r['pimpinaninstansi']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Pimpinan Tertinggi Instansi</label>
					<input autocomplete="off" type="text" name="namapimpinaninstansi" value="<?=$r['namapimpinaninstansi']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">NIP Pimpinan Tertinggi Instansi</label>
					<input autocomplete="off" type="text" name="nippimpinaninstansi" value="<?=$r['nippimpinaninstansi']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jabatan Pimpinan Tertinggi Instansi</label>
					<input autocomplete="off" type="text" name="jabatanpimpinaninstansi" value="<?=$r['jabatanpimpinaninstansi']?>" required class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	</form>
</div>  

<?php
break;  
}
?>
