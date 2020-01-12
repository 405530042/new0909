<?php session_start(); ?>
<?php
require 'connect.php';
//include("connect.php");                                               
$account = $_POST['account'];
$password = $_POST['password'];

$sql="SELECT * FROM user where account='$account' AND password='$password'";

$sth = $pdo->prepare($sql);
$sth->execute(array($account, $password));
$result = $sth->fetch(PDO::FETCH_OBJ);

//$result=mysqli_query($connect,$sql_query_login);
if($result)
{
        header('todolist.php');
        echo "登入成功";
        $_SESSION['account'] = $result['account'];
        $_SESSION['auth'] = $result['auth'];
}
else
{
        echo"登入失敗";
}


?>
