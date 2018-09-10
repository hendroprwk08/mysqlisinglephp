<?php
/*
masih ingat bawa html bisa masuk dalam PHP?
disini kita akan melakukan single page operation dengan memasukkan HTML kedlam variabel PHP
*/
$view = "<form action='' method='POST'>
		<p>Nama: <input type='text' name='nama'/></p>
		<p>Usia: <input type='text' name='usia'/></p>
		<p><input type='submit' name='submit' value='Simpan'/></p>
		</form>";

echo $view;
?>