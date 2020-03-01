<?php session_start(); ?>
<?php

$host="127.0.0.1";
$user="root";
$pasd="";
$database="todo";
$db = mysqli_connect($host,$user,$pasd,$database);

mysqli_query($db,'set names utf8');
$task="";
$update=false;
$id=0;



    if(isset($_POST['submit'])){
    $task=$_POST['task'];

    mysqli_query($db,"INSERT INTO tasks (task) VALUES ('$task')");
    
    }

    if(isset($_GET['del_task'])){
        $id=$_GET['del_task'];
        mysqli_query($db,"DELETE FROM tasks WHERE id=$id");
        
    }

    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        $result=mysqli_query($db,"SELECT * FROM tasks WHERE id=$id");
        if($result->num_rows){
            $row = $result->fetch_array();
            $task=$row['task'];
        }

    }

    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $task=$_POST['task'];
        mysqli_query($db,"UPDATE tasks SET task='$task' WHERE id=$id");
        //header('location : todolist.php');
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
            
            <form  action="todolist.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" class="task_input"  name="task" value="<?php echo $task; ?>" placeholder="輸入待辦事項" required>
                <?php if($update==true):
                ?>
                <button type="submit" class="add_btn" name="update">修改</button>
                <?php else: ?>
                <button type="submit" class="add_btn" name="submit">新增</button>
                <?php endif; ?>
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
                            
                            <a href="todolist.php?edit=<?php echo $row['id'];?>">編輯</a>
                        </td>
                        
                        
                    </tr>
                    <?php $i++;  } ?> 
                </tbody>
            </table>
        <?php /*if(isset($_SESSION['auth']))
        {
            if($_SESSION['auth']==3){
        
            ?>
            

            <a href="register.php">註冊帳號</a>

            </div>
        <?php
        } 
        
        else{
            ?>
            <a href="">註冊帳號</a><?php echo $_SESSION['auth'] ?></div>
        
        <?php
        }
    }*/
        ?>
    
    </body>
</html>