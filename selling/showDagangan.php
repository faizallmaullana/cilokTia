<?php 	 
require 'funcSell.php';

$date = date('d-m-Y');

$ciloks = query("SELECT * FROM dagangan WHERE tanggal = '$date'");

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Dagangan</title>
</head>
<body>
	<h1>Riwayat Dagangan</h1>

	<h3><?php echo $date; ?></h3>

	<table>
		<tr>
			<th>Nama</th>
			<th>Penempatan</th>
			<th>Cilok</th>
		</tr>

		<?php foreach ($ciloks as $cilok): ?>
			<tr>
				<td>
					<?php 
						$idMitra = $cilok['idmitra'];
						$nama = singleQuery("SELECT * FROM mitra WHERE id = '$idMitra'");
						echo $nama['nama'];
					?>
				</td>
				<td>
					<?php 
						$lokasi = $nama['idlokasi'];
						$lok = singleQuery("SELECT * FROM lokasi WHERE id = '$lokasi'");
						echo $lok['lokasi'];
					?>
				</td>
				<td><?php echo $cilok['dagangan']; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>