<html>
<head>
	<title>Latihan</title>
	<script language="javascript" type="text/javascript">
		 function hitung(){
			var bulan = document.getElementsByName("bulan")[0].value;
			var biaya = document.getElementsByName("biaya")[0].value;
			var cicilan = parseInt(biaya) / parseInt(bulan); 					
			document.getElementsByName("cicilan")[0].value = cicilan			 
		 }
	</script>
</head>
<body>
<?php
$mysqli = new mysqli("localhost", "root", "", "DBCicilan");

if($mysqli->connect_errno)	
	die ('Gagal melakukan koneksi ke Database : '.$mysqli->connect_error);

if (empty($_POST['submit'])){ //jika tombol submit tak ada yang ditekan
	$view = "<form action ='#' method='POST'>
			Biaya:</br>
			<input type='text' onkeyup='hitung()' name='biaya'/></br>
			Jumlah:</br>
			<input type='text' onkeyup='hitung()' name='bulan'/></br>
			Cicilan:</br>
			<input type='text' name='cicilan' readonly/></br>
			<input type='submit' name='submit' value='Submit'/>
			<input type='reset' name='reset' value='Reset'/>
			</form>
			<table border='1'>
				<tr><th>Biaya</th><th>Bulan</th><th>Cicilan</th></tr>";
			
	$res = 	$mysqli->query('select * from cicilan order by id desc');
	while($obj = $res->fetch_assoc()){
		$view .= "<tr><td>$obj[biaya]</td><td>$obj[bulan]</td><td>$obj[cicilan]</td></tr>";
	}
	$view .="</table>";
}else{	
	$sql = "insert into cicilan (biaya, bulan, cicilan) values( $_POST[biaya], $_POST[bulan], $_POST[cicilan])";	
	
	if (!$mysqli->query($sql)) {
		die("<b>Error:</b></br>". $mysqli->error);
	}
	
	header("Location:latihan.php");
}

echo $view;
?>
</body>
</html>