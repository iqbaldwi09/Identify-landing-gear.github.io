<?php 
include '../koneksi.php';
$id=$_POST['id'];
$pty=$_POST['jawaban'];
$ijin= "Sudah Ada Ijin";
//var_dump($pty);

$query=mysqli_query($konek,"UPDATE tbberita SET jawaban='$pty', ijin='$ijin' WHERE id='$id'");


		if($query){
			//echo "sukses";
			header('location:tbtdk.php');
		}
 ?>