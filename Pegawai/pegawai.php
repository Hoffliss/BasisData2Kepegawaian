<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
	 	<title>Pegawai</title>
	</head>
<body>
	<?php
		session_start();
		require_once '../connect.php';
		
		$sql="SELECT * FROM pegawai";
		$result=$conn->query($sql);
	?>
	
	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Data Pegawai</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="tambah_pegawai.php"  >Tambah Data Pegawai</a></li>
				<li><a class="w3-hover-dark-grey w3-red" href="../index.php">Kembali Ke Halaman Utama</a></li>
			</ul>
		</div>
	</div>

	<br>
	<?php require_once "../notif.php" ?>
	
	<table border="1" class="w3-table-all w3-border-black">
		<tr>
			<td>ID Pegawai</td>
			<td>Nama Pegawai</td>
			<td>Jenis Kelamin</td>
			<td>Tanggal Lahir</td>
			<td>Status Pegawai</td>
			<td>No Telepon</td>
			<td>Alamat</td>
			<td>ID Jabatan</td>
			<td colspan="2" class="w3-center">Aksi</td>
		</tr>
		
		<?php while ($tp=$result->fetch_assoc()): ?>
			
		<tr>
			<td><?=$tp['id_pegawai'] ?></td>
			<td><?=$tp['nama_pegawai'] ?></td>
			<td><?=$tp['jk_pegawai'] ?></td>
			<td><?=$tp['tgl_lahir'] ?></td>
			<td><?=$tp['status'] ?></td>
			<td><?=$tp['no_telp_pegawai'] ?></td>
			<td><?=$tp['alamat_pegawai'] ?></td>
			<td><?=$tp['id_jabatan'] ?></td>
			<td>
				<a href="update_pegawai.php?idpgw=<?=$tp['id_pegawai'] ?>">
					<button class="w3-light-grey w3-hover-dark-grey">Ubah</button>
				</a>
			</td>
			<td>
				<a href="delete_pegawai.php?idpgw=<?=$tp['id_pegawai'] ?>">
					<button class="w3-light-grey w3-hover-dark-grey">Hapus</button>
				</a>
			</td>
		</tr>
		<?php endWhile; ?>
	</table>
</body>
</html>