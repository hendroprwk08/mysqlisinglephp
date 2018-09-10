<?php
/*
masih ingat bawa html bisa masuk dalam PHP?
disini kita akan melakukan single page operation dengan memasukkan HTML kedlam variabel PHP
*/
if (empty($_POST['submit'])){ //jika tombol submit tak ada yang ditekan
	$view = "<form action='' method='POST'>
			<p>Nama: <input type='text' name='nama'/></p>
			<p>Usia: <input type='text' name='usia'/></p>
			<p><input type='submit' name='submit' value='Simpan'/></p>
			</form>";
}else{
	$view = "Hai, ". $_POST['nama'].", kamu berusia ".$_POST['usia']." thn
			<p><a href='response-post01.php'>Kembali<a></p>";
}

echo $view;
?>