<html>
    <head>
    </head>
    <body>
    <form name="form1" method="post" action="change.php">
<p>帳號：<input type="text" name="account">
<p>密碼：<input type="password" name="password">
<p>修改密碼:<input type="password" name="newpassword">
<p><input type="submit" name="submit" value="確認">
</form>
    </body>
</html>
<?php
session_start(); 
if(isset($_POST['submit'])) {

require 'connect.php';
$account = (isset($_POST['account']))?$_POST['account']:"";
$password = (isset($_POST['password']))?$_POST['password']:"";
$newpassword = (isset($_POST['newpassword']))?$_POST['newpassword']:"";

$input = array(':account' => $account, ':newpassword' => $newpassword);
$sql = "UPDATE user SET password=:newpassword WHERE account=:account";
$stmt= $db->prepare($sql);
$stmt->execute($input);

header('Location:login.html');

}


?>