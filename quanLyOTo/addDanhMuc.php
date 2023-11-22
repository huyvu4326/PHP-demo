<?php
    include("connect.php");
    $tenHangXe = '';

    $errTenHangXe = '';

    $isCheck = true;

    $sql = "SELECT * FROM danhmuc";
    $result = $connect -> query($sql);
    if($result){
        $listDanhMuc = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listDanhMuc){
            echo "<pre>";
            // print_r($listDanhMuc);
        }
    }
    if(isset($_POST["submit"])){
        $tenHangXe  = $_POST["tenHangXe"];
        // print_r([$hoVaTen, $khoa, $ngaySinh, $lopId]);
        //Kiểm tra dữ liệu
        if(empty($tenHangXe)){
            $errTenHangXe = "Vui lòng nhập tên hãng xe";
            $isCheck = false;
        }
        // echo $tenHangXe;
        // die();
        if($isCheck){
            $sqlDanhMuc = "INSERT INTO danhmuc(tenHangXe)
                    VALUES ('$tenHangXe')";
            $resultDanhMuc = $connect -> query($sqlDanhMuc);
            if($resultDanhMuc){
                echo ("Thêm sản phẩm thành công");
                header('Location: index.php');
            }else{
                echo ("Thất bại");
            }
        }
    }

?>
<form action="addDanhMuc.php" method="post">
    <label for="">Hãng xe</label>
    <input type="text" name="tenHangXe" id="" value ="<?= $tenHangXe?>"><br>
    <span style="color:red"><?= $errTenHangXe ?></span><br>

    <input type="submit" name="submit" value="Gửi" id="">

</form>