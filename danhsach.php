<?php
    require_once 'connect.php';
    $conn=mysqli_connect('localhost','root','','qlthongtin_nguyenminhthu');
    $sql = "select * from tbl_diem";
    $result = mysqli_query($conn,$sql);
    
    if(($_SERVER['REQUEST_METHOD']=="POST") and isset($_POST['search'])){
        $error=array();
        $timkiem= $_POST['txttimkiem'];
        
        $sql= "SELECT * from tbl_diem where TenSV LIKE '%$timkiem%' ";
        $result= mysqli_query($conn,$sql);
            
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <style>
        table{
            border:1px solid black;
        }
        td{
            border:1px solid black;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<form action="" method="POST">    
    <div class="card-header">
        <br>
        <h2 align ="center" >DANH SÁCH SINH VIÊN</h2>
        <br>

        <input type="text" name="txttimkiem" required >
        <button name="search" class="btn btn-success">Tìm Kiếm</button>
        <a class="btn btn-info" href='danhsach.php'>Quay lại</a> <br>
        <span> <?php if(isset($error['chon'])) echo $error['chon']; ?> </span> <br>

    </div>
    <div>
        <table class = "table">
            <thead class="thead-dark">
                <tr>
                    <td>Mã SV</td>
                    <td>Tên SV</td>
                    <td>Ngày sinh</td>
                    <td>Điểm chuyên cần</td>
                    <td>Điểm giữa kỳ</td>
                    <td>Điểm cuối kỳ</td>
                    <td>Điểm trung bình</td>
                    <td>Thao tác</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=mysqli_fetch_assoc($result)){
                    $dtb=0.1*$row['DiemChuyenCan']+0.2*$row['DiemGiuaKy']+0.7*$row['DiemCuoiKy'];
                    $DiemTrungBinh =round($dtb,2 ) ; 
                ?>
                        <tr>
                            <td> <?php echo $row['MaSV']; ?> </td>
                            <td> <?php echo $row['TenSV']; ?> </td>
                            <td> <?php echo $row['NgaySinh']; ?> </td>
                            <td> <?php echo $row['DiemChuyenCan']; ?> </td>
                            <td> <?php echo $row['DiemGiuaKy']; ?> </td>
                            <td> <?php echo $row['DiemCuoiKy']; ?> </td>
                            <td> <?php echo $DiemTrungBinh ?> </td>
                            <td>
                                <a style="text-decoration:none" href="sua.php?MaSV=<?php echo $row['MaSV']; ?> ">Sửa</a>
                                <a style="text-decoration:none" onclick="return del('<?php echo $row['TenSV']; ?>')" href="xoa.php?MaSV=<?php echo $row['MaSV']; ?>">Xóa</a>
                            </td>
                        </tr>
                <?php } ?>
                
            </tbody>
        </table>
    </div>
    <div>
        <a class ="btn btn-success" href="them.php">Thêm</a>
    </div>
    <script>
        function del(name){
            return confirm("Bạn có muốn xóa "+name+"?");
        }
    </script>
</form>
</body>
</html>
