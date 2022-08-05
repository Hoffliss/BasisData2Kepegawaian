<?php		
session_start();
require_once '../connect.php';
	$idpgw=$_GET['idpgw'];
		
		$sql="DELETE FROM pegawai WHERE id_pegawai='".$idpgw."'";

		$result=$conn->query($sql);
		
		if($result){
			$_SESSION['notif']="Data Pegawai Terhapus";
			header("location:pegawai.php");
		}else{
			$_SESSION['notif']="Data Pegawai Gagal Terhapus";
			header("location:pegawai.php");
		}
	
?>