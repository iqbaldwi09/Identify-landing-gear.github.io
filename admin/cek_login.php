<?php 

session_start();
 

include "../koneksi.php";
 
$username = $_POST['user'];
$password = $_POST['pass'];

var_dump($password);
 

//$login = mysqli_query("SELECT * FROM tb_user where email='$username' and pass='$password'",$dbh);

$login = mysqli_query($konek,"SELECT * FROM tbadmin where user='$username' and pass='$password'");

 

//$cek = mysqli_num_rows($login);
$cek = mysqli_num_rows($login);

if($cek > 0){

	$data = mysqli_fetch_assoc($login);

			if( $data){
			
				$_SESSION['user'] = $username;
				$_SESSION['pass'] = $password;

				header("location:submite.php");
			}

}else{
	// $data = "Username dan Password Salah";
	// header("location:error_login.php");
	header("location:index.php?pesan=gagal");
	// header("location:error_login.js");
}
?>