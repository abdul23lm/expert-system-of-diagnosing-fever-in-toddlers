<?php
include 'config.php';
include 'library/functions.php';
error_reporting(0);
extract($_REQUEST);
session_start();
unset($_SESSION['konsultasi']);
echo "<!DOCTYPE html>
<html lang='en'>
<head>
<title>$app_name &lsaquo; $app_slogan</title>
<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
<meta charset='utf-8'>
<meta name='generator' content='perpustakaan' />
<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
<meta name='description' content='$app_descriptions'>
<meta name='keywords' content='$app_keywords'>
<meta name='author' content='Bramanto'>

<meta property='og:title' content='$app_name' />
<meta property='og:type' content='blog' />
<meta property='og:url' content='' />
<meta property='og:image' content='img/logo.png' />
<meta property='og:site_name' content='$app_name'/>

<meta property='og:description' content='$app_descriptions' />
<meta property='title' content='$app_name' />
<meta property='description' content='<?php echo $app_descriptions' />
<meta property='keywords' content='$app_keywords' />

<meta property='language' content='English' />
<meta property='revisit-after' content='7' />
<meta property='webcrawlers' content='all' />
<meta property='rating' content='general' />
<meta property='spiders' content='all' />
<meta property='robots' content='all' />
<meta property='canonical' content='' />";
include './partials/header.php';
echo "
</head>	

<body>";
include './partials/navbar.php';
echo "
<!-- Start Container-->
<div class='container-fluid'>
<div class='row-fluid'>
	<div class='col-sm-1 hidden-xs'>";
	include './partials/sidebar.php';
	echo"</div>
	<div class='col-sm-10'>";
	include './partials/switch_front.php';
	echo"</div>
</div>
</div>
<!-- End Container-->
<div class='gotop'>
	<a href='#' onclick='scrollup(); return false;' class='display-none scrolltoup'>
	<i class='fa fa-chevron-circle-up'></i>
	</a>
</div>";
include './partials/footer.php';
echo "

	</body>
</html>";
?>
