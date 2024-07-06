<?php
    $conn=mysqli_connect('localhost','root','','qldiem_lehoangdieu');
    if($conn){
        mysqli_query($conn,"set names 'utf8'");
    }
    else{
        die("ket noi that bai" . mysqli_connect_error());
    }
?>