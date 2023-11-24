<?php 


if(isset($_POST['simpan'])){
	include 'koneksi.php';

	//$get_url = $_POST['id'];
	$url = $_POST['docu'];
	$input=mysqli_query($konek,"INSERT INTO tbberita (docu) VALUES('$url')") or die (mysqli_error($konek));
	if($input){
		header('Location:isidata.php');		
	}

}

?>