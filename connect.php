<?php
$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'kepegawaian';

$conn = new mysqli($server, $username, $password, $database);

if($conn->connect_error)
	{
		die("Koneksi gagal : ".$conn->connect_error);
	}
?>