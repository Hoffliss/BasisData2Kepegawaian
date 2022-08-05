<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Jabatan</title>
	</head>
<body>
	<?php
		session_start();
		require_once '../connect.php';
		
		$sql="SELECT * FROM Jabatan";
		$result=$conn->query($sql);
	?>

	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Data Jabatan</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="tambah_jabatan.php">Tambah Data Jabatan</a></li>
				<li><a class="w3-hover-dark-grey w3-red" href="../index.php">Kembali Ke Halaman Utama</a></li>
			</ul>
		</div>
	</div>

	<br>
	<?php require_once "../notif.php" ?>
	<table border="1" class="w3-table-all w3-border-black">
		<tr>
			<td>ID Jabatan</td>
			<td>Nama Jabatan</td>
			<td>Gaji Pokok</td>
			<td>Tunjangan</td>
			<td colspan="2" class="w3-center">Aksi</td>
		</tr>

		<?php while ($tp=$result->fetch_assoc()): ?>

		<tr>
			<td><?=$tp['id_jabatan'] ?></td>
			<td><?=$tp['nama_jabatan'] ?></td>
			<td><?=$tp['gaji_pokok'] ?></td>
			<td><?=$tp['tunjangan'] ?></td>
			<td>
				<a href="edit_jabatan.php?idjbt=<?=$tp['id_jabatan'] ?>">
					<button class="w3-light-grey w3-hover-dark-grey">Ubah</button>
				</a>
			</td>
			<td>
				<a href="delete_jabatan.php?idjbt=<?=$tp['id_jabatan'] ?>">
					<button class="w3-light-grey w3-hover-dark-grey">Hapus</button>
				</a>
			</td>
		</tr>
		<?php endWhile; ?>
	</table>
</body>
</html>