<?php 

function preproses($teks) {

	include "koneksi.php";
  	//bersihkan tanda baca, ganti dengan space
	$teks = str_replace("'", " ", $teks);
	$teks = str_replace("-", " ", $teks);
	$teks = str_replace(")", " ", $teks);
	$teks = str_replace("(", " ", $teks);
	$teks = str_replace("\"", " ", $teks);
	$teks = str_replace("/", " ", $teks);
	$teks = str_replace("=", " ", $teks);
	$teks = str_replace(".", " ", $teks);
	$teks = str_replace(",", " ", $teks);
	$teks = str_replace(":", " ", $teks);
	$teks = str_replace(";", " ", $teks);
	$teks = str_replace("!", " ", $teks);
	$teks = str_replace("?", " ", $teks);

	//ubah ke huruf kecil
	$teks = strtolower(trim($teks));

	//terapkan stop word removal
	$astoplist = array ("tidak","yang", "juga", "dari","pada", "dia", "ini", "itu","atau", "dan", "tersebut", "dengan", "adalah", "yaitu" ,"cara");
	foreach ($astoplist as $i => $value) {
	   $teks = str_replace($astoplist[$i], "", $teks);
	   // var_dump($teks);
	   
	}

	//terapkan stemming
	//buka tabel tbstem dan bandingkan dengan berita
	$restem = mysqli_query($konek,"SELECT * FROM tbstem ORDER BY Id");

	// while($rowstem = mysqli_fetch_array($restem)) {
  	// 	$teks = str_replace($rowstem['Term'], $rowstem['Stem'], $teks);
  	// }

	//kembalikan teks yang telah dipreproses
	$teks = strtolower(trim($teks));
	return $teks;
} //end function preproses

include "koneksi.php";
$get_keyword_user = $_GET['cari'];

//var_dump($get_keyword_user);

mysqli_query($konek,"DELETE FROM tbkey");
//hapus index sebelumnya
mysqli_query($konek,"TRUNCATE TABLE tbindex");
//$berita = //ini didapat dari value keyword yang dimasukan user!
$berita = $get_keyword_user;
$berita = preproses($berita);

//simpan ke inverted index (tbindex)
	$aberita = explode(" ", trim($berita));

	// $aquery = explode(" ",trim($berita));
	 $aquery1 =  array_unique($aberita);
	 $vvv = implode(" ",$aquery1);

	 $cc = explode(" ",$vvv);

	 $f=array_diff($aberita,array(''));

	//  var_dump($f);

//$words = substr_count_count($berita,1);

$words = array_count_values($f);
 //echo $words;
$count_keyword = count($words);
//print_r($count_keyword);
//echo ".$count_keyword.";
if($count_keyword > 0){
	foreach ($words as $xxx => $val) {
		$input=mysqli_query($konek,"INSERT INTO tbkey (term,kount) VALUES('$xxx','$val')");
		//echo "INSERT INTO tbkeyword (Term,kount) VALUES ('$xxx','$val')";
		if($input){
			//echo "sukses";
			header('location:result.php?cari='.$get_keyword_user);
		}
	}
	header('location:result.php?cari='.$get_keyword_user);
}


 ?>