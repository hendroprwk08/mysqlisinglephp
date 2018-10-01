<?php
include "menu.php";
include "database.php";

if (empty($_REQUEST['submit'])){ //jika tombol submit tak ada yang ditekan
	$view = "<form action='' method='POST'>
			Username:</br>
			<input type='text' name='username' maxlength='6'/></br>
			Password:</br>
			<input type='password' name='password' maxlength='6'/></br>			
			Nama:</br>
			<input type='text' name='nama'/></br>			
			Email:</br>
			<input type='text' name='email'/></br>			
			<p><input type='submit' name='submit' value='Simpan'/></p>
			</form>
			<table border='1'>
				<tr><th>Username</th><th>Nama</th><th>Email</th><th>&nbsp;</th></tr>";
				
			$res = 	$mysqli->query('select * from pengguna');
			while($obj = $res->fetch_assoc()){
				$view .= "<tr><td>$obj[username]</td>
						<td>$obj[nama]</td>
						<td>$obj[email]</td>
						<td>
						<a href='pengguna.php?submit=Edit&username=$obj[username]'>Edit</a> | 
						<a href='pengguna.php?submit=Hapus&username=$obj[username]'>Hapus</a></td></tr>";
			}
			$view .="</table>";	
				
}elseif($_REQUEST['submit'] == "Simpan"){	
	//simpan 
	$sql = "insert into pengguna values( '".$_REQUEST['username']."',
			'".sha1($_REQUEST['password'])."', '".$_REQUEST['nama']."', 
			'".$_REQUEST['email']."')";	
	
	if (!$mysqli->query($sql)) {
		die("<b>Error:</b> ". $mysqli->error);
	}
	
	header("location:pengguna.php");	
}elseif($_REQUEST['submit'] == "Hapus"){
	$sql = "delete from pengguna where username = '".$_REQUEST['username']."'";	
	
	if (!$mysqli->query($sql)) {
		die("<b>Error:</b> ". $mysqli->error);
	}
	
	header("location:pengguna.php");
}elseif($_REQUEST['submit'] == "Edit"){
	$sql = "select * from pengguna where username = '".$_REQUEST['username']."'";	
	$res = $mysqli->query($sql);
	$obj = $res->fetch_assoc();
	
	$view = "<h2>Edit Data Pengguna</h2>
		<form action='' method='POST'>
		Username:</br>
		<input type='text' name='username' value='$obj[username]' maxlength='6' readonly/></br>
		Password:</br>
		<input type='password' name='password' value='$obj[password]' maxlength='6'/></br>
		Nama:</br>
		<input type='text' name='nama' value='$obj[nama]'/></br>
		Email:</br>
		<input type='text' name='email' value='$obj[email]'/></br>
		<p>
			<input type='hidden' name='temp_username' value='$obj[username]'/> 
			<input type='hidden' name='temp_password' value='$obj[password]'/> 
			<input type='submit' name='submit' value='Update'/> 
			<a href='pengguna.php'>Kembali<a>
		</p>
		</form>"; 
}elseif($_REQUEST['submit'] == "Update"){
	$sql = "update pengguna set 
			nama = '".$_REQUEST['nama']."', 
			email = '".$_REQUEST['email']."' 
			where username = '".$_REQUEST['temp_username']."'";	
	
	if (!$mysqli->query($sql)) {
		die("<b>Error:</b> ". $mysqli->error);
	}
	
	header("location:pengguna.php");
}
echo $view;
?>