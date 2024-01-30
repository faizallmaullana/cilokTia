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


function addLokasi($data){
	global $conn;
	$lokasi = $data['lokasi'];
	$datein = $data['datein'];

	mysqli_query($conn, "INSERT INTO lokasi VALUES ('', '$lokasi', '$datein', 0)");
	return mysqli_affected_rows($conn);
}
?>