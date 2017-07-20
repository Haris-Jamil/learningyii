<?php 

$host = "localhost";
$dataBase = "socialNetwork";
$username = "root";
$passowrd = "asd123";


$conn = mysqli_connect($host, $username, $passowrd, $dataBase);
if(!$conn)
{
	die('error');
}