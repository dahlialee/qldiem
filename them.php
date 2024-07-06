<?php
    include 'connect.php';
        if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['add'])){
            $MaSV=$_POST['txtMaSV'];
            $TenSV= $_POST['txtTenSV'];
            $NgaySinh= $_POST['txtNgaySinh'];
            $DiemChuyenCan=$_POST['txtDCC'];
            $DiemGiuaKy=$_POST['txtDGK']; 
            $DiemCuoiKy=$_POST['txtDCK'];
            
            $sql = "INSERT into tbl_diem values('$MaSV','$TenSV','$NgaySinh','$DiemChuyenCan','$DiemGiuaKy','$DiemCuoiKy')";
                $result= mysqli_query($conn,$sql);
                if($result){
                    echo "<script > alert('Thêm thành công!');
                    window.location.href='danhsach.php';
                    </script>";
                }
                else {
                    echo "insert error ". mysqli_error($conn);
                }
            }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thông tin điểm sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>
<body>
    <div class=" container-fluid" >
    <div class="form-group card">
        <div class="card-header">
            <h2>Thêm thông tin điểm sinh viên</h2>
        </div>
        <div class= "card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Mã SV</label>
                    <input type="text" name="txtMaSV" class="form-control" required>
                    <!--required:  hiện thông báo field ko đc để trống >>> dùng empty in $error-->
                </div>
                <div class="form-group">
                    <label for="">Tên SV</label>
                    <input type="text" name="txtTenSV" class="form-control" required>
                    <!--required:  hiện thông báo field ko đc để trống >>> dùng empty in $error-->
                </div>
                <div class="form-group">
                    <label for="">Ngày Sinh</label>
                    <input type="datetime-local" name="txtNgaySinh" class="form-control" required>
                    
                </div>
                <div class="diem">
                    <label for="txtDCC">Điểm chuyên cần</label>
                    <input id="txtDCC" type="number" name="txtDCC" step="0.5" min="0" max="10" required /><span class="validity"></span> 
                </div>
                <div class="diem">
                    <label for="txtDGK">Điểm giữa kỳ</label>
                    <input id="txtDGK" type="number" name="txtDGK" step="0.5" min="0" max="10" required /><span class="validity"></span> 
                </div><div class="diem">
                    <label for="txtDCK">Điểm cuối kỳ</label>
                    <input id="txtDCK" type="number" name="txtDCK" step="0.5" min="0" max="10" required /><span class="validity"></span> 
                </div>
                <div>
                    <button name="add" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>
  
</body>
</html>
