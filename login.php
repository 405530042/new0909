<?php session_start(); ?>
<?php
require 'connect.php';
//include("connect.php");                                               
$account = (isset($_POST['account']))?$_POST['account']:"";
$password = (isset($_POST['password']))?$_POST['password']:"";

//$sql="SELECT * FROM user where account='$account' AND password='$password'";

$sql="SELECT * FROM user where account LIKE :account AND password LIKE :password";

$sth = $pdo->prepare($sql);
//$sth->execute(array(':account' => $account, ':password' => $password));
if($sth->execute(array(':account' => $account, ':password' => $password)))
{
        header('todolist.php');
        echo "succ";
        $result = $sth->fetch();
        printf($result['account']);
}
else
{
        echo $sth->error;
}

?>
