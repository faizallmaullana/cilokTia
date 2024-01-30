<?php  
require 'funcBelanja.php';
$tgl = date("d-m-Y");
$belanjaan = query("SELECT * FROM belanja WHERE tanggal = '$tgl'"); // TABLE belanja (tanggal, namabarang, hargasatuan, jumlbarang)

if (isset($_POST['submit'])) {
	addBelanja($_POST);
	echo "<script>
		alert('Proses Selesai');
		document.location.href = 'belanja.php';
	</script>";
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Belanja</title>

</head>
<body>

	<h1>Belanja</h1>

	<h2>Daftar Belanjaan Hari Ini</h2>
	<p id="tanggalIni"><?php echo date('d-m-Y'); ?></p>
	<button onclick="tambahBarang()" id="buttonAddBelanja">Tambah</button>

	<!-- Input Belanjaan -->
	<div id="inputBelanja" style="display:none">			
		<button onclick="addBarang()">Tambah List</button>
		<button onclick="subBarang()">Kurangi List</button>
		<br><br>
		<form action="" method="post">
			<label for="tanggal">Tanggal</label><br>
			<input type="text" id="tanggal" name="tanggal" value="<?php echo date('d-m-Y'); ?>"><br>
			<br>

			<table id="myTable">
				<tr>
					<th>Nama Barang</th>
					<th>Jumlah Barang</th>
					<th>Harga Satuan</th>
					<th>Harga Total</th>			
				</tr>
				<tr>
					<!-- Input ke Table Belanja (tanggal, namabarang, jumlahbarang, hargasatuan) -->
					<td><input type='text' name='namaBarang[]' placeholder='Nama Barang' required></td>
					<td><input type='number' name='jumlahBarang[]' placeholder='Jumlah Barang' required></td>
					<td><input type='number' name='hargaSatuan[]' value="0"></td>
					<td><input type='number' name='hargaTotal[]' value="0"></td>
				</tr>
			</table>
			<button name="submit">Simpan</button>	
		</form>	
	</div>



	<!-- Display Table -->
	<div id="displayedTable">
		<table>
			<tr>
				<th>No.</th>
				<th>Nama Barang</th>
				<th>Jumlah Barang</th>
				<th>Harga Satuan</th>
				<th>Total Harga</th>
			</tr>

			<?php $i = 1; ?>
			<?php foreach ($belanjaan as $var): ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $var['namabarang']; ?></td>
				<td><?php echo $var['jumlahbarang']; ?></td>
				<td><?php echo $var['hargasatuan']; ?></td>
				<td><?php echo $var['hargasatuan'] * $var['jumlahbarang']; ?></td>
			</tr>
			<?php $i++ ?>
			<?php endforeach; ?>
		</table>		
	</div>


</body>

<script src="myScripts.js"></script>
</html>