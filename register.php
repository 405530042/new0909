<?php session_start(); ?>

<html>
<head>
    <meta charset="utf-8" >
</head>
<body>

<form name="form1" method="post" action="succ.php">
<p>姓名：<input type="text" name="name">
<p>帳號：<input type="text" name="account">
<p>密碼：<input type="password" name="password">
<p>信箱：<input type="email" name="mail">
<p>身分：<select name="auth">
            <option value="1">作者</option>
            <option value="2">老師</option>
            <option value="3">中心管理員</option>
        </select>
<p><input type="submit" name="submit" value="送出">
</form>



</body>
</html>