<?php  
require 'funcSell.php';

$setoran = query("SELECT * FROM setoran ORDER BY id DESC");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Setoran</title>
</head>
<body>
	<h1>Setoran</h1>

	<table>
		<tr>
			<th>Tanggal</th>
			<th>Cilok</th>
			<th>Setor</th>
		</tr>

		<?php foreach ($setoran as $var): ?>
		<tr>
			<td><?php echo $var['tanggal']; ?></td>
			<td><?php echo $var['cilok']; ?></td>
			<td><?php echo $var['setor']; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>