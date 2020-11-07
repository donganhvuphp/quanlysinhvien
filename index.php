<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
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
        <div class="row" style="padding : 20px;">
            <h1 style="margin: 0px auto;">Quản lý sinh viên</h1>
        </div>
        <div class="row">
            <nav class="navbar navbar-expand-sm bg-light navbar-dark" style="box-shadow: 0 1px 6px 0;border-radius : 10px ; margin : 0px auto 40px;">
                <form class="form-inline" action="" method="get">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
                    <button class="btn btn-success" type="submit" >Search</button>                    
                </form>
                <button class="btn btn-primary" style="margin-left: 30px;" onclick="window.open('input.php', '_self')">Add Student</button>
            </nav>
        </div>
        <div class="row">
            <table class="table" style="box-shadow: 0 1px 6px 0 grey;border-radius : 10px ; text-align: center;">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ & Tên</th>
                        <th scope="col">Tuổi</th>
                        <th scope="col">Địa chỉ</th>
                        <th colspan="2" width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'dbhelp.php';
                    if(isset($_GET['search'])  && $_GET['search'] != '' ){
                        $sql = 'select * from student where fullName like "%'.$_GET['search'].'%"';
                    }
                    else{
                        $sql = 'select * from student';
                    }
                    
                    $studentList = executeResult($sql);
                    $index = 1;
                    foreach ($studentList as $std) {
                    ?>
                        <!-- echo '<tr>
                            <td>'.$std['id'].'</td>
                            <td>'.$std['fullName'].'</td>
                            <td>'.$std['age'].'</td>
                            <td>'.$std['address'].'</td>
                            <td><button class="btn btn-danger">Edit</button></td>
                            <td><button class="btn btn-warning">Delete</button></td>
                            </tr>' ; -->
                        <tr>
                            <td><?php echo $index++; ?></td>
                            <td><?php echo $std['fullName']; ?></td>
                            <td><?php echo $std['age']; ?></td>
                            <td><?php echo $std['address']; ?></td>
                            <td><button class="btn btn-danger" style="width: 80px;" onclick="window.open('input.php?id=<?php echo $std['id']; ?>' , '_self')">Edit</button></td>
                            <td><button class="btn btn-warning" style="width: 80px;" onclick="deleteStudent(<?php echo $std['id'];?>)">Deletes</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>            
        </div>
    </div>
    <script>
        function deleteStudent(id){
            //alert(id);
               $option = confirm("Bạn có muốn xóa sinh viên này không ?");
               if(!$option){
                    return;
               }
                $.post('delete_student.php',{'id': id},function(data){
                        alert(data);
                        location.reload();
                });
        }
    </script>
</body>

</html>