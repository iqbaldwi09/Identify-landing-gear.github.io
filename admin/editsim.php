<?php 
include '../koneksi.php';
$id=$_POST['id'];
$pty=$_POST['pertanyaan'];
$jwb=$_POST['jawab'];
//var_dump($pty);

$query=mysqli_query($konek,"UPDATE tbberita SET docu='$pty', jawaban='$jwb' WHERE id='$id'");


		if($query){
			//echo "sukses";
			header('location:tabelpertanyaan.php');
		}

        
 ?>