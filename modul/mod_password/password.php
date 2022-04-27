<?php	
session_start();
	if ($_GET['aksi']=="ganti"){
		if ($_POST['passwordbaru']==$_POST['cpassword']) {
			$sql=mysqli_query($connect,"SELECT * FROM admins WHERE level='$_SESSION[level]'");
			$r=mysqli_fetch_array($sql);
			$passwordlama =$r['password'];
			$id=$r['id'];
			if ($_POST['passwordlama']==$passwordlama) {
				mysqli_query($connect,"UPDATE admins SET password='$_POST[passwordbaru]' WHERE  id='$id'");
				echo "<div class='alert alert-success'>Password anda berhasil diubah</div>";
			}
			else{
				echo "<div class='alert alert-success'>Password lama yang anda masukkan tidak ada dalam database</div>";	
			}
	}else{
			echo "<div class='alert alert-success'>Proses pergantian password gagal, anda salah memasukkan pada ulangi password</div>";
		}
	}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user-cog"></i> Ganti Password</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Ganti Password</h6>
    </div>
	
	<form method="POST" action="?module=password&aksi=ganti" id="form2" onSubmit="return validasi2(this)" name="form2">
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Password Lama</label>
					<input autocomplete="off" type="password" name="passwordlama" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Password Baru</label>
					<input autocomplete="off" type="password" name="passwordbaru" required id="passwordbaru" class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Ulangi Password Baru</label>
					<input autocomplete="off" type="password" name="cpassword" id="cpassword" required class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button name ="ganti" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	</form>
</div>

<script>
function validasi2(form2){
  if (form2.passwordlama.value == ""){
    alert("Anda belum mengisikan Password Lama.");
    form2.passwordlama.focus();
    return (false);
  }
  if (form2.passwordbaru.value == ""){
    alert("Anda belum mengisikan Password Baru.");
    form2.passwordbaru.focus();
    return (false);
  }
  if (form2.cpassword.value == ""){
    alert("Ulangi Password Baru.");
    form2.cpassword.focus();
    return (false);
  }
  return (true);
}	
</script>
