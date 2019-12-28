<?php
$host="127.0.0.1";
$user="root";
$pasd="";
$database="ciras";
$connect = mysqli_connect($host,$user,$pasd,$database);
$account = $_POST['account'];
$password = $_POST['password'];

mysqli_query($connect,'set names utf8');

//$result=mysqli_query($connect,"INSERT INTO user (account,password) VALUES ('$account','$password')");
?>