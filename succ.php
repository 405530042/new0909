<?php

require 'connect.php';

$account = (isset($_POST['account']))?$_POST['account']:"";
$password = (isset($_POST['password']))?$_POST['password']:"";
$name = (isset($_POST['name']))?$_POST['name']:"";
$mail = (isset($_POST['mail']))?$_POST['mail']:"";
$auth = (isset($_POST['auth']))?$_POST['auth']:"";

$input = array(':name' => $name,':mail' => $name,':account' => $account, ':password' => $password, ':auth' => $auth);
$sql = "INSERT INTO user (name, mail, account, password,auth) VALUES(:name,:mail,:account,:password,:auth)";
$sth = $pdo->prepare($sql);
$sth->execute($input);

echo "註冊成功"
?>