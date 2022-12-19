<?php

// DATABASE BAĞLANMA KISMI

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "signuptb"; // DATABASE ADI

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Bağlantı hatası!");
}
