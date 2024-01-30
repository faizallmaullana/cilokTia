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

?>