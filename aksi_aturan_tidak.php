<?php
	include 'config.php';
	//Connection Database
	$con = mysqli_connect($host, $user, $pwd, $db);
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	switch ($_POST['type']) {

		// Tampilkan Combo
		case "show":
			$SQL = mysqli_query($con, "SELECT * FROM tbl_identifikasi ORDER BY id_identifikasi ASC");
			if($_POST['combo'] == "satu"){
				$SQL2 = mysqli_query($con, "SELECT satu as j FROM tbl_aturan_tidak where satu='".$_POST['id']."'");
				$jika = mysqli_fetch_array($SQL2, MYSQLI_ASSOC);			
			}else{
				$SQL2 = mysqli_query($con, "SELECT dua as j FROM tbl_aturan_tidak where dua='".$_POST['id']."'");			
				$jika = mysqli_fetch_array($SQL2, MYSQLI_ASSOC);
			}
			$return = '<option value="">- Pilih Identifikasi -</option>';
			while ($d = mysqli_fetch_array($SQL,MYSQLI_ASSOC)) {
				if($jika['j'] == $d['id_identifikasi']){
					$return .= "<option value='$d[id_identifikasi]' selected='selected'>$d[pertanyaan]</option>";
				}else{
					$return .= "<option value='$d[id_identifikasi]'>$d[pertanyaan]</option>";
				}
				
			}
			echo json_encode($return);
			break;
		
		//Tampilkan Data 
		case "get":
			
			$SQL = mysqli_query($con, "SELECT * FROM tbl_aturan_tidak WHERE id_aturan_tidak='".$_POST['id']."'");
			$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
			echo json_encode($return);
			break;
		
		//Tambah Data	
		case "new":
			
			$SQL = mysqli_query($con, 
									"INSERT INTO tbl_aturan_tidak SET 
										satu='".$_POST['satu']."',
										dua='".$_POST['dua']."'
								");
			if($SQL){
				echo json_encode("OK");
			}
			break;
			
		//Edit Data	
		case "edit":
			
			$SQL = mysqli_query($con, 
									"UPDATE tbl_aturan_tidak SET 
										satu='".$_POST['satu']."', 
										dua='".$_POST['dua']."'
									WHERE id_aturan_tidak='".$_POST['id_aturan_tidak']."'
								");
			if($SQL){
				echo json_encode("OK");
			}			
			break;
			
		//Hapus Data	
		case "delete":
			
			$SQL = mysqli_query($con, "DELETE FROM tbl_aturan_tidak WHERE id_aturan_tidak='".$_POST['id_aturan_tidak']."'");
			if($SQL){
				echo json_encode("OK");
			}			
			break;
	} 
	
?>