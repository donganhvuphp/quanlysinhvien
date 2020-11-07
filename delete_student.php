<?php

    if(isset($_POST['id'])){
        $id = $_POST['id'];

        //gọi file dbhelp
        require_once 'dbhelp.php';
        $sql = "delete from student where id =".$id;
        execute($sql);
    }
?>