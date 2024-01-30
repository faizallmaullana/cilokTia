<?php  
require 'func.php';

$mitra = query("SELECT * FROM mitra ORDER BY nama ASC")
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Main Page</title>
</head>
<body>
	<h1>Halaman Utama</h1>

	<ul>
		<li><a href="lokasi/lokasi.php">Lokasi</a></li>
		<li><a href="mitra/mitra.php">Daftar Mitra</a></li>
		<li><a href="belanja/belanja.php">Belanja</a></li>
		<li><a href="selling/selling.php">Dagangan</a></li>
		<li><a href="selling/showDagangan.php">Show Dagangan</a></li>
	</ul>

	<table>
		<tr>
			<th>Mitra</th>
		</tr>

		<?php foreach ($mitra as $var): ?>
		<tr>
			<td>
				<a href="mitra/profile.php?id=<?php echo $var['id']; ?>"><?php echo $var['nama'] ?></a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>

</body>
</html>