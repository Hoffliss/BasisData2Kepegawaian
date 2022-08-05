<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Pengubahan Data Lembur</title>
	</head>
<body>
	<?php		
		session_start();
		require_once '../connect.php';
		$idlbr=$_GET['idlbr'];
		
		$result=$conn->query("SELECT * FROM lembur WHERE id_lembur='$idlbr'");
		$data=$result->fetch_assoc();

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$idlbr=$_POST['idlbr'];
			$tgllbr=$_POST['tgllbr'];
	        $jmllbr=$_POST['jmllbr'];
	        $idpgw=$_POST['idpgw'];
			
			$sql="UPDATE lembur SET tgl_lembur='$tgllbr', jml_lembur='$jmllbr', id_pegawai='$idpgw' WHERE id_lembur='$idlbr'";

			$result=$conn->query($sql);
			
			if($result){
				$_SESSION['notif']="Data Berhasil Terupdate";
				header("location:lembur.php");
			}else{
				echo "Data Gagal Tersimpan";
			}
		}
	?>
	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Mengubah Data Lembur</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="lembur.php">Kembali</a></li>
			</ul>
		</div>
	</div>

	<?php require_once "../notif.php"?>

	<div class="w3-display-middle">
	<form action="" method="POST">
		<table>
			<tr>
				<td><input type="hidden" name="idlbr" size="10" value="<?=$data['id_lembur'] ?>"></td>
			</tr>
			<tr>
				<td><label for="tgllbr">Tanggal Lembur</label>
					<td>: <input type="date" name="tglbr" value="<?=$data['tgl_lembur'] ?>">
					</td>
				</td>
	        </tr>
			<tr>
				<td>Jumlah Lembur</td>
				<td>: <input type="text" name="jmllbr" value="<?=$data['jml_lembur'] ?>"></td>
			</tr>
	        <tr>
				<td>ID Pegawai</td>
				<td>: <input type="text" name="idpgw" size="10" value="<?=$data['id_pegawai'] ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><br>
					<input class="w3-light-grey w3-hover-dark-grey" type="submit" value="Simpan">
					<input class="w3-light-grey w3-hover-dark-grey" type="reset" value="Reset">
				</td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>