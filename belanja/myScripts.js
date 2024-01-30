function tambahBarang(){
	document.getElementById('inputBelanja').style.display='block';
	document.getElementById('displayedTable').style.display='none';
	document.getElementById('tanggalIni').style.display='none';
	document.getElementById('buttonAddBelanja').style.display='none';
}

function addBarang(){

  	var table = document.getElementById("myTable");
  	var row = table.insertRow(-1);
  	var cell2 = row.insertCell(0);
	var cell3 = row.insertCell(1);
	var cell4 = row.insertCell(2);
	var cell5 = row.insertCell(3);
	cell2.innerHTML = "<input type='text' name='namaBarang[]' placeholder='Nama Barang'>";
	cell3.innerHTML = "<input type='number' name='jumlahBarang[]' placeholder='Jumlah Barang'>";
	cell4.innerHTML = "<input type='number' name='hargaSatuan[]' placeholder='Harga Satuan'>";
	cell5.innerHTML = "<input type='number' name='hargaTotal[]' placeholder='Harga Total'>";
}

function subBarang(){
	document.getElementById("myTable").deleteRow(-1);
}