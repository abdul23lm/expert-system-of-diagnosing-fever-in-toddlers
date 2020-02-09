	<?php
	echo "
	<div class='col-xs-12 col-md-12'>
			<div class='row'>
				<div id='shop' class='box'>
						<div class='box-title'>
								<h4>Kamus</h4>
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
													"sAjaxSource": "partials/kamus.php", // Load Data
													"sServerMethod": "POST",
													"columnDefs": [
													{ "orderable": true, "targets": 0, "searchable": true },
													{ "orderable": false, "targets": 1, "searchable": true }
													]
												} );
												
												$('#example').removeClass( 'display' ).addClass('table table-striped table-bordered table-hover');
											} );
											
											
										</script>
										<table id="example"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
											<thead>
												<tr>
													<th>Kosakata</th>
													<th>Keterangan</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
										<?php echo"</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
	";
	?>