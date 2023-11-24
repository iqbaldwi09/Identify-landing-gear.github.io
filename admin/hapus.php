<?php
include '../koneksi.php';
$idDock = $_GET['idDock'];
//var_dump($idDock);

$hapus = mysqli_query($konek, "DELETE FROM tbberita WHERE id='$idDock'");
if($hapus){
	header('location:tabelpertanyaan.php');
}else{
	echo 'error';
}




?>