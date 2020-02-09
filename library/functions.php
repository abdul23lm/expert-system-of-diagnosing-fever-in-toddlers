<?php 

function format_rupiah($uang) {
	return "Rp.".number_format($uang,2,',','.');
}
function discount($uang){
		$discount = 15;
		return ($discount/100) * $uang;
}
function hasil_diskon($uang){
	$hasil = $uang - discount($uang);
	return $hasil;
}

function dateTime($tgl){	//Konversi Datetime MySQL to Jam Indonesia -> 23:59:00
	$time=substr($tgl,11,8);
	$hours = substr($time,0,2);
	$minutes = substr($time,3,2);
	return $hours.':'.$minutes;
}
function dateMySQL($tgl){	//Konversi Datetime Indonesia to MySQL  -> 2014-03-25
	$tgl=substr($tgl,0,10);
	$ta=substr($tgl,8,2);
	$bu=substr($tgl,5,2);
	$th=substr($tgl,0,4);
	return $th.'-'.$bu.'-'.$ta;
}
//06-08-2014
function dateNoMySQL($tgl){	//Konversi Datetime Indonesia to MySQL  -> 20140325
	$tgl=substr($tgl,0,10);
	$ta=substr($tgl,0,2);
	$bu=substr($tgl,3,2);
	$th=substr($tgl,6,4);
	return $th.$bu.$ta;
}
function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
}
function tgl_str($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[0].'-'.$exp[1].'-'.$exp[2];
		}
		return $date;
}
function dateStrip($tgl){	//Konversi Datetime MySQL to Indonesia -> 25-03-2014
	$tgl=substr($tgl,0,10);
	$ta=substr($tgl,8,2);
	$bu=substr($tgl,5,2);
	$th=substr($tgl,0,4);
	return $ta.'-'.$bu.'-'.$th;
}
function dateSlash($tgl){	//Konversi Datetime MySQL to Indonesia -> 25/03/2014
	$tgl=substr($tgl,0,10);
	$ta=substr($tgl,8,2);
	$bu=substr($tgl,5,2);
	$th=substr($tgl,0,4);
	return $ta.'/'.$bu.'/'.$th;
}
function dateIndo($tgl){	//Konversi Datetime MySQL to Indonesia -> 25 Maret 2014
	$tgl=substr($tgl,0,10);
	$ta=substr($tgl,8,2);
	$bu=getMonth(substr($tgl,5,2));
	$th=substr($tgl,0,4);
	return $ta.' '.$bu.' '.$th;
}
function dayDateIndo($tgl){	//Konversi Datetime MySQL to Indonesia -> Rabu, 25 Maret 2014
	$day=getDay(substr($tgl,0,10));
	$tgl=substr($tgl,0,10);
	$ta=substr($tgl,8,2);
	$bu=getMonth(substr($tgl,5,2));
	$th=substr($tgl,0,4);
	return $day.', '.$ta.' '.$bu.' '.$th;
}
function getDay($tgl){	//Ambil Nama Hari -> Senin s/d Minggu
    $hari_array=array(
	"1"=>"Senin",
	"2"=>"Selasa",
	"3"=>"Rabu",
	"4"=>"Kamis",
	"5"=>"Jumat",
	"6"=>"Sabtu",
	"7"=>"Minggu");

	$tanggal_array=explode('-', $tgl);
	$hari_n=date("N",mktime(0,0,0,$tanggal_array[1],$tanggal_array[2],$tanggal_array[0]));
	return $hari_array[$hari_n];
}
function getMonth($bln){	//Ambil Nama Bulan -> Januari s/d Desember
    switch ($bln){
        case 1: 
          return "Januari";
          break;
        case 2:
          return "Februari";
          break;
        case 3:
          return "Maret";
          break;
        case 4:
          return "April";
          break;
        case 5:
          return "Mei";
          break;
        case 6:
          return "Juni";
          break;
        case 7:
          return "Juli";
          break;
        case 8:
          return "Agustus";
          break;
        case 9:
          return "September";
          break;
        case 10:
          return "Oktober";
          break;
        case 11:
          return "November";
          break;
        case 12:
          return "Desember";
          break;
    }
}
function GetAdminName($id){
	$x = mysql_query("SELECT nm_lengkap FROM tbl_pengguna WHERE id_pengguna = '$id'");
	$y = mysql_fetch_array($x);
	$exp = explode(' ', $y['nm_lengkap']);

	return $z = $exp[0];
}
function GetAdministratorSandi($id){
	$x = mysql_query("SELECT sandi FROM tbl_pengguna WHERE id_pengguna = '$id'");
	$y = mysql_fetch_array($x);
	return $z = $y['sandi'];
}
?>
