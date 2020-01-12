<?php session_start(); ?>
<?php
require 'connect.php';
//include("connect.php");                                               
$account = (isset($_POST['account']))?$_POST['account']:"";
$password = (isset($_POST['password']))?$_POST['password']:"";
// $sql="SELECT * FROM user where account='$account' AND password='$password'";
$sql="SELECT * FROM user where account LIKE :account AND password LIKE :password";
$sth = $pdo->prepare($sql);
// $sth->execute(array($account, $password));
$sth->execute(array(':account' => $account, ':password' => $password));
// if($result)
// {
//         header('todolist.php');
//         echo "登入成功";
//         $_SESSION['account'] = $result['account'];
//         $_SESSION['auth'] = $result['auth'];
// }
// else
// {
//         echo"登入失敗";
// }

if($sth->execute(array(':account' => $account, ':password' => $password))){
    echo "succ";
    $result = $sth->fetch();
    print($result['account']);
}
else{
    echo $sth->error;
}
?>