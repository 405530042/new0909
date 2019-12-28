<?php session_start(); ?>
<?php
require 'connect.php';
//include("connect.php");                                               
$account = $_POST['account'];
$password = $_POST['password'];

$sql_query_login="SELECT * FROM user where account='$account' AND password='$password'";
$result=mysqli_query($connect,$sql_query_login);
if(mysqli_num_rows($result))
{
        echo "登入成功";
        $_SESSION['account'] = $account;
        $_SESSION['auth'] = $result['auth'];
}
else
{
        echo"登入失敗";
}


?>
