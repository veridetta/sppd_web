<?php
$aksi="modul/mod_lpd/aksi_lpd.php";
$print ="modul/mod_lpd/cetak.php";

switch($_GET['act']){
default:
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-file-alt"></i> Data Perjalanan Dinas</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data Perjalanan Dinas</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama</th>
						<th>No SPT</th>
						<th>Hasil</th>
						<th>Tanggal</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no=0;
				$tampil = mysqli_query($connect,"SELECT * FROM lpd,pegawai,spt WHERE lpd.id_pegawai=pegawai.id_pegawai AND lpd.id_spt=spt.id_spt");
				while ($t=mysqli_fetch_array($tampil)){
				$tanggal = tgl_indo($t['tanggal']);
				$no++;
				?>
					<tr align="center">
						<td><?php echo $no ?></td>
						<td><?php echo $t['nama'] ?></td>
						<td><?php echo $t['no_spt'] ?></td>
						<td class="text-justify"><?php echo $t['hasil'] ?></td>
						<td><?php echo $tanggal ?></td>
						<td class="align-middle">
							<div class="btn-group" role="group">
								<?php if($_SESSION['level']=="kabag") { ?>
								<a data-toggle="tooltip" data-placement="bottom" title="Cetak Data" target="_blank" href="<?=$print?>?&id=<?php echo $t['id_lpd']?>" class="btn btn-secondary btn-sm"><i class="fa fa-print"></i></a>
								
								<?php }elseif($_SESSION['level']=="operator") { ?>
								<a data-toggle="tooltip" data-placement="bottom" title="Cetak Data" target="_blank" href="<?=$print?>?&id=<?php echo $t['id_lpd']?>" class="btn btn-secondary btn-sm"><i class="fa fa-print"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=lpd&act=hapus&id=<?php echo $t['id_lpd'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								
								<?php } else { ?>
								<a data-toggle="tooltip" data-placement="bottom" title="Cetak Data" target="_blank" href="<?=$print?>?&id=<?php echo $t['id_lpd']?>" class="btn btn-secondary btn-sm"><i class="fa fa-print"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="?module=lpd&act=editlpd&id=<?php echo $t['id_lpd'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=$aksi?>?module=lpd&act=hapus&id=<?php echo $t['id_lpd'] ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
case "tambahlpd":
$t=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM pegawai,golongan WHERE golongan.id_golongan=pegawai.id_golongan AND pegawai.id_pegawai='$_SESSION[id_pegawai]'"));
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-file-alt"></i> Data Perjalanan Dinas</h1>

	<a href="?module=lpd" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Data Perjalanan Dinas</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=lpd&act=input'>
		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id_pegawai" value="<?=$t['id_pegawai']?>">
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama</label>
					<input autocomplete="off" type="text" value="<?=$t['nama']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">NIP</label>
					<input autocomplete="off" type="text" value="<?=$t['nip']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pangkat</label>
					<input autocomplete="off" type="text" value="<?=$t['pangkat']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Golongan</label>
					<input autocomplete="off" type="text" value="<?=$t['golongan']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jabatan</label>
					<input autocomplete="off" type="text" value="<?=$t['jabatan']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Unit Kerja</label>
					<input autocomplete="off" type="text" value="<?=$t['unitkerja']?>" required readonly class="form-control"/>
				</div>
				
				<?php				
				$c = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM spt,nppt,tujuan WHERE spt.id_nppt=nppt.id_nppt AND spt.id_spt='$_GET[id]' AND tujuan.id_tujuan=nppt.id_tujuan"));
				$tgl_pergi = tgl_indo($c['tgl_pergi']);
				$tgl_kembali = tgl_indo($c['tgl_kembali']);
				?>
				
				<input type="hidden" name="id_spt" value="<?=$c['id_spt']?>">
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Keterangan</label>
					<textarea name="dari" class="form-control" required>Telah melaksanakan Perjalanan Dinas dalam rangka <?=$c['tugas']?> , berdasarkan Surat Perintah Tugas Nomor : <?=$c['no_spt']?> , dari tanggal <?=$tgl_pergi ?> s/d <?=$tgl_kembali?> di <?=$c['tujuan']?></textarea>
				</div>
				
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Hasil</label>
					<textarea name="hasil" class="form-control" required>Adapun hasil perjalanan dinas tersebut adalah sebagai berikut :</textarea>
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
case "editlpd":
$t=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM pegawai,golongan WHERE golongan.id_golongan=pegawai.id_golongan AND pegawai.id_pegawai='$_SESSION[id_pegawai]'"));
$k=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM lpd WHERE id_lpd='$_GET[id]'"));
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-file-alt"></i> Data Perjalanan Dinas</h1>

	<a href="?module=lpd" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Edit Data Perjalanan Dinas</h6>
    </div>
	
	<form method="POST" action='<?=$aksi?>?module=lpd&act=update'>
		<div class="card-body">
			<div class="row">
				<input type="hidden" name="id" value="<?=$k['id_lpd']?>">
				<input type="hidden" name="id_pegawai" value="<?=$t['id_pegawai']?>">
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama</label>
					<input autocomplete="off" type="text" value="<?=$t['nama']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">NIP</label>
					<input autocomplete="off" type="text" value="<?=$t['nip']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pangkat</label>
					<input autocomplete="off" type="text" value="<?=$t['pangkat']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Golongan</label>
					<input autocomplete="off" type="text" value="<?=$t['golongan']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jabatan</label>
					<input autocomplete="off" type="text" value="<?=$t['jabatan']?>" required readonly class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Unit Kerja</label>
					<input autocomplete="off" type="text" value="<?=$t['unitkerja']?>" required readonly class="form-control"/>
				</div>
				
				<?php
				$c = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM spt,nppt,tujuan WHERE spt.id_nppt=nppt.id_nppt AND spt.id_spt='$k[id_spt]' AND tujuan.id_tujuan=nppt.id_tujuan"));
				$tgl_pergi = tgl_indo($c['tgl_pergi']);
				$tgl_kembali = tgl_indo($c['tgl_kembali']);
				?>
				
				<input type="hidden" name="id_spt" value="<?=$c['id_spt']?>">
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Keterangan</label>
					<textarea name="dari" class="form-control" required>Telah melaksanakan Perjalanan Dinas dalam rangka <?=$c['tugas']?> , berdasarkan Surat Perintah Tugas Nomor : <?=$c['no_spt']?> , dari tanggal <?=$tgl_pergi ?> s/d <?=$tgl_kembali?> di <?=$c['tujuan']?></textarea>
				</div>
				
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Hasil</label>
					<textarea name="hasil" class="form-control" required><?=$k['hasil']?></textarea>
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
