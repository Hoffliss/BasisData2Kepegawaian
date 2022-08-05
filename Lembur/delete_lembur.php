<?php		
session_start();
require_once '../connect.php';
	$idlbr=$_GET['idlbr'];
		
		$sql="DELETE FROM lembur WHERE id_lembur='".$idlbr."'";

		$result=$conn->query($sql);
		
		if($result){
			$_SESSION['notif']="Data Lembur Terhapus";
			header("location:lembur.php");
		}else{
			$_SESSION['notif']="Data Lembur Gagal Terhapus";
			header("location:lembur.php");
		}
	
?>