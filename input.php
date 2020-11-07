<?php
    require_once 'dbhelp.php';
    $s_fullName = $s_age = $s_address = $s_id = '';
    if(!empty($_POST)){        
       
        if(isset($_POST['fullName'])){
            $s_fullName = $_POST['fullName'];
        }
        if(isset($_POST['age'])){
            $s_age = $_POST['age'];
        }
        if(isset($_POST['address'])){
            $s_address = $_POST['address'];
        }
        if(isset($_POST['id'])){
            $s_id = $_POST['id'];
        }

        
        $s_fullName = str_replace('\'', '\\\'' , $s_fullName);
        $s_age      = str_replace('\'', '\\\'' , $s_age);
        $s_address  = str_replace('\'', '\\\'' , $s_address);
        $s_id       = str_replace('\'', '\\\'' , $s_id);

        if($s_id != ''){
            $sql = "update student set fullName = '$s_fullName' , age = '$s_age' , address = '$s_address' where id = ".$s_id;
        }
        else{
            $sql = "insert into student(fullName , age , address) values ('$s_fullName','$s_age','$s_address')";
        }        
        execute($sql);
        header('Location: index.php');
        die();
    }

    $id = '';
    if(isset($_GET['id'])){

        $id          = $_GET['id'];
        $sql         = 'select * from student where id = '.$id;
        $studentList = executeResult($sql);
        if($studentList != null && count($studentList) > 0){
            // echo "<pre>";
            // print_r($studentList);
            // echo "</pre>";
            $std        = $studentList[0] ;
            $id         = $std['id'] ;
            $s_fullName = $std['fullName'];
            $s_age      = $std['age'];
            $s_address  = $std['address'];
        }
        else{
            $id = '';
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng Ký Sinh Viên</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="text-center" style="padding: 20px;">Đăng Ký Sinh Viên</h2>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="fullName">Họ và tên</label>
                                <input type="text" name="id" id="id" value="<?=$id?>" style="display: none;">
                                <input type="text" class="form-control" placeholder="Nhập họ và tên" id="fullName" name="fullName" value="<?=$s_fullName?>">
                            </div>
                            <div class="form-group">
                                <label for="age">Tuổi</label>
                                <input type="text" class="form-control" placeholder="Nhập tuổi" id="age" name="age" value="<?=$s_age?>">
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" id="address" name="address" value="<?=$s_address?>">
                                </div>
                                <button type="submit" style="width: 80px;" class="btn btn-success">OK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</body>

</html>