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
								<h4>Rule Aturan Ya</h4>
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
													"sAjaxSource": "partials/aturan_ya.php", // Load Data
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
										<button onClick="showModals()" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Aturan Ya</button>
										<br>
										<hr>
										<br>
										<table id="example"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
											<thead>
												<tr>
													<th>Action</th>
													<th>Identifikasi Pertama</th>
													<th>Identifikasi Selanjutnya</th>
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
														<h4 class="modal-title" id="myModalLabel"> Tambah Aturan Ya</h4>
													</div>
													<div class="modal-body">
														
														<div class="alert alert-danger" role="alert" id="removeWarning">
															<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
															<span class="sr-only">Error:</span>
															Anda yakin ingin menghapus aturan ini?
														</div>
														<br>
														<form class="form-horizontal" id="formAturanYa">
															
															<input type="hidden" class="form-control" id="id_aturan_ya" name="id_aturan_ya">
															<input type="hidden" class="form-control" id="type" name="type">
															
															<div class="form-group">
																<label for="pertanyaan" class="col-sm-2 control-label">Identifikasi Pertama</label>
																<div class="col-sm-10">																	
																	<select name="dua" id="dua" class="form-control">
																	
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label for="pertanyaan" class="col-sm-2 control-label">Identifikasi Selanjutnya</label>
																<div class="col-sm-10">																	
																	<select name="satu" id="satu" class="form-control">
																		
																	</select>
																</div>
															</div>
														</form>
														
													</div>
													<div class="modal-footer">
														<button type="button" onClick="simpanAturanYa()" class="btn btn-default btn-sm" id="btn-act" data-dismiss="modal" style="margin-bottom:10px;">Simpan</button>
														<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"  style="margin-bottom:10px;">Tutup</button>
													</div>
												</div>
											</div>
										</div>
										<!-- End : Modal Popup -->

										<script>		
											// Tambilkan Combo Box
											function show_combo_satu(id)
											{
												if(id)
												{
													$.ajax({
														type: "POST",
														url: "./aksi_aturan_ya.php",
														dataType: 'json',
														data: {id:id,type:"show",combo:"satu"},
														success: function(data) {
															$("#satu").append(data);
														}
													});
												}else{
													$.ajax({
														type: "POST",
														url: "./aksi_aturan_ya.php",
														dataType: 'json',
														data: {id:"",type:"show",combo:"satu"},
														success: function(data) {
															$("#satu").append(data);
														}
													});
												}
											}

											function show_combo_dua(id)
											{
												if(id)
												{
													$.ajax({
														type: "POST",
														url: "./aksi_aturan_ya.php",
														dataType: 'json',
														data: {id:id,type:"show",combo:"dua"},
														success: function(data) {
															$("#dua").append(data);
														}
													});
												}else{
													$.ajax({
														type: "POST",
														url: "./aksi_aturan_ya.php",
														dataType: 'json',
														data: {id:"",type:"show",combo:"dua"},
														success: function(data) {
															$("#dua").append(data);
														}
													});
												}
											}

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
														url: "./aksi_aturan_ya.php",
														dataType: 'json',
														data: {id:id,type:"get"},
														success: function(res) {
															waitingDialog.hide();
															setModalData( res );
															$("#btn-act").html("Simpan");
															show_combo_satu(res.satu);
															show_combo_dua(res.dua);
														}
													});
												}
												// Untuk Tambahkan Data
												else
												{
													$("#myModals").modal("show");
													$("#myModalLabel").html("Tambah Aturan Ya");
													$("#type").val("new"); 
													$("#btn-act").html("Simpan");
													show_combo_satu();
													show_combo_dua();
													waitingDialog.hide();
												}
											}
											
											//Data Yang Ingin Di Tampilkan Pada Modal Ketika Di Edit 
											function setModalData( data )
											{
												$("#myModalLabel").html("Ubah Aturan Ya");
												$("#id_aturan_ya").val(data.id_aturan_ya);
												$("#type").val("edit");
												$("#myModals").modal("show");
											}
											
											//Submit Untuk Eksekusi Tambah/Edit/Hapus Data 
											function simpanAturanYa()
											{
												var formData = $("#formAturanYa").serialize();
												waitingDialog.show();
												$.ajax({
													type: "POST",
													url: "./aksi_aturan_ya.php",
													dataType: 'json',
													data: formData,
													success: function(data) {
														dTable.ajax.reload(); // Untuk Reload Tables secara otomatis
														waitingDialog.hide();	
													}
												});
											}
											
											//Hapus Data
											function deleteAturanYa( id )
											{
												clearModals();
												$.ajax({
													type: "POST",
													url: "./aksi_aturan_ya.php",
													dataType: 'json',
													data: {id:id,type:"get"},
													success: function(data) {
														$("#removeWarning").show();
														$("#myModalLabel").html("Hapus Aturan Ya");
														$("#btn-act").html("Hapus");
														$("#id_aturan_ya").val(data.id_aturan_ya);
														$("#type").val("delete");
														$("#satu").attr("disabled","true");
														$("#dua").attr("disabled","true");
														show_combo_satu(data.satu);
														show_combo_dua(data.dua);
														$("#myModals").modal("show");
														waitingDialog.hide();			
													}
												});
											}
											
											//Clear Modal atau menutup modal supaya tidak terjadi duplikat modal
											function clearModals()
											{
												$("#removeWarning").hide();
												$("#id_diagnosis").val("").removeAttr( "disabled" );
												$("#pertanyaan").val("").removeAttr( "disabled" );
												$("#type").val("");
												$("#satu").empty();
												$("#dua").empty();
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