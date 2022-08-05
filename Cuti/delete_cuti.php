<?php		
session_start();
require_once '../connect.php';
	$idct=$_GET['idct'];
		
		$sql="DELETE FROM cuti WHERE id_cuti='".$idct."'";

		$result=$conn->query($sql);
		
		if($result){
			$_SESSION['notif']="Data Cuti Terhapus";
			header("location:cuti.php");
		}else{
			$_SESSION['notif']="Data Cuti Gagal Terhapus";
			header("location:cuti.php");
		}
	
?>