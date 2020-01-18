<?php session_start(); ?>
<?php
require 'connect.php';
                                              
$account = (isset($_POST['account']))?$_POST['account']:"";
$password = (isset($_POST['password']))?$_POST['password']:"";


$sth=$pdo -> prepare("SELECT * FROM user where account LIKE :account AND password LIKE :password");

//$sth = $pdo->prepare($sql);

$sth -> execute(array(':account' => $account,':password' => $password));
$result = $sth -> fetch(PDO::FETCH_ASSOC) ;

if ($result['account']==$account&&$result['password']==$password) {
        session_start();
        header('Location:todolist.php');
   }
   else echo "登入失敗";
   
   

/*if($sth->execute(array(":account" => $account, ":password" => $password)))
{
        if ($account!=null && $password=!null && ":account"==$account && ":password"==$password )
        header('Location:todolist.php');

        else 

        echo '登入失敗';
       
        //echo "succ";
        //$result = $sth->fetch();
        //printf($result['account']);
}
else
{
        echo $sth->error;
}*/

?>
