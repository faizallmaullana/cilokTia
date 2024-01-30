<?php  
require 'funcMitra.php';
$locations = query("SELECT * FROM lokasi");

if(isset($_POST['submitDagang'])) {
	addMitra($_POST);
	echo "<script>
		alert('Mitra Dagang telah ditambahkan');
		document.location.href = 'mitra.php';
	</script>";
}

if(isset($_POST['submitProduksi'])) {
	addMitra($_POST);
	echo "<script>
		alert('Mitra Dagang telah ditambahkan');
		document.location.href = 'mitra.php';
	</script>";
}

// else{
// 	echo "<script>
// 		alert('Proses GAGAL');
// 		document.location.href = 'Mitra.php';
// 	</script>";
// }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Tambah Mitra</title>
</head>
<body>
	<h1>Tambah Mitra</h1>

	<!-- Tombol Pilih antara tambah mitra produksi atau mitra dagang -->
	<button onclick="document.getElementById('mitraDagang').style.display='none'; document.getElementById('mitraProduksi').style.display='block'">Mitra Produksi</button>
	<button onclick="document.getElementById('mitraDagang').style.display='block'; document.getElementById('mitraProduksi').style.display='none'">Mitra Dagang</button>


	<!-- Input Mitra (Dipilih Salah Satu -->
	<!-- datein, dateout, nama, domisili, idlokasi(penempatan) -->

	<!-- Input Mitra Dagang -->
	<div id="mitraDagang" style="display:none">
		<h2>Mitra Dagang</h2>

		<form method="post">
			<label for="datein">Tanggal Masuk</label><br>
			<input type="text" id="datein" name="datein" value="<?php echo date('d-m-Y'); ?>"><br>
			<br>
			<label for="nama">Nama</label><br>
			<input type="text" id="nama" name="nama" placeholder="Nama"><br>
			<br>
			<label>Domisili</label><br>
			<input type="text" id="domisili" name="domisili" placeholder="Asal Daerah"><br>
			<br>
			<label for="penempatan">Penempatan</label><br>
			<select id="penempatan" name="penempatan">
			<?php foreach ($locations as $location): ?>
				<option value="<?php echo $location['id']; ?>"><?php echo $location['lokasi']; ?></option>
			<?php endforeach ?>
			</select><br>
			<br>
			<button type="submit" name="submitDagang">Simpan</button>
		</form>		
	</div>

	<!-- Input Mitra Produksi -->
	<div id="mitraProduksi" style="display:none">
		<h2>Mitra Produksi</h2>

		<form method="post">
			<input type="hidden" name="penempatan" value="0">
			<label for="datein">Tanggal Masuk</label><br>
			<input type="text" id="datein" name="datein" value="<?php echo date('d-m-Y'); ?>"><br>
			<br>
			<label for="nama">Nama</label><br>
			<input type="text" id="nama" name="nama" placeholder="Nama"><br>
			<br>
			<label>Domisili</label><br>
			<input type="text" id="domisili" name="domisili" placeholder="Asal Daerah"><br>
			<br>
			<button type="submit" name="submitProduksi">Simpan</button>
		</form>
	</div>

</body>
</html>