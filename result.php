

<!DOCTYPE html>
<html>
<head>
	<meta name="referrer" content="strict-origin" />
	<title>Projek UAS IR</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
</head>
<style type="text/css">
	  .col-example {
	      padding: 1rem;
	      background-color: #33b5e5;
	      border: 2px solid #fff;
	      color: #fff;
	      text-align: center;
	    }
	    .search_form input{
	    	padding: 25px;
	    	border-top-left-radius: 2em;
	    	border-bottom-left-radius: 2em;
	    	border: 1px solid #eaeaea !important;
	    }
	    .search_form input:focus{
	    	border:0px !important;
	    	outline: none !important;
	    	box-shadow: none !important;
	    	border: 1px solid #eaeaea !important;
	    }
	    .search_form button{
	    	padding: 0 30px !important;
	    	border-bottom-right-radius: 2em;
	    	border-top-right-radius: 2em;
	    	border: 1px solid #eaeaea !important;
	    }
	    .action {
	    	font-size: 11px;
	    	margin-left: 25px;
	    	color:#b7b7b7;
	    }
	    .result-list .list-group-item{
	    	border:0px !important;
	    	margin-bottom: 20px;
	    }
		.right {
  float: right;


}
</style>

<script>
	function validate()
		{
		var chks = document.getElementsByName('cekk[]');
		var hasChecked = false;
		for (var i = 0; i < chks.length; i++)
		{
			if (chks[i].checked)
			{
				if(confirm("Yakin Tidak Ada Jawaban Yang Ingin Di Pilih Lagi?") == false){
					hasChecked = false;
				}else{
					hasChecked = true;
				}
			
			}
		}

		if (hasChecked == false)
			{
			alert("Jangan Lupa di Centang.");
			return false;
			}

		return true;
		}
</script>
<body>



	<?php 

	// echo 2*log(3/2);
	include 'fungsi.php';

	$get_keyword_user = $_GET["cari"];
	
	//var_dump($get_keyword_user);

	buatindex();
	hitungbobot(); 
	panjangvektor(); 
	hitungsim($get_keyword_user);
	//ambilcache($get_keyword_user);
	//addKeyword($get_keyword_user);

	hitungBobotKeyword();
	WdWdi();
	rankingDoC();
	 ?>


	<div class="container">
		<div class="row">
			<div class="col-12 pt-5" style="border-bottom: 1px solid #f7f7f7; text-align: center;">
						<a href="index.php"><h5>Problem Solving Landing Gear Pesawat Cessna</h5></a>
				
					<div >
						<form method="GET" action="proses_cari.php" class="" style="padding: 20px 0 0 0;">
							<div class="input-group mb-3 search_form">
							  <input type="text" class="form-control" placeholder="Mau nyari apa?" name="cari" value="<?= $get_keyword_user;  ?>">
							  <div class="input-group-append">
							    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
							  </div>
							</div>
						</form>
					</div>
					
			</div>
			<?php 
			include "koneksi.php";
			$query = mysqli_query($konek,"SELECT tbcache.DocId,tbcache.nilai_sim,tbberita.id,tbberita.jawaban, tbberita.docu, tbberita.ijin FROM tbcache INNER JOIN tbberita ON tbcache.DocId = tbberita.Id ORDER BY nilai_sim DESC");
			$total_hasil_result = mysqli_num_rows($query);


			//menampilkan DATA JAWABAN TERBAIK YANG LAMA
			$query2 = mysqli_query($konek,"SELECT tbcache.DocId,tbcache.nilai_sim,tbberita.id,tbberita.docu,tbberita.jawaban,tbberita.ijin FROM tbcache INNER JOIN tbberita ON tbcache.DocId = tbberita.Id ORDER BY nilai_sim DESC LIMIT 1");
			$row2 = mysqli_fetch_array($query2);
			$jwblama=$row2['jawaban'];
			$idlama=$row2['id'];
			$jj = $row['ijin'];

			//perintah insert ke berita
			$input2=mysqli_query($konek,"INSERT INTO tbberita (docu, jawaban, ijin) VALUES('$get_keyword_user','$jwblama', '$jj')") or die (mysqli_error($konek));


			//menampilkan id kasus baru
			$query3 = mysqli_query($konek,"SELECT id FROM tbberita where docu='$get_keyword_user'");
			$row3 = mysqli_fetch_array($query3);
			$idbaru=$row3['id'];

			//var_dump($idbaru);

			 ?>


			<form action="edit.php" method="get" onSubmit="return validate()">

			
			<div class="container">
			<div class="col-12" style="margin-top: 25px;">
				<div class="col-12">
				<h3>Pertanyaan : <?php echo $get_keyword_user; ?></h3>
					<div style="height: 40px; font-size: 13px;color: grey;margin-left: 19px;">
						<i>Menampilkan <b><?= $total_hasil_result ?></b> Hasil</i>
						<a class="btn btn-danger btn-sm right" onclick="return confirm('Yakin Tidak Ada Jawaban Yang Benar?')" href="tidakada.php?keylama=<?= $row['id']?>&idbaru=<?=$idbaru ?>">Tidak Ada Yang Sesuai</a>
						
						<input  class="btn btn-primary" type="submit" value="Simpan">
					</div>

					<div class="row">
						<div class="col-12">
							<div class="list-group result-list">

								<?php 
									
									while ($row = mysqli_fetch_array($query)) {
										if($row['nilai_sim'] == 0){
											continue;
										}
										?>
							  <a class="list-group-item list-group-item-action flex-column align-items-start">
							  <div class="d-flex w-100 justify-content-between">
								<p>Pertanyaan Yang Serupa : <?= $row['docu'] ?></p>
							    </div>
							    <div class="d-flex w-100 justify-content-between">
							      <pre><p>Jawaban : </p> <?= $row['jawaban'] ?></pre>
							    </div>
								<small class="badge badge-info"><b>Hasil Bobot : <?= $row['nilai_sim'] ?>%</b></small>
								<small class="badge badge-info"><b>Perijinan : <?= $row['ijin'] ?></b></small>
								<table>
								<td>
									<!-- <a class="btn btn-success btn-sm" onclick="return confirm('Apakah Masih ingin Memilih?')" href="edit.php?keylama=<?= $row['id']?>&idbaru=<?=$idbaru ?>">sesuai</a>									 -->
									<p style="font-size: 13px;"><input type="checkbox" name="cekk[]" value="<?= $row['id']?>"> Centang Jawaban Yang Sesuai</p>
									
									
								</table>
							  </a>
								<?php
								}
								 ?>

								 <input type="hidden" name="cekkk" value="<?=$row3['id'] ?>">
								 
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
			</div>
		</div>
		
		</form>
	</div>

	<div class="modal fade bd-vector" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hasil Perhitungan Vector</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="text-center"><h2>Panjang Vector Dokumen</h2></div>
					<table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">DocId</th>
					      <th scope="col">Panjang</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
					  		include 'koneksi.php';
							$result = mysqli_query($konek," SELECT * FROM tbvektor ");
							while($row = mysqli_fetch_array($result)) {
								echo '<tr>';
							    echo '<td>'.$row['DocId'].'</td>';
							    echo '<td>'.$row['Panjang'].'</td>';
								echo '</tr>';
							}
					  	?>
					  </tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade bd-bobot" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hasil Perhitungan Bobot</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="text-center"><h2>Bobot Keyword</h2></div>
					<table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Term</th>
					      <th scope="col">Count</th>
					      <th scope="col">Bobot</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
					  		include 'koneksi.php';
							$result = mysqli_query($konek," SELECT * FROM tbkey ");
							while($row = mysqli_fetch_array($result)) {
								echo '<tr>';
						    	echo '<td>'.$row['Id'].'</td>';
							    echo '<td>'.$row['term'].'</td>';
							    echo '<td>'.$row['kount'].'</td>';
							    echo '<td>'.$row['Bobot'].'</td>';
								echo '</tr>';
							}
					  	?>
					  </tbody>
					</table>
					<div class="text-center"><h2>Bobot Dokumen</h2></div>
					<table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Term</th>
					      <th scope="col">Doc-Id</th>
					      <th scope="col">Count</th>
					      <th scope="col">Bobot</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
					  		include 'koneksi.php';
							$result = mysqli_query($konek," SELECT * FROM tbindex ");
							while($row = mysqli_fetch_array($result)) {
								echo '<tr>';
						    	echo '<td>'.$row['Id'].'</td>';
							    echo '<td>'.$row['Term'].'</td>';
							    echo '<td>'.$row['DocId'].'</td>';
							    echo '<td>'.$row['kount'].'</td>';
							    echo '<td>'.$row['Bobot'].'</td>';
								echo '</tr>';
							}
					  	?>
					  </tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="assets/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>




</body>
</html>