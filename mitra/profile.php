<?php  
require 'funcMitra.php';

$id = $_GET['id'];

$profile = query("SELECT * FROM mitra WHERE id = $id")[0];

$cilok = query("SELECT * FROM dagangan WHERE idmitra = $id"); 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Profile</title>
</head>
<body>

	<h1><?php echo $profile['nama']; ?></h1>
	<h2>
		<?php
			$idlokasi = $profile['idlokasi'];
			$lokasi = singleQuery("SELECT lokasi FROM lokasi WHERE id = '$idlokasi'");
			if ($idlokasi > 0) {
				echo $lokasi['lokasi'];
			}
			elseif ($idlokasi == 0){
				echo "Produksi";
			}
		?>
	</h2>

	<h3>Asal <?php echo $profile['domisili']; ?></h3>

	<p>Masuk tanggal <?php echo $profile['datein']; ?></p>

	<table>
		<tr>
			<th><a href="../tabungan/tabungan.php?id=<?php echo $profile['id']; ?>">Tabungan</a></th>
			<td><?php echo totalTabungan($id); ?></td>
		</tr>
		<tr>
			<th>Sangkutan</th>
			<td></td>
		</tr>
	</table>


	<h3>Riwayat Dagangan</h3>
	<table>
		<tr>
			<th>Tanggal</th>
			<th>Dagangan</th>
		</tr>

		<?php foreach ($cilok as $var): ?>
		<tr>
			<td><?php echo $var['tanggal']; ?></td>
			<td><?php echo $var['dagangan']; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>

</body>
</html>