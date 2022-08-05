<?php		
session_start();
require_once '../connect.php';
	$slip_gaji=$_GET['idgj'];
		
		$sql="DELETE FROM gaji WHERE slip_gaji='".$slip_gaji."'";

		$result=$conn->query($sql);
		
		if($result){
			$_SESSION['notif']="Data Gaji Terhapus";
			header("location:gaji.php");
		}else{
			$_SESSION['notif']="Data Gaji Gagal Terhapus";
			header("location:gaji.php");
		}
	
?>