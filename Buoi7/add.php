<?php
    include("connect.php");
    $hoVaTen = '';
    $khoa = '';
    $ngaySinh = '';
    $lopId = '';

    $errHoVaTen = '';
    $errKhoa = '';
    $errNgaySinh = '';
    $errLopId = '';

    $isCheck = true;

    $sql = "SELECT * FROM sinhvien";
    $result = $connect -> query($sql);
    if($result){
        $listSinhVien = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listSinhVien){
            echo "<pre>";
            // print_r($listSinhVien);
        }
    }
    $sql = "SELECT * FROM lop";
    $option = "";
    $result = $connect -> query($sql);
    if($result){
        $listLop = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listLop){
            foreach($listLop as $item){
                $option .= '<option '.($item["id"] == $lopId ? "selected":"").' 
                value="'.$item["id"].'">'.$item["tenLop"].'</option>';
            }
        }
    }

    if(isset($_POST["submit"])){
        $hoVaTen = trim($_POST["hoVaTen"]);
        $khoa = trim($_POST["khoa"]);
        $ngaySinh = $_POST["ngaySinh"];
        $lopId = $_POST["lopId"];
        // print_r([$hoVaTen, $khoa, $ngaySinh, $lopId]);
        //Kiểm tra dữ liệu
        if(empty($hoVaTen)){
            $errHoVaTen = "Vui lòng nhập họ và tên";
            $isCheck = false;
        }
        if(empty($khoa)){
            $errKhoa = "Vui lòng nhập khoa";
            $isCheck = false;
        }
        if(empty($ngaySinh)){
            $errNgaySinh = "Vui lòng nhập ngày sinh";
            $isCheck = false;
        }
        if($isCheck){
            $sql = "INSERT INTO sinhvien(hoVaTen, khoa, ngaySinh, lopId)
                    VALUES ('$hoVaTen', '$khoa', '$ngaySinh', '$lopId')";

            $result = $connect -> query($sql);
            if($result){
                echo ("Thêm sản phẩm thành công");
                header('Location: index.php');
            }else{
                echo ("Thất bại");
            }
        }
    }

?>

<form action="add.php" method="post">
    <label for="">Họ và tên</label>
    <input type="text" name="hoVaTen" id="" value ="<?= $hoVaTen?>"><br>
    <span style="color:red"><?= $errHoVaTen ?></span><br>

    <label for="">Khoa</label>
    <input type="text" name="khoa" id="" value ="<?= $khoa?>"><br>
    <span style="color:red"><?= $errKhoa ?></span><br>

    <label for="">Ngày sinh</label>
    <input type="date" name="ngaySinh" id="" value ="<?= $ngaySinh?>"><br>
    <span style="color:red"><?= $errNgaySinh ?></span><br>
    
    <select name="lopId" id="">
             <?= $option; ?>
    </select><br>
    <input type="submit" name="submit" value="Gửi" id="">

</form>