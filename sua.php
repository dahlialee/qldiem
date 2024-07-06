<?php
    include 'connect.php';
    $MaSV=$_GET['MaSV'];
    $sql="SELECT * from tbl_diem where MaSV='$MaSV'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
        
    if( isset($_POST['edit'])){
        $TenSV= $_POST['txtTenSV'];
        $NgaySinh= $_POST['txtNgaySinh'];
        $DiemChuyenCan=$_POST['txtDCC'];
        $DiemGiuaKy=$_POST['txtDGK'];
        $DiemCuoiKy=$_POST['txtDCK'];

        if(empty($TenSV)||empty($NgaySinh)||empty($DiemChuyenCan)||empty($DiemGiuaKy)||empty($DiemCuoiKy)){
            $error= "bạn đang để trống";
        }
        else{
        $sql = " UPDATE tbl_diem set TenSV='$TenSV', NgaySinh='$NgaySinh', DiemChuyenCan= '$DiemChuyenCan',DiemGiuaKy= '$DiemGiuaKy',DiemCuoiKy= '$DiemCuoiKy'  where MaSV='$MaSV'";
        $result= mysqli_query($conn,$sql);
        if($result){
            echo "<script > alert('Cập nhật thành công!');
                window.location.href='danhsach.php';
            </script>";
        }
        else {
            echo "insert error ". mysqli_error($conn);
        }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="card-header">
        <h2>Cập nhật thông tin sinh viên</h2>
        <a class="btn btn-primary" href='danhsach.php'>Danh sách</a>
    </div>
    <div class= "card-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Mã SV</label>
                <input type="text" name="txtMaSV" class="form-control" value="<?php echo $row['MaSV']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Tên SV</label>
                <input type="text" name="txtTenSV" class="form-control" value="<?php echo $row['TenSV']; ?>" required>
            </div>
            <div class="form-group">
                <label for="">Ngày Sinh</label>
                <input type="date" name="txtNgaySinh" class="form-control" value="<?php echo date('Y-m-d',strtotime( $row['NgaySinh'])) ?>" required>
            </div>
            <div class="diem">
                <label for="txtDCC">Điểm chuyên cần</label>
                <input id="txtDCC" type="number" name="txtDCC" value="<?php echo $row['DiemChuyenCan']; ?>" step="0.5" min="0" max="10" required /><span class="validity"></span> 
            </div>
            <div class="diem">
                <label for="txtDGK">Điểm giữa kỳ</label>
                <input id="txtDGK" type="number" name="txtDGK" value="<?php echo $row['DiemGiuaKy']; ?>" step="0.5" min="0" max="10" required /><span class="validity"></span> 
            </div><div class="diem">
                <label for="txtDCK">Điểm cuối kỳ</label>
                <input id="txtDCK" type="number" name="txtDCK" value="<?php echo $row['DiemCuoiKy']; ?>" step="0.5" min="0" max="10" required /><span class="validity"></span> 
            </div>
            
            <button name="edit" class="btn btn-success">Lưu</button>                    

        </form>
    </div>
    
  
    </body>
</html>
