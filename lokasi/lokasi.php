<?php  
require 'funcLokasi.php';
$locations = query("SELECT * FROM lokasi ORDER BY lokasi ASC"); // lokasi, datein, dateout
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lokasi</title>
</head>
<body>
	<h1>Lokasi</h1>

	<!-- SEMENTARA : Tombol Kembali -->
	<a href="../index.php"><button>Kembali</button></a>

	<!-- Link untuk tambahkan lokasi -->
	<a href="addLokasi.php"><button>Tambah</button></a>


	<!-- Tampilkan Lokasi (active) -->
	<table>
		<tr>
			<th>No.</th>
			<th>Lokasi</th>
			<th>Tanggal Masuk</th>
		</tr>

		<!-- Tampilkan dari table lokasi -->
		<!-- table => lokasi, datein, dateout -->
		<?php $i = 1; ?>
		<?php foreach ($locations as $location): ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $location['lokasi']; ?></td>
			<td><?php echo $location['datein'] ?></td>
		</tr>
		<?php $i++ ?>
		<?php endforeach; ?>

	</table>
</body>
</html>