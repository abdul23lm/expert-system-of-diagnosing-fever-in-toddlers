<?php

/* * * * * * * * * * * * * * * * * * * * * * * 
 *         Buat Koneksi PHP ke MySQL 
 * * * * * * * * * * * * * * * * * * * * * * */
$host = "localhost";
$user = "root";
$pwd = "";
$db = "db_sispak";

$connect = mysql_connect($host, $user, $pwd) or die(mysql_error());
$db_select = mysql_select_db($db);


/* * * * * * * * * * * * * * * * * * * * * * * 
 *         Buat Pengaturan Aplikasi
 * * * * * * * * * * * * * * * * * * * * * * */
$app_name			= "Aplikasi Sistem Pakar Diagnosis Demam pada Balita";
$app_descriptions	= "Penelitian ini mengusulkan sebuah aplikasi yang di dalamnya mengandung pengetahuan dan pengalaman yang dimasukkan oleh satu atau banyak pakar kedalam satu area pengetahuan tertentu sehingga setiap orang dapat menggunakannnya untuk memecahkan berbagai masalah yang bersifat spesifik atau biasanya disebut dengan sistem pakar. Penelitian ini bertujuan untuk membuat sebuah aplikasi sistem pakar diagnosa penyakit demam pada balita berbasis web. Sistem pakar ini menggunakan basis pengetehauan Jaringan Semantik dengan metode Forward Chaining.";
$app_keywords		= "Demam, Diagnosa Penyakit, Forward Chaining, Jaringan Semantik, sistem Pakar";
$app_slogan		= "Aplikasi Sistem Pakar Diagnosis Demam pada Balita";
$app_credits	= "Copyright &copy; 2019 ".$app_name.". All rights reserved."; 
$app_powered	= "&copy; 2019 ".$app_name.". All Rights Reserved.";

?>
