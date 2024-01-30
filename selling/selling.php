<?php 
require 'funcSell.php';

$daftarNama = query("SELECT * FROM mitra ORDER BY idlokasi, nama ASC");

if(isset($_POST['submit'])) {
	sell($_POST);
	echo "<script>
		alert('Proses Selesai');
		document.location.href = 'showDagangan.php';
	</script>";
}
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
	<h1>Dagangan</h1>
	<form method="post">
		<table>
			<tr>
				<th>Nama</th>
				<th>Penempatan</th>
				<th>Dagangan</th>
			</tr>
			<?php foreach ($daftarNama as $var): ?>
			<tr>
				<td><?php if($var['idlokasi'] > 0){echo $var['nama'];} else{continue;} ?></td>
				<td>
				<?php
					$idlokasi = $var['idlokasi'];
					$lokasi = singleQuery("SELECT lokasi FROM lokasi WHERE id = '$idlokasi'");
					if ($idlokasi > 0) {
						echo $lokasi['lokasi'];
					}
				?>
				</td>
				<td>
					<input type="hidden" name="mitra[]" value="<?php echo $var['id']; ?>">
					<input type="number" name="cilok[]" value="0">
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<button type="submit" name="submit">Simpan</button>
	</form>
</body>
</html>