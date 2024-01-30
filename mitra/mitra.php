<?php  
require 'funcMitra.php';
$partners = query("SELECT * FROM mitra ORDER BY idlokasi, nama ASC"); // datein, dateout, nama, domisili, idlokasi(penempatan)
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Daftar Mitra</title>
</head>
<body>
	<h1>Daftar Mitra</h1>

	<!-- SEMENTARA : Tombol Kembali -->
	<a href="../index.php"><button class="button-32">Kembali</button></a>
	<a href="addMitra.php"><button class="button-32">Tambah</button></a>

	<br><br>

	<table>
		<tr>
			<th>No</th>
			<th>Tanggal Masuk</th>
			<th>Nama</th>
			<th>Domisili</th>
			<th>Penempatan</th>
		</tr>

		<!-- Daftar Mitra dari DB -->
		<?php $i = 1; ?>
		<?php foreach ($partners as $partner): ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $partner['datein']; ?></td>
			<td><a href="profile.php?id=<?php echo $partner['id']; ?>"><?php echo $partner['nama']; ?></td>
			<td><?php echo $partner['domisili']; ?></td>
			<td>
				<?php
					$idlokasi = $partner['idlokasi'];
					$lokasi = singleQuery("SELECT lokasi FROM lokasi WHERE id = '$idlokasi'");
					if ($idlokasi > 0) {
						echo $lokasi['lokasi'];
					}
					elseif ($idlokasi == 0){
						echo "Produksi";
					}
					
				?>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>
</body>
</html>