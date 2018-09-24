<?php
include "menu.php";
include "database.php";

if (empty($_REQUEST['submit'])){ 
	$view = "<form action='' method='POST'>
			Jabatan :</br>
			<input type='text' name='jabatan' /></br>
			Honor Jabatan :</br>
			<input type='text' name='honor_jabatan' /></br>
			<p><input type='submit' name='submit' value='Simpan'/></p>
			</form>
			<table border='1'>
				<tr><th>Jabatan</th><th>Honor Jabatan</th><th>&nbsp;</th></tr>";
				
			$res = $mysqli->query('select * from jabatan order by id_jabatan desc');
			while($obj = $res->fetch_assoc()){
				$view .= "<tr><td>$obj[jabatan]</td>
						<td>$obj[honor_jabatan]</td>
						<td>
							<a href='jabatan.php?submit=Edit&id=$obj[id_jabatan]'>Edit</a> |
							<a href='jabatan.php?submit=Hapus&id=$obj[id_jabatan]'>Hapus</a></td></tr>";
				
			}
			$view .="</table>";
}elseif($_REQUEST['submit'] == "Simpan"){
	//simpan
	
	$sql = "insert into jabatan (jabatan, honor_jabatan)
			values( '".$_REQUEST['jabatan']."', ".$_REQUEST['honor_jabatan'].")";
			
	if (!$mysqli->query($sql)){
		die("<b>Error :</b> ". $mysqli->error);
		
	}
	$view = "<h2>JABATAN</h2>
			Jabatan: ". $_REQUEST['jabatan']."</br>
			Honor Jabatan: ". $_REQUEST['honor_jabatan']."</br>
			<p>
				Data Telah Tersimpan
				<a href='jabatan.php'>Kembali<a>
			</p>";
}elseif($_REQUEST['submit'] == "Hapus"){
	
	$sql = "delete from jabatan where id_jabatan = ".$_REQUEST['id'];
			
	if (!$mysqli->query($sql)){
		die("<b>Error :</b> ". $mysqli->error);
		
	}
	header("location:jabatan.php");
	}elseif($_REQUEST['submit'] == "Edit"){
		$sql = "select * from jabatan where id_jabatan = ".$_REQUEST['id'];
		$res = $mysqli->query($sql);
		$obj = $res->fetch_assoc();

		$view = "<h2>Edit Data Divisi</h2>
			<form action='' method='POST'>
			Jabatan :</br>
			<input type='text' name='jabatan' value='$obj[jabatan]' /></br>
			Honor Jabatan :</br>
			<input type name='honor_jabatan' value='$obj[honor_jabatan]' /></br>
			<p>
				<input type='hidden' name='id' value='$obj[id_jabatan]'/>
				<input type='submit' name='submit' value='Update'/>
				<a href='jabatan.php'>Kembali<a>
			</p>
			</form>";
}elseif($_REQUEST['submit'] == "Update"){
		$sql = "update jabatan set
				jabatan = '".$_REQUEST['jabatan']."',
				honor_jabatan = ".$_REQUEST['honor_jabatan']."
				where id_jabatan = ".$_REQUEST['id'];
				
		if (!$mysqli->query($sql)) {
			die("<b>Error:</b> ". $mysqli->error);
		}
		
		header("location:jabatan.php");
		
	}	

echo $view;
?>

