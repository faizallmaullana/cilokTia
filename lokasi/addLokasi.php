<?php  
require 'funcLokasi.php';

if (isset($_POST['submit'])) {
	addLokasi($_POST);
	echo "<script>
		alert('Lokasi telah ditambahkan');
		document.location.href = 'lokasi.php';
	</script>";
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Lokasi</title>
</head>
<body>
	<h1>Tambah Lokasi</h1>

	<!-- Input Lokasi (ke table lokasi)-->
	<form method="post">
		<label for="lokasi">Lokasi</label><br>
		<input type="text" id="lokasi" name="lokasi" placeholder="Nama Daerah" required><br>
		<br>
		<label>Tanggal Masuk</label><br>
		<input type="text" id="datein" name="datein" value="<?php echo date('d-m-Y'); ?>" required><br>
		<br>
		<button type="submit" name="submit">Simpan</button>
	</form>
</body>
</html>