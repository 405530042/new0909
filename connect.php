<?php
$host="127.0.0.1";
$user="root";
$pasd="";
$database="ciras";
//$connect = mysqli_connect($host,$user,$pasd,$database);
$pdo = new PDO("mysql:host=$host;dbname=$database",$user,$pasd);
$pdo->query('SET NAMES "utf8"');  


?>