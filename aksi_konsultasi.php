<?php
	include 'config.php';
	error_reporting(0);

	switch ($_POST['type']) {

		case 'LoadQuestion':
			if(isset($_POST['id'])){
				$where = " WHERE id_identifikasi = '".$_POST['id']."' ";
			}else{
				$where = " ";
			}

			$b = mysql_query("SELECT * FROM tbl_identifikasi $where ORDER BY id_identifikasi ASC LIMIT 0,1 ");
			$return = mysql_fetch_array($b);
			echo json_encode($return);

			break;

		case 'new':			

			if($_POST['pilih'] == 0){
				$sql2 = mysql_query("SELECT dua as aturan FROM tbl_aturan_tidak WHERE satu ='".$_POST['id_identifikasi']."' LIMIT 1");
				if(mysql_num_rows($sql2) > 0){
					$jika = mysql_fetch_array($sql2);
					$return = $jika['aturan'];
					echo json_encode($return);
				}else{
					echo '{"success":false}'; 
				}

				
			}elseif($_POST['pilih'] == 1){

				// Jika Identifikasi Bernilai 1 atau ya, Masukkan Ke tabel temporary.
				$sql = mysql_query("INSERT INTO tbl_temp SET 
								id_identifikasi = '".$_POST['id_identifikasi']."'

							");

				$sql2 = mysql_query("SELECT satu as aturan FROM tbl_aturan_ya WHERE dua ='".$_POST['id_identifikasi']."' LIMIT 1");
				
				if(mysql_num_rows($sql2) > 0){
					$jika = mysql_fetch_array($sql2);
					$return = $jika['aturan'];
					echo json_encode($return);
				}else{
					echo '{"success":false}'; 
				}
			}		

			break;
	}

?>