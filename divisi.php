<?php
include "menu.php";
include "database.php";

if (empty($_REQUEST['submit'])){ 
	$view = "<form action='' method='POST'>
			Divisi :</br>
			<input type='text' name='divisi' /></br>
			Honor Divisi :</br>
			<input type='text' name='honor_divisi' /></br>
			<p><input type='submit' name='submit' value='Simpan'/></p>
			</form>
			<table border='1'>
				<tr><th>Divisi</th><th>Honor Divisi</th><th>&nbsp;</th></tr>";
				
			$res = $mysqli->query('select * from divisi order by id_divisi desc');
			while($obj = $res->fetch_assoc()){
				$view .= "<tr><td>$obj[divisi]</td>
						<td>$obj[honor_divisi]</td>
						<td>
							<a href='divisi.php?submit=Edit&id=$obj[id_divisi]'>Edit</a> |
							<a href='divisi.php?submit=Hapus&id=$obj[id_divisi]'>Hapus</a></td></tr>";
				
			}
			$view .="</table>";
}elseif($_REQUEST['submit'] == "Simpan"){
	//simpan
	
	$sql = "insert into divisi (divisi, honor_divisi)
			values( '".$_REQUEST['divisi']."', ".$_REQUEST['honor_divisi'].")";
			
	if (!$mysqli->query($sql)){
		die("<b>Error :</b> ". $mysqli->error);
		
	}
	$view = "<h2>DIVISI</h2>
			Divisi: ". $_REQUEST['divisi']."</br>
			Honor Divisi: ". $_REQUEST['honor_divisi']."</br>
			<p>
				Data Telah Tersimpan
				<a href='divisi.php'>Kembali<a>
			</p>";
}elseif($_REQUEST['submit'] == "Hapus"){
	
	$sql = "delete from divisi where id_divisi = ".$_REQUEST['id'];
			
	if (!$mysqli->query($sql)){
		die("<b>Error :</b> ". $mysqli->error);
		
	}
	header("location:divisi.php");
	}elseif($_REQUEST['submit'] == "Edit"){
		$sql = "select * from divisi where id_divisi = ".$_REQUEST['id'];
		$res = $mysqli->query($sql);
		$obj = $res->fetch_assoc();

		$view = "<h2>Edit Data Divisi</h2>
			<form action='' method='POST'>
			Divisi :</br>
			<input type='text' name='divisi' value='$obj[divisi]' /></br>
			Honor Divisi :</br>
			<input type name='honor_divisi' value='$obj[honor_divisi]' /></br>
			<p>
				<input type='hidden' name='id' value='$obj[id_divisi]'/>
				<input type='submit' name='submit' value='Update'/>
				<a href='divisi.php'>Kembali<a>
			</p>
			</form>";
}elseif($_REQUEST['submit'] == "Update"){
		$sql = "update divisi set
				divisi = '".$_REQUEST['divisi']."',
				honor_divisi = ".$_REQUEST['honor_divisi']."
				where id_divisi = ".$_REQUEST['id'];
				
		if (!$mysqli->query($sql)) {
			die("<b>Error:</b> ". $mysqli->error);
		}
		
		header("location:divisi.php");
		
	}	

echo $view;
?>

