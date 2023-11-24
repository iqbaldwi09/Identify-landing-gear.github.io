<?php
//=============== koleksi fungsi ===================
//fungsi untuk melakukan preprocessing terhadap teks
//terutama stopword removal dan stemming
//--------------------------------------------------------------------------------------------
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
	// $teks = str_replace("0", " ", $teks);
	// $teks = str_replace("1", " ", $teks);
	// $teks = str_replace("2", " ", $teks);
	// $teks = str_replace("3", " ", $teks);
	// $teks = str_replace("4", " ", $teks);
	// $teks = str_replace("5", " ", $teks);
	// $teks = str_replace("6", " ", $teks);
	// $teks = str_replace("7", " ", $teks);
	// $teks = str_replace("8", " ", $teks);
	// $teks = str_replace("9", " ", $teks);

	//ubah ke huruf kecil
	$teks = strtolower(trim($teks));

	//terapkan stop word removal
	$astoplist = array ("tidak","yang", "juga", "dari", "dia", "ini", "itu","atau", "dan", "tersebut", "pada", "dengan", "adalah", "yaitu","cara");
	foreach ($astoplist as $i => $value) {
   	$teks = str_replace($astoplist[$i], "", $teks);
	}

	//terapkan stemming
	//buka tabel tbstem dan bandingkan dengan berita
	$restem = mysqli_query($konek,"SELECT * FROM tbstem ORDER BY Id");

	while($rowstem = mysqli_fetch_array($restem)) {
  		$teks = str_replace($rowstem['Term'], $rowstem['Stem'], $teks);
  	}

	//kembalikan teks yang telah dipreproses
	$teks = strtolower(trim($teks));
	return $teks;
} //end function preproses
//--------------------------------------------------------------------------------------------


//---------------------------------------------------------------------------------------------
// fungsi menambah keyword

//   function addKeyword($keyword_user){
	
//   }

//---------------------------------------------------------------------------------------------

function hitungBobotKeyword(){
	include "koneksi.php";
	$resn = mysqli_query($konek,"SELECT DISTINCT DocId FROM tbindex");
	$n = mysqli_num_rows($resn);

	$keyword = mysqli_query($konek,"SELECT * FROM tbkey ORDER BY Id"); 
	while ($row  = mysqli_fetch_array($keyword)) {
		$termNow = $row['term'];
		$tf = $row['kount'];
		$id = $row['Id'];
			// echo 'Term = '. $termNow;
			// echo "</br>";
		$rescount = mysqli_query($konek,"SELECT count(kount) as total_term FROM tbindex WHERE Term = '$termNow'");
		//var_dump($rescount);
		
		$num_rows = mysqli_fetch_array($rescount);
			// echo $num_rows['total_term'];
			// echo '<br>';

			// echo $tf;
			// echo '<br>';
		$jumlah_total_dokumen = $n + 1;
		error_reporting(0);
		$total_semua_term = $num_rows['total_term']+1;
		//var_dump($total_semua_term);
		$w = $tf * (log10($jumlah_total_dokumen/$total_semua_term)+1);
			// echo $tf." * log(".$jumlah_total_dokumen."/".$total_semua_term.")";
			// echo $w;
			// echo "<br>"; 
		$resUpdateBobot = mysqli_query($konek,"UPDATE tbkey SET bobot = $w WHERE Id = $id ");
		if($resUpdateBobot){
			//echo "berhasil";
		}else{
			echo "ada kesalahan";
		}


	}



	
}



// insert to WdWdi
//--------------------------------------------------------------------------------------------
function WdWdi(){
	include "koneksi.php";
	mysqli_query($konek,"DELETE FROM tbwdwdi");
	mysqli_query($konek,"TRUNCATE TABLE tbwdwdi");
	$get_bobot_keyword = mysqli_query($konek,"SELECT * FROM tbkey ORDER BY Id");
	while ($row = mysqli_fetch_array($get_bobot_keyword)) {
		$termNow = $row['term'];
		$tf = $row['kount'];
		$id = $row['Id'];
		$bobotKeyword = $row['Bobot'];
		$rescount = mysqli_query($konek,"SELECT * FROM tbindex WHERE Term = '$termNow'");

		$bobotKeywordXXbobotDoc = 0;
		while ($aww = mysqli_fetch_array($rescount)) {
			// echo "ID =>".$aww['DocId']." - ".$aww['Term']." => Bobot ==(".$aww['Bobot'].")";
			// echo "<br>";
			// echo $bbb." = ".$aww['Term'];
			// echo "<br>";
			//$bbb = $aww['Term'];
			$bobotKeywordXXbobotDoc =  $bobotKeyword * $aww['Bobot'];
			// echo "Bobot keyword(".$bobotKeyword.") * bobot Dokumen(".$aww['Bobot'].") = ".$bobotKeywordXXbobotDoc; 
			// echo "<br>";
			// echo "===================================================";
			// echo "<br>";
			mysqli_query($konek,"INSERT INTO tbwdwdi(Id_Doc,Hasil_p_Bobot) VALUES(".$aww['DocId'].",$bobotKeywordXXbobotDoc)");
		}

	}
}
//--------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------

function rankingDoC()
{
	include "koneksi.php";
	mysqli_query($konek,"DELETE FROM simpan_hasil");
	mysqli_query($konek,"TRUNCATE TABLE simpan_hasil");
	$query_vector_keyword = mysqli_query($konek,"SELECT SUM(Bobot) AS total_bobot FROM tbkey");
	$fetch_vector_keyword = mysqli_fetch_array($query_vector_keyword);
	$panjangvektorKeyword = sqrt($fetch_vector_keyword['total_bobot']);
	 //echo $panjangvektorKeyword;

	$get_total_WDI = mysqli_query($konek,"SELECT Id_Doc,SUM(Hasil_p_Bobot) as total_WDI FROM `tbwdwdi` GROUP BY Id_Doc");
	 $arr = array();
	while ($row = mysqli_fetch_array($get_total_WDI)) {
		$total_WDI = $row['total_WDI'];
		$quer_get_vector_dokumen = mysqli_query($konek, "SELECT * FROM tbvektor WHERE DocId = ".$row['Id_Doc']);
		
		while ($fetch_vector_dokumen = mysqli_fetch_array($quer_get_vector_dokumen)) {
			
			$rumus = $total_WDI/($panjangvektorKeyword*$fetch_vector_dokumen['Panjang']);
			//echo "<br>";
			//echo "DocId = ".$fetch_vector_dokumen['DocId']." => ".$rumus;
			//echo "<br>";
			$id_dokumen = $fetch_vector_dokumen['DocId']; 
			
			$save_to_result = mysqli_query($konek,"INSERT INTO simpan_hasil(DocId,Hasil_Bobot_Akhir) VALUES($id_dokumen,$rumus) ");

			 array_push($arr,$rumus);
		}
	}
	 //print_r($arr);

}
//--------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------
//fungsi untuk membuat index
function buatindex() {
		
		include "koneksi.php";
		//hapus index sebelumnya
		mysqli_query($konek,"TRUNCATE TABLE tbindex");

		//ambil semua berita (teks)
		$resBerita = mysqli_query($konek,"SELECT * FROM tbberita ORDER BY id");
		$num_rows = mysqli_num_rows($resBerita);
		 //print("Mengindeks sebanyak " . $num_rows . " dokumen. <br />");

		while($row = mysqli_fetch_array($resBerita)) {
			$docId = $row['id'];
			$berita = $row['docu'];

			//terapkan preprocessing
  			$berita = preproses($berita);

  			//simpan ke inverted index (tbindex)
			  $aberita = explode(" ", trim($berita));
			  //$f=array_diff($aberita,array(''));
			  //var_dump($f);
			  

  			foreach ($aberita as $j => $value) {
				//hanya jika Term tidak null atau nil, tidak kosong
				if ($aberita[$j] != null) {

					//berapa baris hasil yang dikembalikan query tersebut?
					// echo $aberita[$j];
					// echo "SELECT kount FROM tbindex WHERE Term = '$aberita[$j]' AND DocId = $docId";
					// echo "<br>";
					$rescount = mysqli_query($konek,"SELECT kount FROM tbindex WHERE Term = '$aberita[$j]' AND DocId = '$docId'");
					 //var_dump($rescount);
					 //echo"<br>";
					$num_rows = mysqli_num_rows($rescount) ;
					// echo $num_rows;
					

					//jika sudah ada DocId dan Term tersebut	, naikkan Count (+1)
					if ($num_rows > 0) {
						$rowcount = mysqli_fetch_array($rescount);
						$count = $rowcount['kount'];
						$count++;

						mysqli_query($konek,"UPDATE tbindex SET kount = $count WHERE Term = '$aberita[$j]' AND DocId = $docId");
					}
					//jika belum ada, langsung simpan ke tbindex
					else {
						mysqli_query($konek,"INSERT INTO tbindex (Term, DocId, kount) VALUES ('$aberita[$j]', $docId, 1)");
					}
				} //end if
			} //end foreach
  		} //end while
} //end function buatindex()
//--------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------
//fungsi hitungbobot, menggunakan pendekatan tf.idf
function hitungbobot() {
	include "koneksi.php";
	//berapa jumlah DocId total?, n
	$resn = mysqli_query($konek,"SELECT DISTINCT DocId FROM tbindex");
	$n = mysqli_num_rows($resn);

	//ambil setiap record dalam tabel tbindex
	//hitung bobot untuk setiap Term dalam setiap DocId
	$resBobot = mysqli_query($konek,"SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysqli_num_rows($resBobot);
	// print("Terdapat " . $num_rows . " Term yang diberikan bobot. <br />");

	while($rowbobot = mysqli_fetch_array($resBobot)) {
		//$w = tf * log (n/N);
		$term = $rowbobot['Term'];
		$tf = $rowbobot['kount'];
		$id = $rowbobot['Id'];
		 //echo 'term = '.$term;
		// echo "<br>";
		// echo 'tf = '.$tf;
		// echo "<br>";
		// echo 'id = '.$id;
		// echo "<br>";
		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysqli_query($konek,"SELECT count(kount) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysqli_fetch_array($resNTerm);

		// menambah NTerm dari keyword
		$get_term_from_keyword = mysqli_query($konek,"SELECT count(kount) as NN FROM tbkey WHERE term = '$term'");
		$result_term_from_keyword = mysqli_fetch_array($get_term_from_keyword);
		$cek_term_from_keyword = mysqli_num_rows($get_term_from_keyword);
		if ($cek_term_from_keyword > 0) {

			$NTerm = $rowNTerm['N']+$result_term_from_keyword['NN'];
			//$NTerm = $rowNTerm['N'];
			//echo ".$NTerm<br>";
			//echo $NTerm = $rowNTerm['N']+$result_term_from_keyword['kount'].'<br>';

		}else{
			$NTerm = $rowNTerm['N'];
		}
		// echo "Term From Keyword = ".$cek_term_from_keyword;
		// echo "<br>";


		// echo  'N Term = '.$NTerm;
		// echo "<br>";
		
		$jumlah_total_dokumen = $n +1;
		$w = $tf * (log10($jumlah_total_dokumen/$NTerm)+1);
		//  echo ".$tf * log(.$jumlah_total_dokumen / .$NTerm)<br>";

		// echo "N = ".$n;
		// echo "<br>"; 
		// echo 'bobot = '.$w;
		// echo "<br>"; 
		// echo "============";
		// echo "<br>";
		//update bobot dari term tersebut
		$resUpdateBobot = mysqli_query($konek,"UPDATE tbindex SET Bobot = $w WHERE Id = $id");
  	} //end while $rowbobot
} //end function hitungbobot
//--------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------
//fungsi panjangvektor, jarak euclidean
//akar(penjumlahan kuadrat dari bobot setiap Term)
function panjangvektor() {
	
	include "koneksi.php";
	//hapus isi tabel tbvektor
	mysqli_query($konek,"TRUNCATE TABLE tbvektor");

	//ambil setiap DocId dalam tbindex
	//hitung panjang vektor untuk setiap DocId tersebut
	//simpan ke dalam tabel tbvektor
	$resDocId = mysqli_query($konek,"SELECT DISTINCT DocId FROM tbindex");

	$num_rows = mysqli_num_rows($resDocId);
	 //print("Terdapat " . $num_rows . " dokumen yang dihitung panjang vektornya. <br />");

	while($rowDocId = mysqli_fetch_array($resDocId)) {
		$docId = $rowDocId['DocId'];

		$resVektor = mysqli_query($konek,"SELECT Bobot FROM tbindex WHERE DocId = $docId");

		//jumlahkan semua bobot kuadrat
		$panjangVektor = 0;
		while($rowVektor = mysqli_fetch_array($resVektor)) {
			$panjangVektor = $panjangVektor + $rowVektor['Bobot']  *  $rowVektor['Bobot'];
			
			// echo " ".$panjangVektor." + ".$rowVektor['Bobot']."  * ".$rowVektor['Bobot']."";
			// echo '<br>';
		}
		// echo $panjangVektor;
		// echo '<br>';

		//hitung akarnya
		$panjangVektor = sqrt($panjangVektor);

		//masukkan ke dalam tbvektor
		$resInsertVektor = mysqli_query($konek,"INSERT INTO tbvektor (DocId, Panjang) VALUES ($docId, $panjangVektor)");
	} //end while $rowDocId
} //end function panjangvektor
//--------------------------------------------------------------------------------------------



//--------------------------------------------------------------------------------------------
//fungsi hitungsim - kemiripan antara query
//setiap dokumen dalam database (berdasarkan bobot di tbindex)
function hitungsim($berita) {

	include "koneksi.php";
	mysqli_query($konek,"TRUNCATE TABLE tbcache");
	//var_dump($berita);
	//ambil jumlah total dokumen yang telah diindex (tbindex atau tbvektor), n
	$resn = mysqli_query($konek,"SELECT Count(panjang) as n FROM tbvektor");

	$rown = mysqli_fetch_array($resn);

	$n = $rown['n'] +1;
	// echo "n =".$n;
	// echo "<br>";
	//var_dump($n);

	//terapkan preprocessing terhadap $query
	$berita = preproses($berita);
	$aquery = explode(" ",trim($berita));
	$aquery1 =  array_unique($aquery);
	$vvv = implode(" ",$aquery1);

	$cc = explode(" ",$vvv);
	//var_dump($aquery1);
	//print_r($cc);
	//echo ".$aquery";
	//echo "<br>";
	//hitung panjang vektor query}




	$panjangQuery = 0;
	$aBobotQuery = array();

	//var_dump($aBobotQuery);

	for ($i=0; $i<count($cc); $i++) {

		$keyword = mysqli_query($konek,"SELECT kount FROM tbkey  WHERE Term = '$cc[$i]'"); 
		$rowNTerm1 = mysqli_fetch_array($keyword);
		$ss = isset($rowNTerm1 ['kount']) ? $rowNTerm1 ['kount'] : '0';
		//$bg = is_numeric($ss);
		//var_dump($ss);
		//hitung bobot untuk term ke-i pada query, log(n/N);
		//hitung jumlah dokumen yang mengandung term tersebut
		$resNTerm = mysqli_query($konek,"SELECT  count(*) as N FROM tbindex WHERE Term = '$cc[$i]'");
		$rowNTerm = mysqli_fetch_array($resNTerm);	
		$NTerm = $rowNTerm['N'] +1;
	
		
		
		//var_dump($resNTerm);
		// echo"n".$NTerm;
		// echo "<br>";
		$idf = 0;
		if($NTerm == 0){
			//echo "data Yang di cari Kosong";
		}else{

		$idf =  log10($n/$NTerm) +1;

		$aBobotQuery[] = $idf;

		//  print_r ($aBobotQuery);
		//  var_dump($idf);
		//  echo "<br>";
		
		}

		$panjangQuery1 = $idf  *  $ss;
		// var_dump($panjangQuery1);
		// echo $panjangQuery1."=".$idf."*".$ss;
		// //  print_r($panjangQuery1);
		//    echo '<br>';
	
			$panjangQuery = $panjangQuery + ($panjangQuery1 * $panjangQuery1 ) ;
		
		
		
		// 	echo $idf." * ".$rowNTerm1['kount']. "=" .$panjangQuery1;
		// 	echo $panjangQuery. " = " .$panjangQuery." + (".$panjangQuery1. " * " .$panjangQuery1." )" ;
		// 	 echo '<br>';
		// $idf = log10($n/$NTerm);
		//    echo " 10(.$n / .$NTerm) = .$idf.";
		//    echo "<br>";
		// 	echo $panjangQuery;
		// 	echo "<br>";
		//simpan di array		

	}
	
	$panjangQuery = sqrt($panjangQuery);
	
	$jumlahmirip = 0;
	
	//ambil setiap term dari DocId, bandingkan dengan Query
	$resDocId = mysqli_query($konek,"SELECT * FROM tbvektor ORDER BY DocId");
	while ($rowDocId = mysqli_fetch_array($resDocId)) {
	
		$dotproduct = 0;
		//var_dump($dotproduct);	
		$docId = $rowDocId['DocId'];
		
		$panjangDocId = $rowDocId['Panjang'];
		//var_dump($panjangDocId);
		//$cou = count($aquery);
		 //var_dump($aquery);
		$resTerm = mysqli_query($konek,"SELECT * FROM tbindex WHERE DocId = $docId");
		while ($rowTerm = mysqli_fetch_array($resTerm)) {
			for ($i=0; $i<count($aquery); $i++) {
				//jika term sama
				if ($rowTerm['Term'] == $aquery[$i]) {

					$dotproduct = $dotproduct + (($rowTerm['Bobot'] * $rowTerm['Bobot']) / $rowTerm['kount'])  ;	
					// echo $dotproduct." + ".$rowTerm['Bobot']." = ".$dotproduct ;	
					// 	//echo "$dotproduct";
					// 	// echo $aquery[$i];
					// 	 echo "<br>";		
				} //end if		
			} //end for $i		
		} //end while ($rowTerm)
		
		if ($dotproduct > 0) {

			$sim = ($dotproduct / ($panjangQuery * $panjangDocId))*100;	
			//var_dump ($sim);

			// echo ".$dotproduct / (.$panjangQuery * .$panjangDocId";
			// echo "<br>";
			
			//simpan kemiripan > 0  ke dalam tbcache
			$resInsertCache = mysqli_query($konek,"INSERT INTO tbcache (kuery, DocId, nilai_sim) VALUES ('$berita', $docId, $sim)");
			$jumlahmirip++;
			
		} 
		
	} //end while $rowDocId
	
	if ($jumlahmirip == 0) {
		$resInsertCache = mysqli_query($konek,"INSERT INTO tbcache (kuery, DocId, nilai_sim) VALUES ('$berita', 0, 0)");
		//var_dump ($resInsertCache);
			
	}	
	//
}//end hitungSim()

//--------------------------------------------------------------------------------------------



//--------------------------------------------------------------------------------------------
// function ambilcache($keyword) {
// 	include "koneksi.php";
// 	$resCache = mysqli_query($konek,"SELECT * FROM tbcache WHERE kuery = '$keyword'  ORDER BY nilai_sim DESC");
// 	//var_dump($resCache);
// 	$num_rows = mysqli_num_rows($resCache);

// 	//var_dump($num_rows);

// 	if ($num_rows > 0) {
// 		//tampilkan semua berita yang telah terurut
// 		while ($rowCache = mysqli_fetch_array($resCache)) {
// 			$docId = $rowCache['DocId'];
// 			$sim = $rowCache['nilai_sim'];

// 			//var_dump($sim);

// 			if ($docId != 0) {
// 				//ambil berita dari tabel tbberita, tampilkan
// 				$resBerita = mysqli_query($konek,"SELECT * FROM tbberita WHERE id = '$docId'");
// 				$rowBerita = mysqli_fetch_array($resBerita);

// 				$judul = $rowBerita['docu'];
// 				$beritaa = $docId . ". (" . $sim . ") <font color=blue><b>" . $judul . "</b></font><br />";
// 				//print ($beritaa);
// 				// print($docId . ". (" . $sim . ") <font color=blue><b>" . $judul . "</b></font><br />");
// 				//print($beritaa . "<hr />");
// 			}
// 		}//end while (rowCache = mysqli_fetch_array($resCache))
// 	}//end if $num_rows>0
// 	else {
// 		hitungsim($keyword);

// 		//pasti telah ada dalam tbcache
// 		$resCache = mysqli_query($konek,"SELECT *  FROM tbcache WHERE kuery = $keyword ORDER BY nilai_sim DESC");
// 		$num_rows = mysqli_num_rows($resCache);

// 		while ($rowCache = mysqli_fetch_array($num_rows)) {
// 			$docId = $rowCache['DocId'];
// 			$sim = $rowCache['nilai_sim'];

// 			if ($docId != 0) {
// 				//ambil berita dari tabel tbberita, tampilkan
// 				$resBerita = mysqli_query($konek,"SELECT * FROM tbberita WHERE Id = $docId");
// 				$rowBerita = mysqli_fetch_array($resBerita);

// 				$judul = $rowBerita['docu'];

// 				//print($docId . ". (" . $sim . ") <font color=blue><b>" . $judul . "</b></font><br />");
// 				//print($beritaa . "<hr />");
// 			}
// 		} //end while
// 	}
// } //end function ambilcache
//--------------------------------------------------------------------------------------------
//============== akhir koleksi fungsi ==================

?>
