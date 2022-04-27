<?php
$aksi="modul/mod_ttdkwitansi/aksi_ttdkwitansi.php";

switch($_GET['act']){
default:
$tampil = mysqli_query($connect,"SELECT * FROM ttdkwitansi");
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cog"></i> Data Tanda Tangan Kwitansi</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data Tanda Tangan Kwitansi</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kabag</th>
						<th>Bendahara</th>
						<th>PPTK</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no=1;
				while ($r=mysqli_fetch_array($tampil)){
				?>
					<tr>
						<td class="text-center"><?php echo $no ?></td>
						<td>
							<?php echo $r['kabag'] ?><br />
							<?php echo $r['nip_kabag'] ?>
						</td>
						<td>
							<?php echo $r['bendahara'] ?><br />
							<?php echo $r['nip_bendahara'] ?>
						</td>
						<td>
							<?php echo $r['pptk'] ?><br />
							<?php echo $r['nip_pptk'] ?>
						</td>
						<td class="text-center">
							<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=ttdkwitansi&act=editttdkwitansi&id=<?php echo $r['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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
case "editttdkwitansi":
$edit=mysqli_query($connect,"SELECT * FROM ttdkwitansi WHERE id='$_GET[id]'");
$r=mysqli_fetch_array($edit);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cog"></i> Data Tanda Tangan Kwitansi</h1>

	<a href="?module=ttdkwitansi" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Edit Data Tanda Tangan Kwitansi</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=ttdkwitansi&act=update'>
		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id" value="<?=$r['id']?>">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Kabag</label>
					<input autocomplete="off" type="text" name="kabag" value="<?=$r['kabag']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">NIP Kabag</label>
					<input autocomplete="off" type="text" name="nip_kabag" value="<?=$r['nip_kabag']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Bendahara</label>
					<input autocomplete="off" type="text" name="bendahara" value="<?=$r['bendahara']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">NIP Bendahara</label>
					<input autocomplete="off" type="text" name="nip_bendahara" value="<?=$r['nip_bendahara']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">PPTK</label>
					<input autocomplete="off" type="text" name="pptk" value="<?=$r['pptk']?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">NIP PPTK</label>
					<input autocomplete="off" type="text" name="nip_pptk" value="<?=$r['nip_pptk']?>" required class="form-control"/>
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
