<?php
require 'connect/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="ckeditor/ckeditor.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="content">
    <form action="" method="post">
    <textarea name="editor" id="editor"> <?php echo !empty($_POST['editor'])?:''; 
    $id=1;
    $sth=$pdo->prepare("SELECT * from test where id = ?");
    $sth->execute([$id]);
    $str=$sth->fetchAll();
    // echo $str['content'];
    ?> </textarea>
    <input type="submit" value="送出">
    </form>

    <?php if(!empty($_POST['editor'])){?>
    <div class="output">
    <h1>送出內容:</h1>
    <?php echo $_POST['editor'];
    $id="";
    $sth=$pdo->prepare("INSERT INTO test (id,content)  VALUES (?,?)");
    $sth->execute([$id,$_POST['editor']]);
    ?>
    </div>
   <?php } ?>
    </div>
</body>
<!-- <script src="ckeditor/ckeditor.js"></script> -->
<script>
        CKEDITOR.replace("editor",{
            filebrowserUploadUrl:'ckeditor/ck_upload.php',
            filebrowserUploadMethod:'form',

        });
   </script>
</html>