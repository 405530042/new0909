<?php
require 'connect.php';

$fileCount = count($_FILES['file']['name']);
$uploadDirectory = "upload/";

for ($i = 0; $i < $fileCount; $i++) {

if ($_FILES["file"]["error"][$i] > 0){
echo "Error: " . $_FILES["file"]["error"];
}
else{
echo "檔案名稱: " . $_FILES["file"]["name"][$i]."<br/>";
echo "檔案類型: " . $_FILES["file"]["type"][$i]."<br/>";
echo "檔案大小: " . ($_FILES["file"]["size"][$i] / 1024)." Kb<br />";
echo "暫存名稱: " . $_FILES["file"]["tmp_name"][$i]."<br/>";

if (file_exists("upload/" . $_FILES["file"]["name"][$i])){
echo "檔案已經存在，請勿重覆上傳相同檔案";
}
else{
move_uploaded_file($_FILES["file"]["tmp_name"][$i],"upload/".$_FILES["file"]["name"][$i]);
$name=$_FILES["file"]["name"][$i];
//$image_file=$_FILES["file"]["tmp_name"];

$input = array(':name' => $name);
$sql = "INSERT INTO test2 (name) VALUES(:name)";
$sth = $db->prepare($sql);
$sth->execute($input);

echo "成功新增<br/>";
}
}
}

?>
<?php for ($i = 0; $i < $fileCount; $i++) {
    $name=$_FILES["file"]["name"][$i];?>
<img src="<?php echo $uploadDirectory . $name; ?>" height="200" width="200"> 
<?php }?>