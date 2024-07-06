<?php
    include 'connect.php';
    $MaSV= $_GET['MaSV'];
    $sql="DELETE from tbl_diem where MaSV='$MaSV'";
    
    $result= mysqli_query($conn,$sql);
    if($result){
        echo"
        <script> alert('Xóa thành công!');
        </script>";
        header('location:danhsach.php');
    }
        
?>