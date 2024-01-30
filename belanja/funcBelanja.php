<?php  
$conn = mysqli_connect('localhost', 'root', '', 'ciloktia');


function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}


// TABLE belanja (tanggal, namabarang, hargasatuan, jumlbarang)
// POST (tanggal, namaBarang, jumlahBarang, hargaSatuan, hargaTotal)
function addBelanja($data){
	global $conn;
	$tanggal = $data['tanggal'];
	$namaBarang = $data['namaBarang'];
	$jumlahBarang = $data['jumlahBarang'];
	$hargaSatuan = $data['hargaSatuan'];
	$hargaTotal = $data['hargaTotal'];

	$j = count($namaBarang);

	$i = 0;
	while ($i < $j){
		if ($hargaTotal[$i] == 0 and $hargaSatuan[$i] > 0){
			mysqli_query($conn, "INSERT INTO belanja VALUES ('', '$tanggal', '$namaBarang[$i]',' $hargaSatuan[$i]', '$jumlahBarang[$i]')");			
		}
		elseif ($hargaTotal[$i] > 0 and $hargaSatuan[$i] == 0){
			$satuan = $hargaTotal[$i] / $jumlahBarang[$i];
			mysqli_query($conn, "INSERT INTO belanja VALUES ('', '$tanggal', '$namaBarang[$i]',' $satuan', '$jumlahBarang[$i]')");		
		}
		elseif ($hargaTotal[$i] > 0 and $hargaSatuan[$i] > 0){
			$satuan = $hargaTotal[$i] / $jumlahBarang[$i];
			if ($satuan == $hargaSatuan[$i]){
				mysqli_query($conn, "INSERT INTO belanja VALUES ('', '$tanggal', '$namaBarang[$i]',' $hargaSatuan[$i]', '$jumlahBarang[$i]')");	
			}
			else {
				echo "<script>alert('Data \"";echo $namaBarang[$i];echo "\" tidak valid!')</script>";
				$i++;
				continue;
			}
		}
		else {
			echo "<script>alert('Data \"";echo $namaBarang[$i];echo "\" tidak valid!')</script>";
			$i++;
			continue;
		}
	$i++;
	}
	return mysqli_affected_rows($conn);
}

?>