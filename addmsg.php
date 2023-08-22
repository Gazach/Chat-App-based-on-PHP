<?php 
 session_start();
 include "db_conn.php";
$msg=$_GET["msg"];
$user=$_SESSION["username"];

$q = "SELECT * FROM `user`WHERE username='$user'";
if ($rq = mysqli_query($conn, $q)){
    if (mysqli_num_rows($rq)==1){

        $q = "INSERT INTO `msg`(`username`, `msg`) VALUES ('$user','$msg')";
        $rq = mysqli_query($conn, $q);
    }
}

?>