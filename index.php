<?php
//KONEKSI
$hostDB			= "localhost";
$usernameDB		= "root";
$passwordDB		= "";
$namaDB			= "appkasir";

//KONEKSI KE DATABASE
$con = mysqli_connect($hostDB,$usernameDB,$passwordDB,$namaDB);

//CEK KONEKSI
if(mysqli_connect_error())
{
	echo "GAGAL";
	die;
}

//SET TIMEZONE
date_default_timezone_set('Asia/Jakarta');

//AMBIL DATABASE
include("mod/item.php");
//MEMANGGIL DATABASE
$item = new item;

include ("mod/desain.php");
$desain= new desain;

include ("mod/induk.php");
$induk= new induk;

include ("mod/transaksi.php");
$transaksi = new transaksi;

include ("mod/member.php");
$member = new member;

//AMBIL CONTROLLERS
include("control/rute.php");


?>
