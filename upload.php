<?php
require 'connect.php';

if(isset($_POST['submit1']))
{
    $folder=$_POST['foldernm'];
    $date=$_POST['folderdate'];

    echo $folder;

    if (mkdir("upload/".$folder)) {
    echo "新增成功";
    }

    $input = array(':name' => $folder,':event_date'=>$date);
    $sql = "INSERT INTO folder (name,event_date) VALUES(:name,:event_date)";
    $sth = $db->prepare($sql);
    $sth->execute($input);
}

if(isset($_POST['submit2'])) {

    $fileCount = count($_FILES['file']['name']);
    $foldernm2 = $_POST['foldernm2'];
    $uploadDirectory = "upload/".$foldernm2."/";   

    for ($i = 0; $i < $fileCount; $i++) {

        if ($_FILES["file"]["error"][$i] > 0){
        echo "Error: " . $_FILES["file"]["error"];
        }
        else{
        /*echo "檔案名稱: " . $_FILES["file"]["name"][$i]."<br/>";
        echo "檔案類型: " . $_FILES["file"]["type"][$i]."<br/>";
        echo "檔案大小: " . ($_FILES["file"]["size"][$i] / 1024)." Kb<br />";
        echo "暫存名稱: " . $_FILES["file"]["tmp_name"][$i]."<br/>";*/
        
        if (file_exists("upload/".$foldernm2."/" . $_FILES["file"]["name"][$i])){
        echo "檔案已經存在，請勿重覆上傳相同檔案";
        }
        else{
        move_uploaded_file($_FILES["file"]["tmp_name"][$i],"upload/".$foldernm2."/".$_FILES["file"]["name"][$i]);
        $name=$_FILES["file"]["name"][$i];
        $tmp=$_FILES["file"]["tmp_name"][$i];


        $sql= "SELECT folder_id FROM folder WHERE name = $foldernm2";
        $stmt = $db->query($sql); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $folder_id= $row['folder_id'];

        
        
        $input = array(':name' => $name,':tmp' =>$tmp,':folder_id'=>$folder_id);
        $sql = "INSERT INTO test2 (name,path,folder_id) VALUES(:name,:tmp,:folder_id)";
        $sth = $db->prepare($sql);
        $sth->execute($input);
        
        //echo "成功新增<br/>";
            }
        }
    }

    $foldernm2 = $_POST['foldernm2'];
$FileDir="upload/".$foldernm2."/";
$FileNum=count(glob("$FileDir/*.*"));
$result = glob($FileDir."*");
// echo $FileNum;

for ($i = 0; $i < $FileNum; $i++) {

//echo $result[$i]."<br/>";?>
<img src="<?php echo $result[$i]; ?>" height="600" width="800" style="display:block; margin:auto;"></img>
<?php
echo "<br/>";
echo "<br/>";
   
}


}
 ?>
        
