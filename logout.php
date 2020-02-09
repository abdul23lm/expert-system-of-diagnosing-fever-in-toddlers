<?php
	session_start();
	
	unset($_SESSION['uid']);
	unset($_SESSION['nm_lengkap']);
	header("location: beranda");
?>
