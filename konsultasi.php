	<?php

	# Truncate Table For Start Consultation
	$sql = mysql_query("TRUNCATE TABLE tbl_temp");
	echo "
	<div class='col-xs-12 col-md-12'>
			<div class='row'>
				<div id='shop' class='box'>
						<div class='box-title'>
								<h4>Konsultasi</h4>
						</div>
						<div class='box-content'>
							<div class='feed-list'>
									<div class='row'>
										<div class='col-md-12'>

											<div class='col-md-8 col-md-offset-2' id='hal-konsultasi'>
											<p class='feed-title'>Jawablah pertanyaan-pertanyaan berikut ini !</p>
											<form id='FormKonsultasi'>
											<input type='hidden' id='type' name='type'>
											<input type='hidden' id='id_identifikasi' name='id_identifikasi'>
											<table class='table table-striped table-bordered'>
												<thead>
													<tr>
														<th colspan='2'>Pertanyaan : </th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td colspan='2' id='question'>Pertanyaan </td>
													</tr>
													<tr>
														<td width='50%'>
														<div class='radio'>
											            <input type='radio' class='radio-inline' value='1' name='pilih' id='ya'>
											            	<label for='ya'>Ya</label>
											            </div>
														</td>

														<td width='50%'>
														<div class='radio'>
											            <input type='radio' class='radio-inline' value='0' name='pilih' id='tidak'>
											            	<label for='tidak'>Tidak</label>
											            </div>
														</td>
													</tr>
													<tr>
														<td colspan='2'>
														<button type='button' class='btn btn-block btn-primary' onClick='SimpanKonsultasi()'>Enter</button>
														</td>
													</tr>
												</tbody>
											</table>
											</form>
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
						<script type="text/javascript">
						$(document).ready(function(){

							// Function Load 
							Question();

							
						});
							function Question(id)
							{
								if(id)
								{
									$.ajax({
										type: "POST",
										url: "./aksi_konsultasi.php",
										dataType: 'json',
										data: {id:id, type:"LoadQuestion"},
										success: function(data) {
											if(data){

												$("#question").html(data.pertanyaan);
												$("#id_identifikasi").val(data.id_identifikasi);
												$("#type").val("new");
												$("#ya").removeAttr('checked');
												$("#tidak").removeAttr('checked');

											}else{
												$("#hal-konsultasi").html('<div class="feed-list"><p class="feed-title">Terima Kasih anda telah menyelesaikan tahap konsultasi. Untuk melihat hasil konsultasi, Silahkan tekan tombol cetak <i class="fa fa-print"></i>  atau tekan tombol kembali <i class="fa fa-arrow-left"> untuk melakukan konsultasi ulang. </i></p><div class="text-center"><button class="btn btn-sm btn-primary" type="button" onClick="ReportKonsultasi(); return false;"><i class="fa fa-print"></i> Cetak</button>&nbsp;<button class="btn btn-sm btn-primary" type="button" onClick="window.location.reload();return false;"><i class="fa fa-arrow-left"></i> Kembali</button></div></div>');
											}
										}
									});
								}else{
									$.ajax({
										type: "POST",
										url: "./aksi_konsultasi.php",
										dataType: 'json',
										data: {type:"LoadQuestion"},
										success: function(data) {
											$("#question").html(data.pertanyaan);
											$("#id_identifikasi").val(data.id_identifikasi);
											$("#type").val("new");
											$("#ya").removeAttr('checked');
											$("#tidak").removeAttr('checked');
										}
									});
								}
							}
							function SimpanKonsultasi()
							{
								var formData = $("#FormKonsultasi").serialize();
								var	pilih	= $(".radio-inline:checked").val();
								var jml_pilih = $(".radio-inline:checked");

								if(jml_pilih.length == 0){
						           var error = true;
						           alert("Maaf, Anda belum memilih jawaban !");
								   return (false);
						        }

								waitingDialog.show();

								$.ajax({
									type: "POST",
									url: "./aksi_konsultasi.php",
									dataType: 'json',
									data: formData,
									success: function(data) {
										Question(data);
										waitingDialog.hide();	
									}
								});
							}

							function ReportKonsultasi()
							{
								window.location='cetak-pdf?<?php echo md5(date("YmdHis"));?>';
									return (false);
							}
						
						</script>
