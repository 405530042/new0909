<?php
$host="127.0.0.1";
$user="root";
$pasd="";
$database="ciras";
$connect = mysqli_connect($host,$user,$pasd,$database);
// $account = $_POST['account'];  /**多打的account & password */
// $password = $_POST['password'];
$pdo = new PDO("mysql:host=$host;dbname=$database",$user,$pasd);
$pdo->query('SET NAMES "utf8"');  
//mysqli_query($connect,'set names utf8');
//$result=mysqli_query($connect,"INSERT INTO user (account,password) VALUES ('$account','$password')");
?>