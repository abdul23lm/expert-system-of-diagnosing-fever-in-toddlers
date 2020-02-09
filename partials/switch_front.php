<?php
	error_reporting(0);
	switch($opt){
		case '01':
		include"./beranda.php";
		break;

		case '02':
		include"./konsultasi.php";
		break;

		case '03':
		include"./authentication.php";
		break;

		case '04':
		include"./ubah_sandi.php";
		break;

		case '05':
		include"./kamus.php";
		break;

		case '06':
		include"./master_kamus.php";
		break;

		case '07':
		include"./master_identifikasi.php";
		break;

		case '08':
		include"./aturan_ya.php";
		break;

		case '09':
		include"./aturan_tidak.php";
		break;
								
		default:
		include"./beranda.php";
		break;
	}
?>