<?php
    require_once 'config.php';

// insert , updates , delete -> su dung function
function execute($sql){
    // tạo connection tới database

    $conn = mysqli_connect(HOST , USERNAME , PASSWORD , DATABASE);

    //query
    mysqli_query($conn , $sql);


    //Đóng connection
    mysqli_close($conn);
}

// dùng để select ==> trả về kết quả
function executeResult($sql){
    // tạo connection tới database

    $conn = mysqli_connect(HOST , USERNAME , PASSWORD , DATABASE);

    //query
     $resultSet = mysqli_query($conn , $sql);
     $list = [];
    while($row = mysqli_fetch_array($resultSet,1)){
     $list[] = $row ;
    }

    //Đóng connection
    mysqli_close($conn);
    return $list ;
}
?>