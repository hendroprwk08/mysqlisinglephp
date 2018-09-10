<html>
<head>
	<title>Hai cyin</title>
</head>
<body>
<?php
echo "<h1>Ini echo</h1>";
print "<h2>Ini print</h2>";

//die("putus"); //pemberhenti kode (code break)

$a = 1;
$b = 2;

//menampilkan nilai yang tersembunyi dengan print_r
print_r ("nilai a = ".$a); 

echo $a + $b;

$nama = "Marfuah";
$usia = 18;

echo "<br>Namaku ".$nama.", 
      aku berusia ".$usia." tahun";   

//html dalam php
$view = "<table border='1' width='100%'>
			<tr><th>Nama</th><th>Usia</th></tr>
			<tr><td>Andi</td><td>2</td></tr>
			<tr><td>Kevin</td><td>4</td></tr>
			<tr><td>Angga</td><td>5</td></tr>
		</table>";

echo $view;
?>
</body>
</html>