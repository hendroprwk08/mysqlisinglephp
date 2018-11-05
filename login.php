<?php
session_start();
include "database.php";

if (empty($_REQUEST['submit'])){ //jika tombol submit tak ada yang ditekan
	$view = "<form action='' method='POST'>
			Username:</br>
			<input type='text' name='username' maxlength='6'/></br>
			Password:</br>
			<input type='password' name='password' maxlength='6'/></br>					
			<p><input type='submit' name='submit' value='Login'/></p>";
}elseif($_REQUEST['submit'] == "Login"){	
	//simpan 
	$sql = "select * from pengguna 
			where username = '". $_REQUEST['username']."'
			and password = '". sha1($_REQUEST['password'])."'";	
	
	$query = $mysqli->query($sql);
	$count = $query->num_rows;
	
	if($count != 0){
		$_SESSION['username'] = $_REQUEST['username'];	
		header("location:pegawai.php");	
	}else{
		$view = "data tak ditemukan!. <a href='login.php'>coba lagi</a>";
	}
}

echo $view;
?>