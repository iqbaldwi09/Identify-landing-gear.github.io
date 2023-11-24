<?php 
include '../koneksi.php';
$id=$_GET['idDock'];
$ijin= "Sudah Ada Ijin";
//print_r($ijin);


$query=mysqli_query($konek,"UPDATE tbberita SET ijin='$ijin' WHERE id='$id'");


		if($query){
			//echo "sukses";
            header('location:tabelpertanyaan.php');
		}


        
 ?>