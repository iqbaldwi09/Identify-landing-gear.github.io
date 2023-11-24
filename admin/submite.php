

<!DOCTYPE html>
<html>
<head>
	<meta name="referrer" content="strict-origin" />
	<title>Projek UAS IR</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.min.css">
</head>
<style>

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
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
  <a href="index.php" class="btn ">LOGOUT</a>
</header>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Submit Pertanyaan/jawaban</h2>
				<form method="POST" action="submitjawaban.php">
				  <div class="form-group">
				    <label >Pertanyaan</label>
				    <input type="text" class="form-control" name="docu" required="true" placeholder="Masukkan Pertanyaan">
					<label >Jawaban</label>
					<textarea name="jawaban" style="width:100%; margin: 0px; height: 100px;"></textarea>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
				    </div>
				  </div>

				</form>
			</div>
		</div>
	</div>

<script type="text/javascript" src="../assets/jquery/dist/jquery.min.js"></script>
</body>
</html>