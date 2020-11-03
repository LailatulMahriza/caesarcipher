<?php
	$nama = $_POST['jeneng'];
	$cipher = $_POST['cipher'];
	
	$namafile = $nama. ".txt";
	$strlength = strlen($cipher); //gets the length of our $content string.
	$create = fopen("cipher/" .$namafile, "w"); //uses fopen to create our file.
	$write = fwrite($create, $cipher, $strlength); //writes our string to our file.
	$close = fclose($create); //closes our file
	
	echo "<script>alert('File Berhasil Dibuat');location.replace('enkripsi.php');</script>";
?>