<?php
include 'koneksi.php';
$lama = $_GET['keylama'];
$baru = $_GET['idbaru'];

$queri=mysqli_query($konek,"SELECT id, jawaban FROM tbberita WHERE id='$lama'");
$row = mysqli_fetch_array($queri);
    $jawabanlama="";
    //var_dump($jawabanlama);

$tdk = "Belum ada Ijin dari Ahli";
//var_dump($lama);
$queri1=mysqli_query($konek,"UPDATE tbberita SET jawaban='$jawabanlama' , ijin='$tdk' WHERE id = '$baru'"); 

 //$proses=mysqli_fetch_array($queri1);
// var_dump($proses);
if($queri1){
    //echo "sukses";
    header('location:index.php?');
    //var_dump($get_keyword_user);
}
?>