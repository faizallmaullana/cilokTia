<?php  
require 'funcTabungan.php';

$id = $_GET['id'];

$mitra = query("SELECT * FROM mitra WHERE id = $id")[0];

$tabungan = query("SELECT * FROM tabungan WHERE idmitra = $id ORDER BY id DESC");

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tabungan</title>
</head>
<body>
	<h1>Tabungan <?php echo $mitra['nama']; ?></h1>

	<h2>
		<?php 
			$lokasi = $mitra['idlokasi'];
			$lok = singleQuery("SELECT * FROM lokasi WHERE id = '$lokasi'");
			echo $lok['lokasi'];
		?>
	</h2>

	<div>
		<a href=""><button>Masuk</button></a>
		<a href=""><button>Keluar</button></a>
	</div>

	<table>
		<tr>
			<th>Tanggal</th>
			<th>Masuk</th>
			<th>Keluar</th>
		</tr>

		<?php foreach ($tabungan as $var): ?>
		<tr>
			<td><?php echo $var['tanggal']; ?></td>
			<td><?php echo $var['masuk']; ?></td>
			<td><?php echo $var['keluar']; ?></td>
		</tr>
		<?php endforeach; ?>

	</table>
</body>
</html>