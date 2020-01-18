<?php session_start(); ?>
<?php

$host="127.0.0.1";
$user="root";
$pasd="";
$database="todo";
$db = mysqli_connect($host,$user,$pasd,$database);

mysqli_query($db,'set names utf8');



    if(isset($_POST['submit'])){
    $task=$_POST['task'];

    mysqli_query($db,"INSERT INTO tasks (task) VALUES ('$task')");
    
    }

    if(isset($_GET['del_task'])){
        $id=$_GET['del_task'];
        mysqli_query($db,"DELETE FROM tasks WHERE id=$id");
        
    }

    $tasks=mysqli_query($db,"SELECT * FROM tasks");

    /*if(isset($_SESSION))
    {
        $_SESSION['auth']='5';
    }
    else 
    {
        echo "此帳號無權限";
    }*/
?>
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8" >
       
        <title>To Do List</title>
        
        <link href="style.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <div class="heading">
            <h2>To Do List</h2>
        </div>  
            
            <form  action="todolist.php" method="post">
                <input type="text" class="task_input"  name="task" placeholder="輸入待辦事項" required>
                <button type="submit" class="add_btn" name="submit">新增</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>待辦事項</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                
                    <?php  $i=1; while ($row = mysqli_fetch_array($tasks)){ ?>
                    <tr>
                    
                        <td class="task"><?php echo $row['task'];?></td>
                        <td class="delete">
                            <a href="todolist.php?del_task=<?php echo $row['id'];?>">x </a>
                            
                            <a href="#">編輯</a>
                        </td>
                        
                        
                    </tr>
                    <?php $i++;  } ?> 
                </tbody>
            </table>
        <?php if(isset($_SESSION['auth'])==3)
        {
            ?>
            

            <a href="register.php">註冊帳號</a>

            </div>
        <?php
        } 
        else{
            ?>
            <a href="">註冊帳號</a></div>
        
        <?php
        }
        ?>
    
    </body>
</html>