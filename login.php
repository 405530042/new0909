<?php
$host="127.0.0.1";
$user="root";
$pasd="";
$database="login";
$connect = mysqli_connect($host,$user,$pasd,$database);
$id = $_POST['id'];
$pwd = $_POST['pwd'];

mysqli_query($connect,'set names utf8');

$result=mysqli_query($connect,"INSERT INTO user (id,pwd) VALUES ('$id','$pwd')");

session_start();                                                  
$id = $_POST['id'];
$psw = $_POST['pwd'];                      

if ($id !="admin" or $pwd !="123456")    
        { 
         echo $id . "不存在此系統內";
         exit;
        }

$_SESSION['id']=$id;                     
$_SESSION['pwd']=$pwd;              
echo $_SESSION['id'] . "你好";

?>
