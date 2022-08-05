<html>
	<head>
		<link rel="stylesheet" href="../w3.css">
		<link rel="stylesheet" href="../style.css">
		<title>Gaji</title>
	</head>
<body>
	<?php
		session_start();
		require_once '../connect.php';
		
		$sql="SELECT * FROM gaji";
		$result=$conn->query($sql);
	?>

	<div class="w3-container w3-center w3-card-4 w3-red">
		<h1>Data Gaji</h1>

		<div class="menu w3-left">
			<ul>
				<li><a class="w3-hover-dark-grey w3-red" href="tambah_gaji.php">Tambah Data Gaji</a></li>
				<li><a class="w3-hover-dark-grey w3-red" href="../index.php">Kembali Ke Halaman Utama</a></li>
			</ul>
		</div>
	</div>

	<br>
	<?php require_once "../notif.php" ?>
	<table border="1" class="w3-table-all w3-border-black">
		<tr>
			<td>Slip Gaji</td>
			<td>Tanggal Gaji</td>
			<td>Jumlah Gaji</td>
			<td>Potongan Gaji</td>
			<td>Jumlah Lembur</td>
			<td>Total Gaji</td>
			<td>Id Pegawai</td>
			<td colspan="2" class="w3-center">Aksi</td>
		</tr>
	<?php while ($tp=$result->fetch_assoc()): ?>
		<tr>
			<td><?=$tp['slip_gaji'] ?></td>
			<td><?=$tp['tgl_gaji'] ?></td>
			<td><?=$tp['jml_gaji'] ?></td>
			<td><?=$tp['potongan_gaji'] ?></td>
			<td><?=$tp['jml_lembur'] ?></td>
			<td><?=$tp['total_gaji'] ?></td>
			<td><?=$tp['id_pegawai'] ?></td>
			<td>
				<a href="update_gaji.php?idgj=<?=$tp['slip_gaji'] ?>">
					<button class="w3-light-grey w3-hover-dark-grey">Ubah</button>
				</a>
			</td>
			<td>
				<a href="delete_gaji.php?idgj=<?=$tp['slip_gaji'] ?>">
					<button class="w3-light-grey w3-hover-dark-grey">Hapus</button>
				</a>
			</td>
		</tr>
	<?php endWhile; ?>
	</table>
</body>
</html>