<?php
    include("connect.php");
    $tenLop = '';

    $errTenlop = '';

    $isCheck = true;

    $sql = "SELECT * FROM lop";
    $result = $connect -> query($sql);
    if($result){
        $listLop = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listLop){
            echo "<pre>";
            // print_r($listLop);
        }
    }

    if(isset($_POST["submit"])){
        $tenLop  = $_POST["tenLop"];
        // print_r([$hoVaTen, $khoa, $ngaySinh, $lopId]);
        //Kiểm tra dữ liệu
        if(empty($tenLop)){
            $errTenLop = "Vui lòng nhập tên lớp";
            $isCheck = false;
        }
        // echo $tenLop;
        // die();
        if($isCheck){
            $sqlLop = "INSERT INTO lop(tenLop)
                    VALUES ('$tenLop')";
            $resultLop = $connect -> query($sqlLop);
            if($resultLop){
                echo ("Thêm sản phẩm thành công");
                header('Location: index.php');
            }else{
                echo ("Thất bại");
            }
        }
    }

?>
<form action="addLop.php" method="post">
    <label for="">Lớp</label>
    <input type="text" name="tenLop" id="" value ="<?= $tenLop?>"><br>
    <span style="color:red"><?= $errTenlop ?></span><br>

    <input type="submit" name="submit" value="Gửi" id="">

</form>