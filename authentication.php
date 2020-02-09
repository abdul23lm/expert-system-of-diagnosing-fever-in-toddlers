	<?php
	echo "
	<div class='col-xs-12 col-md-12'>
			<div class='row'>
				<div id='shop' class='box'>
						<div class='box-title'>
								<h4>Login Administrator</h4>
						</div>
						<div class='box-content'>
							<div class='feed-list'>
									<div class='row'>
										<div class='col-md-12'>
											<div class='text-justify'>
											</div>
											<div class='col-md-12 col-xs-12'>
												<div class='col-md-6 col-md-offset-3'>
												<h3 class='text-center'>Silahkan Login Disini</h3>

												<!-- Start : Form Login -->
												<form action='?' method='post' class='form-horizontal'>";

												# Start : Execute Button Login
												if($p_login){
													$param1=$_POST[param1];
													$param2=MD5($_POST[param2]);

													echo "<div class='alert alert-danger' style='padding:8px'>";
													$hasil=mysql_query("SELECT id_pengguna as uid, nm_lengkap
														FROM tbl_pengguna WHERE nm_pengguna='$param1' AND sandi='$param2'");
													if(mysql_num_rows($hasil)>0){
														$row = mysql_fetch_array($hasil);
														session_start();
														$_SESSION['uid'] = $row[uid];
														$_SESSION['nm_lengkap']  = $row[nm_lengkap];
					                                    echo "<script type='text/javascript'>
					                                    window.location='beranda';
					                                    </script>";
													}else{
														echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
															<i class='fa fa-times-circle sign'></i>&nbsp;<strong>Maaf ! </strong> Nama Pengguna dan Sandi Salah!";
													}
													echo "</div>";
												}
												# End : Execute Button Login
												
												echo"<div class='form-group'>
													<label>Nama Pengguna</label>
													<input type='text' class='form-control' name='param1' placeholder='Masukkan Nama Pengguna' required>
												</div>
												<div class='form-group'>
													<label>Kata Sandi</label>
													<input type='password' class='form-control' name='param2' placeholder='Masukkan Kata Sandi' required>
												</div>
												<div class='form-group'>
													<button class='btn btn-primary btn-sm' name='p_login' value='p_login'><i class='fa fa-unlock'></i> Masuk</button>
													<button class='btn btn-primary btn-sm' type='reset'><i class='fa fa-magic'></i> Cancel</button>
												</div>
												</form>
												<!-- End : Form Login -->

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
	";
	?>