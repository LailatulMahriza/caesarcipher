<?php
	$nama = $_POST['jeneng'];
	$plain = $_POST['plain'];
	
	$namafile = $nama. ".txt";
	$strlength = strlen($plain); //gets the length of our $content string.
	$create = fopen("plain/" .$namafile, "w"); //uses fopen to create our file.
	$write = fwrite($create, $plain, $strlength); //writes our string to our file.
	$close = fclose($create); //closes our file
	
	echo "<script>alert('File Berhasil Dibuat');location.replace('dekripsi.php');</script>";
?>