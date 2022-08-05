<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Riwayat Ubah Jabatan</title>
	</head>
<body>
	<?php
		session_start();
		require_once '../connect.php';
		
		$sql="SELECT * FROM log_jabatan";
		$result=$conn->query($sql);
	?>

	<?php require_once "../notif.php" ?>

	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Riwayat Jabatan</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="../index.php">Kembali</a></li>
			</ul>
		</div>
	</div>
	
	<table border="1" class="w3-table-all w3-border-black">
		<tr>
			<td>Waktu</td>
			<td>Keterangan</td>
			<td>Jabatan Lama</td>
			<td>Jabatan Baru</td>
		</tr>
	<?php while ($tp=$result->fetch_assoc()): ?>
		<tr>
			<td><?=$tp['waktu'] ?></td>
			<td><?=$tp['keterangan'] ?></td>
			<td><?=$tp['jabatan_lama'] ?></td>
			<td><?=$tp['jabatan_baru'] ?></td>
		</tr>
	<?php endWhile; ?>
	</table>
</body>
</html>	