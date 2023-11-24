<?php

include 'koneksi.php';


		$lama = $_GET['cekk'];
		$baru = $_GET['cekkk'];
		//$ii = $_GET['ijinn'];
		
		//var_dump($baru);

		for($i = 0; $i < count($lama); $i++){
			//  echo $lama[$i];
			 $queri=mysqli_query($konek,"SELECT id, jawaban, ijin FROM tbberita WHERE id='$lama[$i]'");
			 $row = mysqli_fetch_array($queri);
			//  var_dump($row);
			  //echo"<br>";
			 $jawabanlama[]=$row['jawaban'];
			 $ijin[]=$row['ijin'];
			//  $vv = array($jawabanlama);
			//  $vvv = implode(" ",$vv);
			//  var_dump($vvv);
			

		}
		//prulanagn untuk menggabungkan isi array
		$jawaban_lama = '';
		foreach ($jawabanlama as $bulan) {
			$jawaban_lama .= ' ( '.$bulan . ' ) ';
		}
		$jawaban_lama;

		

		$ijin_lama = '';
		foreach ($ijin as $iji) {
			
			$ijin_lama .= $iji ;
		}
		$ijin_lama;

		//var_dump($jawaban_lama);
		//var_dump($ijin);

		if($ijin  == [0]){
			//echo "beshasil";
			$queri1=mysqli_query($konek,"UPDATE tbberita SET jawaban='$jawaban_lama', ijin='$ijin_lama' ORDER by id DESC LIMIT 1");
		 
		}elseif($ijin >= [1]){
			//echo "gagal";
			$tdk = "Belum ada Ijin dari Ahli";
			$queri1=mysqli_query($konek,"UPDATE tbberita SET jawaban='$jawaban_lama', ijin='$tdk' ORDER by id DESC LIMIT 1"); 
		
		}
		
		
		
		//echo"<br>"; 
		//var_dump($queri1);
		

	//  $lama = $_GET['keylama'];
	// $baru = $_GET['idbaru'];
	//  $queri=mysqli_query($konek,"SELECT id, jawaban FROM tbberita WHERE id='$lama'");
	//  $row = mysqli_fetch_array($queri);
	//  $jawabanlama=$row['jawaban'];

	 

	//  var_dump($lama);
	// $queri1=mysqli_query($konek,"UPDATE tbberita SET jawaban='$jawabanlama' WHERE id = '$baru'"); 

	//  //$proses=mysqli_fetch_array($queri1);
	// // // var_dump($proses);
	if($queri1){
		//echo "sukses";
		header('location:index.php?');
		//var_dump($get_keyword_user);
	}







    // //$get_url = $_POST['id'];
    // $lama = $_GET['keylama'];
	// $jawaban = $_GET['idbaru'];
	// $input=mysqli_query($konek,"INSERT INTO tbberita (docu,jawaban) VALUES('$pertanyaan','$jawaban')") or die (mysqli_error($konek));
	// if($input){
	// 	header('Location:result.php'.$get_keyword_user);		
	//}
?>