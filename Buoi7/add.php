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
        $hoVaTen = trim($_POST["hoVaTen"]);
        $khoa = trim($_POST["khoa"]);
        $ngaySinh = $_POST["ngaySinh"];
        $lopId = $_POST["lopId"];
        // print_r([$hoVaTen, $khoa, $ngaySinh, $lopId]);

        //Kiểm tra dữ liệu
        if(empty($hoVaTen)){
            $errHoVaTen = "Vui lòng nhập họ và tên";
        }
        if(empty($khoa)){
            $errKhoa = "Vui lòng nhập khoa";
        }
        if(empty($ngaySinh)){
            $errNgaySinh = "Vui lòng nhập ngày sinh";
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
        <?php
            foreach ($listLop as $lop) {
                $selected = ($lop["id"] == $lopId) ? "selected" : "";
                echo "<option value='{$lop["id"]}' $selected>{$lop["tenLop"]}</option>";
            }
        ?>
    </select><br>
    <input type="submit" name="submit" value="Gửi" id="">

</form>