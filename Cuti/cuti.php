<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Cuti</title>
	</head>
<body>
	<?php
		session_start();
		require_once '../connect.php';

		$sql="SELECT * FROM cuti";
		$result=$conn->query($sql);
	?>

	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Data Cuti</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red"  href="create_cuti.php">Tambah Data Cuti</a></li>
				<li><a class="w3-hover-dark-grey w3-red"  href="../index.php">Kembali Ke Halaman Utama</a></li>
			</ul>
		</div>
	</div>

	<br>
	<?php require_once "../notif.php" ?>
	
	<table border="1" class="w3-table-all w3-border-black">
		<tr>
			<td>ID Cuti</td>
			<td>Tanggal Cuti</td>
			<td>Jumlah Cuti</td>
			<td>ID Pegawai</td>
			<td colspan="2" class="w3-center">Aksi</td>
		</tr>

	<?php while ($tp=$result->fetch_assoc()): ?>
		<tr>
			<td><?=$tp['id_cuti'] ?></td>
			<td><?=$tp['tgl_cuti'] ?></td>
			<td><?=$tp['jml_cuti'] ?></td>
			<td><?=$tp['id_pegawai'] ?></td>
			<td>
				<a href="update_cuti.php?idct=<?=$tp['id_cuti'] ?>">
					<button class="w3-light-grey w3-hover-dark-grey">Ubah</button>
				</a>
			</td>
			<td>
				<a href="delete_cuti.php?idct=<?=$tp['id_cuti'] ?>">
					<button class="w3-light-grey w3-hover-dark-grey">Hapus</button>
				</a>
			</td>
		</tr>
	<?php endWhile; ?>
	</table>
</body>
</html>