<?php
$mysqli = new mysqli("localhost", "root", "", "pegawai");

if($mysqli->connect_errno)	
	die ('Gagal: '.$mysqli->connect_error);

if (empty($_REQUEST['submit'])){ //jika tombol submit tak ada yang ditekan
	$view = "<form action='' method='POST'>
			Nama:</br>
			<input type='text' name='nama'/></br>
			Alamat:</br>
			<textarea name='alamat'></textarea></br>
			Usia:</br>
			<input type='text' name='usia'/></br>			
			Kelamin:</br>
			<select name='kelamin'>
				<option value='Pria'>Pria</option>
				<option value='Wanita'>Wanita</option>
			</select></br>
			Status:</br>
			<input type='radio' name='status' value='Magang'>Magang</br>
			<input type='radio' name='status' value='Kontrak'>Kontrak</br>
			<input type='radio' name='status' value='Tetap'>Tetap</br>
			<p><input type='submit' name='submit' value='Simpan'/></p>
			</form>
			<table border='1'>
				<tr><th>Nama</th><th>Alamat</th><th>Status</th><th>&nbsp;</th></tr>";
				
			$res = 	$mysqli->query('select * from karyawan order by idpegawai desc');
			while($obj = $res->fetch_assoc()){
				$view .= "<tr><td>$obj[nama] ($obj[usia] thn)</td>
						<td>$obj[alamat]</td>
						<td>$obj[status]</td>
						<td>Edit | 
						<a href='response-post02.php?submit=Hapus&id=$obj[idPegawai]'>Hapus</a></td></tr>";
			}
			$view .="</table>";	
				
}elseif($_REQUEST['submit'] == "Simpan"){	
	//simpan 
	$sql = "insert into karyawan (nama, alamat, usia, kelamin, status) 
			values( '".$_REQUEST['nama']."','".$_REQUEST['alamat']."', 
			".$_REQUEST['usia'].", '".$_REQUEST['kelamin']."', 
			'".$_REQUEST['status']."')";	
	
	if (!$mysqli->query($sql)) {
		die("<b>Error:</b> ". $mysqli->error);
	}
	
	$view = "<h2>BIODATA</h2>
			Nama: ". $_REQUEST['nama']."</br>
			Usia: ". $_REQUEST['usia']."</br>
			Kelamin: ". $_REQUEST['kelamin']."</br>
			Status: ". $_REQUEST['status']."</br>
			<p>
				Data telah tersimpan
				<a href='response-post02.php'>Kembali<a>
			</p>";
}elseif($_REQUEST['submit'] == "Hapus"){
	$sql = "delete from karyawan where idpegawai = ".$_REQUEST['id'];	
	
	if (!$mysqli->query($sql)) {
		die("<b>Error:</b> ". $mysqli->error);
	}
	
	header("location:response-post02.php");
}
echo $view;
?>