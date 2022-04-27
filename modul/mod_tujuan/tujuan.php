<?php
$aksi="modul/mod_tujuan/aksi_tujuan.php";

switch($_GET['act']){
default:
$tampil = mysqli_query($connect,"SELECT * FROM tujuan");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-receipt"></i> Data Kota</h1>

	
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data Kota</h6><br>
        <a href="?module=tujuan&act=tambahtujuan" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Tujuan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no=1;
				while ($r=mysqli_fetch_array($tampil)){
				$biaya = number_format($r['biaya'],0,'','.');
				?>
					<tr align="center">
						<td><?php echo $no ?></td>
						<td><?php echo $r['tujuan'] ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=tujuan&act=edittujuan&id=<?php echo $r['id_tujuan'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=tujuan&act=hapus&id=<?php echo $r['id_tujuan'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
case "tambahtujuan":
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-receipt"></i> Data Kota</h1>

	<a href="?module=tujuan" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Data Kota</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=tujuan&act=input'>
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Kota</label>
					<input autocomplete="off" type="text" name="tujuan" required class="form-control"/>
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
case "edittujuan":
$edit=mysqli_query($connect,"SELECT * FROM tujuan WHERE id_tujuan='$_GET[id]'");
$r=mysqli_fetch_array($edit);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-receipt"></i> Data Kota</h1>

	<a href="?module=tujuan" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Edit Data Kota</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=tujuan&act=update'>
		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id" value="<?=$r['id_tujuan']?>">
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Kota</label>
					<input autocomplete="off" type="text" name="tujuan" value="<?=$r['tujuan']?>" required class="form-control"/>
				</div>
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
