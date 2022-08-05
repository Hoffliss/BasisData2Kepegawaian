<?php	
session_start();	
require_once '../connect.php';
	$idjbt=$_GET['idjbt'];
		
		$sql="DELETE FROM jabatan WHERE id_jabatan='".$idjbt."'";

		$result=$conn->query($sql);
		
		if($result){
			$_SESSION['notif']="Data Jabatan Terhapus";
			header("location:jabatan.php");
		}else{
			$_SESSION['notif']="Data Jabatan Gagal Terhapus";
			header("location:jabatan.php");
		}
	
?>

