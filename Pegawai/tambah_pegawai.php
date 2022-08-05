<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Tambah Data Pegawai</title>
	</head>
<body>
<?php
session_start();
require_once '../connect.php';
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$idpgw=$_POST['idpgw'];
		$nama=$_POST['nama'];
		$jk=$_POST['jk'];
		$tgllahir=$_POST['tgllahir'];
		$status=$_POST['status'];
		$notlp=$_POST['notlp'];
		$alamat=$_POST['alamat'];
		$idjbt=$_POST['idjbt'];
		
		$sql="INSERT INTO pegawai (kolom) VALUES (isi)";
		
		$kolom="id_pegawai,nama_pegawai,jk_pegawai,tgl_lahir,status,no_telp_pegawai,alamat_pegawai,id_jabatan";
		
		$isi="'".$idpgw."',";
		$isi.="'".$nama."',";
		$isi.="'".$jk."',";
		$isi.="'".$tgllahir."',";
		$isi.="'".$status."',";
		$isi.="'".$notlp."',";
		$isi.="'".$alamat."',";
		$isi.="'".$idjbt."'";

		$sql=str_replace("kolom", $kolom, $sql);
		$sql=str_replace("isi", $isi, $sql);
		
		$result=$conn->query($sql);
		
		if($result){
			$_SESSION['notif']="Data Berhasil Tersimpan";
			header("location:pegawai.php");
		}else{
			echo "Data Gagal Tersimpan";
		}
	}
?>
	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Menambah Data Pegawai</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="pegawai.php">Kembali</a></li>
			</ul>
		</div>
	</div>

	<?php require_once "../notif.php"?>

	<div class="w3-display-middle">
	<form action="" method="POST">
		<table>
			<tr>
				<td>ID Pegawai</td>
				<td>: <input type="text" name="idpgw" size="10"></td>
			</tr>		
			<tr>
				<td>Nama Pegawai</td>
				<td>: <input type="text" name="nama" size="35"></td>
			</tr>
			<tr>
				<td><label for="jenis_kelamin">Jenis Kelamin</td>
				<td>: 
					<label><input type="radio" name="jk" value="Laki - Laki">Laki - Laki</label>
					<label><input type="radio" name="jk" value="Perempuan">Perempuan</label>
				</td>
			</tr>
			<tr>
				<td><label for="tgllahir">Tanggal Lahir</label>
					<td>: <input type="date" name="tgllahir">
					</td>
				</td>
			<tr>
				<td><label for="status">Status Pegawai</td>
				<td>: 
					<label> <input type="radio" name="status" value="Menikah">Menikah</label>
					<label> <input type="radio" name="status" value="Belum Menikah">Belum Menikah</label>
				</td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td>: <input type="text" name="notlp"></td>
			</tr>
			<tr>
				<td>Alamat Pegawai</td>
				<td>: <input type="text" name="alamat" size="40"></td>
			</tr>
			<tr>
				<td>ID Jabatan</td>
				<td>: <input type="text" name="idjbt" size="10"></td>
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