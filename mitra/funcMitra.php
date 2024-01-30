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


function singleQuery($query){
	global $conn;
	$result = mysqli_fetch_assoc(mysqli_query($conn, $query));

	return $result;
}


// Table => mitra => datein, dateout, nama, domisili, idlokasi (jika produksi, idlokasi = 0)
// Dari post => datein, nama, domisili, penempatan(idlokasi)
function addMitra($data){
	global $conn;
	$datein = $data['datein'];
	$nama = $data['nama'];
	$domisili = $data['domisili'];
	$penempatan = $data['penempatan'];

	mysqli_query($conn, "INSERT INTO mitra VALUES ('', '$datein', 0, '$nama', '$domisili', '$penempatan')");
	return mysqli_affected_rows($conn);
}


function totalTabungan($data){
	global $conn;
	$query = "SELECT * FROM tabungan WHERE idmitra = $data";
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	$sum = 0;
	$sumin = 0;
	foreach ($rows as $total) {
		$sumin += $total['keluar'];
		$sum += $total['masuk'];
	}
	$allsum = $sum - $sumin;
	return $allsum;
}
?>