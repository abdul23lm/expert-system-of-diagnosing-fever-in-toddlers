<?php
	include 'config.php';
	//Connection Database
	$con = mysqli_connect($host, $user, $pwd, $db);
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	switch ($_POST['type']) {
		
		//Tampilkan Data 
		case "get":
			
			$SQL = mysqli_query($con, "SELECT * FROM tbl_kamus WHERE id_kamus='".$_POST['id']."'");
			$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
			echo json_encode($return);
			break;
		
		//Tambah Data	
		case "new":
			
			$SQL = mysqli_query($con, 
									"INSERT INTO tbl_kamus SET 
										kata='".$_POST['kata']."', 
										keterangan='".$_POST['keterangan']."'
								");
			if($SQL){
				echo json_encode("OK");
			}
			break;
			
		//Edit Data	
		case "edit":
			
			$SQL = mysqli_query($con, 
									"UPDATE tbl_kamus SET 
										kata='".$_POST['kata']."', 
										keterangan='".$_POST['keterangan']."'
									WHERE id_kamus='".$_POST['id_kamus']."'
								");
			if($SQL){
				echo json_encode("OK");
			}			
			break;
			
		//Hapus Data	
		case "delete":
			
			$SQL = mysqli_query($con, "DELETE FROM tbl_kamus WHERE id_kamus='".$_POST['id_kamus']."'");
			if($SQL){
				echo json_encode("OK");
			}			
			break;
	} 
	
?>