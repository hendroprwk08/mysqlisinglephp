<?php

if (empty($_POST['submit'])){ //jika tombol submit tak ada yang ditekan
	$view = "<h2>ONGKOS KIRIM APP</h2>
			<form action='' method='POST'>
			Jenis:</br>
			<select name='jenis'>
				<option value='Kilat'>Kilat</option>
				<option value='Reguler'>Reguler</option>
				<option value='Ekonomis'>Ekonomis</option>
			</select></br>
			Berat:</br>
			<input type='text' name='berat' maxlength='2'>
			<p><input type='submit' name='submit' value='Cek Ongkos Kirim'/></p>
			</form>";
}else{
	if($_POST['jenis'] == 'Kilat'){
		$biaya = 26000;
	}if($_POST['jenis'] == 'Reguler'){
		$biaya = 18000;
	}else{
		$biaya = 8000;
	}
	
	$total = $_POST['berat'] * $biaya;
	
	$view = "<h2>BIAYA</h2>
			Jenis: ". $_POST['jenis']."</br>
			Biaya: ". $biaya."</br>
			Berat: ". $_POST['berat']."</br>
			<b>Total: ". $total."</b></br>
			<p><a href='ongkirapp.php'>Kembali<a></p>";
}

echo $view;
?>