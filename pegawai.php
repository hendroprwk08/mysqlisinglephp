<?php
include "menu.php";
include "database.php";

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
			Divisi:</br>
			<select name='divisi'>";
			
			//menggunakan option yang berasal dari table
			$sql = "select * from divisi";
			$res = 	$mysqli->query($sql);
			while($obj = $res->fetch_assoc()){
				$view .= "<option value='$obj[id_divisi]'>$obj[divisi]</option>";
			}			
		$view .= "</select></br>
			Jabatan:</br>
			<select name='jabatan'>";
			
			$sql = "select * from jabatan";
			$res = 	$mysqli->query($sql);
			while($obj = $res->fetch_assoc()){
				$view .= "<option value='$obj[id_jabatan]'>$obj[jabatan]</option>";
			}
			
		$view.="</select><p><input type='submit' name='submit' value='Simpan'/></p>
			</form>
			<table border='1'>
				<tr><th>Nama</th><th>Alamat</th><th>Status</th><th>&nbsp;</th></tr>";
				
			$res = 	$mysqli->query('select * from karyawan order by idpegawai desc');
			while($obj = $res->fetch_assoc()){
				$view .= "<tr><td>$obj[nama] ($obj[usia] thn)</td>
						<td>$obj[alamat]</td>
						<td>$obj[status]</td>
						<td>
						<a href='pegawai.php?submit=Edit&id=$obj[idPegawai]'>Edit</a> | 
						<a href='pegawai.php?submit=Hapus&id=$obj[idPegawai]'>Hapus</a></td></tr>";
			}
			$view .="</table>";	
				
}elseif($_REQUEST['submit'] == "Simpan"){	
	//simpan 
	$sql = "insert into karyawan (nama, alamat, usia, kelamin, status, id_divisi, id_jabatan) 
			values( '".$_REQUEST['nama']."','".$_REQUEST['alamat']."', 
			".$_REQUEST['usia'].", '".$_REQUEST['kelamin']."', 
			'".$_REQUEST['status']."', ".$_REQUEST['divisi'].", ".$_REQUEST['jabatan'].")";	
	
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
				<a href='pegawai.php'>Kembali<a>
			</p>";
}elseif($_REQUEST['submit'] == "Hapus"){
	$sql = "delete from karyawan where idpegawai = ".$_REQUEST['id'];	
	
	if (!$mysqli->query($sql)) {
		die("<b>Error:</b> ". $mysqli->error);
	}
	
	header("location:pegawai.php");
}elseif($_REQUEST['submit'] == "Edit"){
	$sql = "select * from karyawan where idpegawai = ".$_REQUEST['id'];	
	$res = $mysqli->query($sql);
	$obj = $res->fetch_assoc();
	
	/*
	pada kasus ini option dan radio button bersifat statis (nilainya tak berubah)
	maka untuk nilai yang bersifat dinamis (berubah-ubah) akan dibahas pada
	pertemuan lain
	*/
	
	//set option
	$optPria  = "";	
	if($obj['kelamin'] == "Pria") $optPria = "selected='selected'";
	
	$optWanita  = "";		
	if($obj['kelamin'] == "Wanita") $optWanita = "selected='selected'";
	
	//set radio
	$rdMagang  = "";	
	if($obj['status'] == "Magang") $rdMagang = "checked";
	
	$rdKontrak  = "";		
	if($obj['status'] == "Kontrak") $rdKontrak = "checked";
	
	$rdTetap = "";
	if($obj['status'] == "Tetap") $rdTetap = "checked";
	
	$view = "<h2>Edit Data Karyawan</h2>
		<form action='' method='POST'>
		Nama:</br>
		<input type='text' name='nama' value='$obj[nama]'/></br>
		Alamat:</br>
		<textarea name='alamat'>$obj[alamat]</textarea></br> 
		Usia:</br>
		<input type='text' name='usia' value='$obj[usia]'/></br> 		
		Kelamin:</br>
		<select name='kelamin'>
			<option value='Pria' $optPria>Pria</option> 
			<option value='Wanita' $optWanita>Wanita</option> 
		</select></br>
		Status:</br>
		<input type='radio' name='status' value='Magang' $rdMagang>Magang</br> 
		<input type='radio' name='status' value='Kontrak' $rdKontrak>Kontrak</br> 
		<input type='radio' name='status' value='Tetap' $rdTetap>Tetap</br> 
		<p>
			<input type='hidden' name='id' value='$obj[idPegawai]'/> 
			<input type='submit' name='submit' value='Update'/> 
			<a href='pegawai.php'>Kembali<a>
		</p>
		</form>"; 
}elseif($_REQUEST['submit'] == "Update"){
	$sql = "update karyawan set 
			nama = '".$_REQUEST['nama']."', 
			alamat = '".$_REQUEST['alamat']."', 
			usia =  ".$_REQUEST['usia'].", 
			kelamin = '".$_REQUEST['kelamin']."', 
			status = '".$_REQUEST['status']."' 
			where idpegawai = ".$_REQUEST['id'];	
	
	if (!$mysqli->query($sql)) {
		die("<b>Error:</b> ". $mysqli->error);
	}
	
	header("location:pegawai.php");
}
echo $view;
?>