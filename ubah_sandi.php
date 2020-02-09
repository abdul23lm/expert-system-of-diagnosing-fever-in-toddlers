<?php
error_reporting(0);
extract($_REQUEST);
session_start();
if(!isset($_SESSION['uid'])){
	 echo "<script type='text/javascript'>
            window.location='beranda';
            </script>";
}
echo "<div class='col-xs-12 col-md-12'>
	<div id='shop'>
	<div class='box'>
		<div class='box-title'>
		<h4></h4>
		<h4>Ubah Sandi</h4>
		</div>
		<div class='box-content'>";
		$o=MD5($_POST[o_p]);
		$n=MD5($_POST[n_p]);
		$c=MD5($_POST[c_p]);
		
		if($ubah){
			if(GetAdministratorSandi($_SESSION['uid'])==$o){
				if($n==$c){
					$b2=mysql_query("UPDATE tbl_pengguna SET sandi='$n'WHERE id_pengguna='".$_SESSION['uid']."'");
					if($b2){
						echo "<div class='alert alert-success' style='padding:8px;'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<i class='fa fa-check sign'></i><strong> Sukses !</strong> Ubah Sandi Berhasil!
						</div>";
					}
				}else{
					echo "<div class='alert alert-warning' style='padding:8px;'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<i class='fa fa-warning sign'></i><strong> Maaf !</strong> Kata Sandi Baru dan Konfirmasi Sandi Salah !
					</div>";
				}
			}else{
				echo "<div class='alert alert-danger' style='padding:8px;'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<i class='fa fa-times-circle sign'></i><strong> Maaf !</strong> Kata Sandi Lama Anda Salah !
				</div>";
			}
		}
			echo"<form action='#' accept-charset='utf-8' class='form-horizontal' method='post'>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Kata Sandi Lama</label>
				<div class='col-sm-6'>
					<input type='password' class='form-control' name='o_p'>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Kata Sandi Baru</label>
				<div class='col-sm-6'>
					<input type='password' class='form-control' name='n_p'>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-3 control-label'>Konfirmasi Kata Sandi</label>
				<div class='col-sm-6'>
					<input type='password' class='form-control' name='c_p'>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-sm-9 col-sm-offset-3'>
					<button type='submit' class='btn btn-primary btn-sm' value='ubah' name='ubah'>Ubah Sandi</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	";
?>