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
								<h4>Master Kamus</h4>
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
													"sAjaxSource": "partials/master_kamus.php", // Load Data
													"sServerMethod": "POST",
													"columnDefs": [
													{ "orderable": false, "targets": 0, "searchable": false },
													{ "orderable": true, "targets": 1, "searchable": true },
													{ "orderable": true, "targets": 2, "searchable": true }
													]
												} );
												
												$('#example').removeClass( 'display' ).addClass('table table-striped table-bordered table-hover');
												
											} );
											
											
										</script>
										<button onClick="showModals()" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kosakata</button>
										<br>
										<hr>
										<br>
										<table id="example"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
											<thead>
												<tr>
													<th>Action</th>
													<th>Kosakata</th>
													<th>Keterangan</th>
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
														<h4 class="modal-title" id="myModalLabel"> Tambah Kosakata</h4>
													</div>
													<div class="modal-body">
														
														<div class="alert alert-danger" role="alert" id="removeWarning">
															<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
															<span class="sr-only">Error:</span>
															Anda yakin ingin menghapus kosakata ini?
														</div>
														<br>
														<form class="form-horizontal" id="formKamus">
															
															<input type="hidden" class="form-control" id="id_kamus" name="id_kamus">
															<input type="hidden" class="form-control" id="type" name="type">
															
															<div class="form-group">
																<label for="kata" class="col-sm-2 control-label">Kosakata</label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" id="kata" name="kata" >
																</div>
															</div>
															<div class="form-group">
																<label for="npm" class="col-sm-2 control-label">Keterangan</label>
																<div class="col-sm-10">
																	<textarea class="form-control" id="keterangan" rows="6" name="keterangan"></textarea>
																</div>
															</div>
														</form>
														
													</div>
													<div class="modal-footer">
														<button type="button" onClick="simpanKosakata()" class="btn btn-default btn-sm" id="btn-act" data-dismiss="modal" style="margin-bottom:10px;">Simpan</button>
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
														url: "./aksi_kamus.php",
														dataType: 'json',
														data: {id:id,type:"get"},
														success: function(res) {
															waitingDialog.hide();
															setModalData( res );
														}
													});
												}
												// Untuk Tambahkan Data
												else
												{
													$("#myModals").modal("show");
													$("#myModalLabel").html("Tambah Kosakata");
													$("#type").val("new"); 
													waitingDialog.hide();
												}
											}
											
											//Data Yang Ingin Di Tampilkan Pada Modal Ketika Di Edit 
											function setModalData( data )
											{
												$("#myModalLabel").html("Ubah Kosakata");
												$("#id_kamus").val(data.id_kamus);
												$("#type").val("edit");
												$("#kata").val(data.kata);
												$("#keterangan").val(data.keterangan);
												$("#myModals").modal("show");
											}
											
											//Submit Untuk Eksekusi Tambah/Edit/Hapus Data 
											function simpanKosakata()
											{
												var formData = $("#formKamus").serialize();
												waitingDialog.show();
												$.ajax({
													type: "POST",
													url: "./aksi_kamus.php",
													dataType: 'json',
													data: formData,
													success: function(data) {
														dTable.ajax.reload(); // Untuk Reload Tables secara otomatis
														waitingDialog.hide();	
													}
												});
											}
											
											//Hapus Data
											function delete_data(id)
											{
												clearModals();
												$.ajax({
													type: "POST",
													url: "./aksi_kamus.php",
													dataType: 'json',
													data: {id:id,type:"get"},
													success: function(data) {
														$("#removeWarning").show();
														$("#myModalLabel").html("Hapus Kosakata");
														$("#btn-act").html("Hapus");
														$("#id_kamus").val(data.id_kamus);
														$("#type").val("delete");
														$("#kata").val(data.kata).attr("disabled","true");
														$("#keterangan").val(data.keterangan).attr("disabled","true");
														$("#myModals").modal("show");
														waitingDialog.hide();			
													}
												});
											}
											
											//Clear Modal atau menutup modal supaya tidak terjadi duplikat modal
											function clearModals()
											{
												$("#removeWarning").hide();
												$("#id_kamus").val("").removeAttr( "disabled" );
												$("#kata").val("").removeAttr( "disabled" );
												$("#keterangan").val("").removeAttr( "disabled" );
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