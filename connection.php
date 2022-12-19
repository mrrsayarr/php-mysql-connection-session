<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "signuptb";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Bağlantı hatası!");
}
