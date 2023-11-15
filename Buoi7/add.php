<?php
    include("connect.php");

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
        $hoVaTen = $_POST["hoVaTen"];
        $khoa = $_POST["khoa"];
        $ngaySinh = $_POST["ngaySinh"];
        $lopId = $_POST["lopId"];
        print_r([$hoVaTen, $khoa, $ngaySinh, $lopId]);
    }

?>

<form action="add.php" method="post">
    <label for="">Họ và tên</label>
    <input type="text" name="hoVaTen" id=""><br>
    <span style="coler:red"><?= $errHoVaTen ?></span><br>

    <label for="">Khoa</label>
    <input type="text" name="khoa" id=""><br>
    <span style="coler:red"><?= $errKhoa ?></span><br>

    <label for="">Ngày sinh</label>
    <input type="date" name="ngaySinh" id=""><br>
    <span style="coler:red"><?= $errNgaySinh ?></span><br>
    
    <select name="lopId" id="">
        <?php
            foreach ($listLop as $lop) {
                echo "<option value='{$lop["id"]}'>{$lop["tenLop"]}</option>";
            }
        ?>
    </select><br>
    <input type="submit" name="submit" value="Gửi" id="">

</form>