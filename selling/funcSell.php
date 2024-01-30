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


function sell($data){
	global $conn;
	$tanggal = date('d-m-Y');
	$idmitra = $data['mitra'];
	$cilok = $data['cilok'];

	$j = count($idmitra);
	$i = 0;

	while ($i < $j){
		if ($cilok[$i] > 0){
			mysqli_query($conn, "INSERT INTO dagangan VALUES ('', '$tanggal', $cilok[$i], $idmitra[$i])");
			$i++;			
		}
		else{
			$i++;
			continue;
		}
	}
	return mysqli_affected_rows($conn);
}
?>