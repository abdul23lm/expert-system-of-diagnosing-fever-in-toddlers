	<?php
	error_reporting(0);
	extract($_REQUEST);
	session_start();
	if(!isset($_SESSION['uid'])){
		 echo "<script type='text/javascript'>
                window.location='beranda';
                </script>";
	}
	echo "
	<div class='col-xs-12 col-md-12'>
			<div class='row'>
				<div id='shop' class='box'>
						<div class='box-title'>
								<h4>Master Identifikasi</h4>
						</div>
						<div class='box-content'>
							<div class='feed-list'>
									<div class='row'>
										<div class='col-md-12'>";?>
											<script type="text/javascript" language="javascript" >
				
											var dTable;
											// #Example adalah id pada table
											$(document).ready(function() {
												dTable = $('#example').DataTable( {
													"bProcessing": true,
													"bServerSide": true,
													"bJQueryUI": false,
													"responsive": true,
													"sAjaxSource": "partials/master_identifikasi.php", // Load Data
													"sServerMethod": "POST",
													"columnDefs": [
													{ "orderable": false, "targets": 0, "searchable": false },
													{ "orderable": true, "targets": 1, "searchable": true }
													]
												} );
												
												$('#example').removeClass( 'display' ).addClass('table table-striped table-bordered table-hover');
												
											} );
											
											
										</script>
										<button onClick="showModals()" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Identifikasi</button>
										<br>
										<hr>
										<br>
										<table id="example"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
											<thead>
												<tr>
													<th>Action</th>
													<th>No Identifikasi</th>
													<th>Pertanyaan</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>

										<!-- Start : Modal Popup -->
										<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel"> Tambah Identifikasi</h4>
													</div>
													<div class="modal-body">
														
														<div class="alert alert-danger" role="alert" id="removeWarning">
															<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
															<span class="sr-only">Error:</span>
															Anda yakin ingin menghapus identifikasi ini?
														</div>
														<br>
														<form class="form-horizontal" id="formIdentifikasi">
															
															<input type="hidden" class="form-control" id="id_id" name="id_id">
															<input type="hidden" class="form-control" id="type" name="type">
															
															<div class="form-group">
																<label for="id_identifikasi" class="col-sm-2 control-label">No Identifikasi</label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" id="id_identifikasi" name="id_identifikasi" maxlength="4">
																</div>
															</div>
															<div class="form-group">
																<label for="pertanyaan" class="col-sm-2 control-label">Pertanyaan</label>
																<div class="col-sm-10">
																	<textarea class="form-control" id="pertanyaan" rows="4" name="pertanyaan"></textarea>
																</div>
															</div>
														</form>
														
													</div>
													<div class="modal-footer">
														<button type="button" onClick="simpanIdentifikasi()" class="btn btn-default btn-sm" id="btn-act" data-dismiss="modal" style="margin-bottom:10px;">Simpan</button>
														<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"  style="margin-bottom:10px;">Tutup</button>
													</div>
												</div>
											</div>
										</div>
										<!-- End : Modal Popup -->

										<script>		
											//Tampilkan Modal 
											function showModals( id )
											{
												waitingDialog.show();
												clearModals();												
												
												// Untuk Eksekusi Data Yang Ingin di Edit atau Di Hapus 
												if( id )
												{
													$.ajax({
														type: "POST",
														url: "./aksi_identifikasi.php",
														dataType: 'json',
														data: {id:id,type:"get"},
														success: function(res) {
															waitingDialog.hide();
															setModalData( res );
															$("#btn-act").html("Simpan");
														}
													});
												}
												// Untuk Tambahkan Data
												else
												{
													$("#myModals").modal("show");
													$("#myModalLabel").html("Tambah Diagnosa");
													$("#type").val("new"); 
													$("#btn-act").html("Simpan");
													waitingDialog.hide();
												}
											}
											
											//Data Yang Ingin Di Tampilkan Pada Modal Ketika Di Edit 
											function setModalData( data )
											{
												$("#myModalLabel").html("Ubah Diagnosa");
												$("#id_identifikasi").val(data.id_identifikasi);
												$("#id_id").val(data.id_identifikasi);
												$("#type").val("edit");
												$("#pertanyaan").val(data.pertanyaan);
												$("#myModals").modal("show");
											}
											
											//Submit Untuk Eksekusi Tambah/Edit/Hapus Data 
											function simpanIdentifikasi()
											{
												var formData = $("#formIdentifikasi").serialize();
												waitingDialog.show();
												$.ajax({
													type: "POST",
													url: "./aksi_identifikasi.php",
													dataType: 'json',
													data: formData,
													success: function(data) {
														dTable.ajax.reload(); // Untuk Reload Tables secara otomatis
														waitingDialog.hide();	
													}
												});
											}
											
											//Hapus Data
											function deleteIdentifikasi( id )
											{
												clearModals();
												$.ajax({
													type: "POST",
													url: "./aksi_identifikasi.php",
													dataType: 'json',
													data: {id:id,type:"get"},
													success: function(data) {
														$("#removeWarning").show();
														$("#myModalLabel").html("Hapus Diagnosa");
														$("#btn-act").html("Hapus");
														$("#id_identifikasi").val(data.id_identifikasi);
														$("#id_id").val(data.id_identifikasi);
														$("#type").val("delete");
														$("#pertanyaan").val(data.pertanyaan).attr("disabled","true");
														$("#myModals").modal("show");
														waitingDialog.hide();			
													}
												});
											}
											
											//Clear Modal atau menutup modal supaya tidak terjadi duplikat modal
											function clearModals()
											{
												$("#removeWarning").hide();
												$("#id_identifikasi").val("").removeAttr( "disabled" );
												$("#id_id").val("").removeAttr( "disabled" );
												$("#pertanyaan").val("").removeAttr( "disabled" );
												$("#type").val("");
											}
											
										</script>
										<?php echo"</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
	";
	?>