<?php 


if(isset($_POST['simpan'])){
	include '../koneksi.php';

	$url = $_POST['docu'];
	$jawab = $_POST['jawaban'];
	$ijin= "Sudah Ada Ijin";
	$input=mysqli_query($konek,"INSERT INTO tbberita (docu, jawaban,ijin) VALUES('$url','$jawab','$ijin')") or die (mysqli_error($konek));
	if($input){
		header('Location:submite.php');		
	}

}








?>