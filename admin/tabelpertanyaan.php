<!DOCTYPE html>
<html>
<head>
	<meta name="referrer" content="strict-origin" />
	<title>Projek UAS IR</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.min.css">
</head>
<style>

header{

  top:0;
  left:0;
  width:100%;
  display:flex;
  justify-content: space-between;
  align-items:center;
  transition:0.6s;
  padding:20px 100px;

}

header ul{
	position:relative;
	display:flex;
	justify-content:center;
	align-items:center;
}

header ul li{
	position: relative;
	list-style:none;
	margin-left:10px;
	margin-right:10px;
}
header ul li a{
	position:relative:
	margin:0 15px;
	text-decoration:none;
	color:black;
	letter-spacing:2px;
	font-weight:500px;
	transition:0.6s;
}



</style>

<body>
<header>
  <ul>
    <li><a href="submite.php">Home</a></li>
    <li><a href="tabelpertanyaan.php">Tabel Pertanyaan</a></li>
    <li><a href="tbtdk.php">Tabel Notif</a></li>
  </ul>
</header>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Daftar Pertanyaan</h2>
				<table class="table table-striped">
				  <thead>
				    <tr>
                      <th style="width:50px;">No</th>
				      <th scope="col">Pertanyaan</th>
                      <th scope="col">Jawaban</th>
					  <th scope="col">Ijin</th>
                      <th style="width:70px;">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				    <?php
				    	include '../koneksi.php';
						$result = mysqli_query($konek,"SELECT * FROM tbberita ORDER BY id DESC");
						$no = 1;
							while($row = mysqli_fetch_array($result)) {
								echo '<tr>';
						    	echo '<td>'.$no.'</td>';
                                echo '<td>'.$row['docu'].'</td>';
                                echo '<td>'.$row['jawaban'].'</td>';
								echo '<td>'.$row['ijin'].'</td>';
							    ?>
							    <td><a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Hapus?')" href="hapus.php?idDock=<?= $row['id'] ?>">Hapus</a></td>
								<td><a class="btn btn-warning btn-sm" onclick="return confirm('Yakin Ingin Di Edit?')" href="edit.php?idDock=<?= $row['id'] ?>">Edit</a></td>
								<?php
								if($row['ijin'] == "Belum ada Ijin dari Ahli"){
								?>
								<td><a class="btn btn-success btn-sm" onclick="return confirm('Yakin Ingin Memberi Ijin')" href="ijin.php?idDock=<?= $row['id'] ?>">Ijin</a></td>
								<?php
								}

								?>


								<?php
							    // echo '';
							    
								$no++;
							}
							
						?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>

<script type="text/javascript" src="../assets/jquery/dist/jquery.min.js"></script>
</body>
</html>