<!DOCTYPE html>
<head>
    <meta charset="utf-8" >
</head>
<body>
    <form action="upload.php" method="POST" >
        資料夾名稱:<input type="folder" name="foldernm" id="folder" >
        活動日期:<input type="date" name="folderdate" >
        <input type="submit" name="submit1" value="新增資料夾" >
        </form>
    

    <form action="upload.php" method="POST" enctype="multipart/form-data">
    檔案名稱:<input type="file" name="file[]" id="file" multiple>
    相簿名稱:
    <select id="folderList" type="folder" name="foldernm2">
        <option></option>
    </select>
    <input type="submit" name="submit2" value="上傳檔案" >
    </form>
    <a href="folder.php">相簿</a>
</body>
<?php

//require 'dbfunction.php';
//$connection=new dbfunction();

//$connection->connect();
require 'connect.php';
$sql = "select * from folder";
$result = $db->query($sql);

$folderCodeArr=array();     //用來存哪些選項的陣列
$folderCount=0;

//$row = $result->fetch(PDO::FETCH_NUM);
while($rows=$result->fetch(PDO::FETCH_ASSOC))
{
    $folderCodeArr[$folderCount]=$rows['name'];
	$folderCount++;
}
for($i=0;$i<count($folderCodeArr);$i++)
{
	echo "<script type=\"text/javascript\">";
	echo "document.getElementById(\"folderList\").options[$i]=new Option(\"$folderCodeArr[$i]\",\"$folderCodeArr[$i]\");";
	echo "</script>";
}
?>
</html>