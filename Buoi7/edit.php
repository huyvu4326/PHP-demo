<?php
    include("connect.php");
    $id = '';
    $hoVaTen = '';
    $khoa = '';
    $ngaySinh = '';
    $lopId = '';

    $errHoVaTen = '';
    $errKhoa = '';
    $errNgaySinh = '';
    $errLopId = '';

    $isCheck = true;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id;
        if($id){
            try {
                $sql = "SELECT * FROM sinhvien WHERE id = $id";
                $result = $connect -> query($sql);
            if($result){
                $sinhVien = $result -> fetch(PDO::FETCH_ASSOC);
                if($sinhVien){
                    // echo ("<pre>");
                    // print_r($sinhVien);
                    $id = $sinhVien["id"];
                    $hoVaTen = $sinhVien["hoVaTen"];
                    $khoa = $sinhVien["khoa"];
                    $ngaySinh = $sinhVien["ngaySinh"];
                    $lopId = $sinhVien["lopId"];

                }else{
                    echo "Không tìm thấy sinh viên";
                    die();
            }
            }
            } catch (\Throwable $th) {
                echo "Không tìm thấy sinh viên";
                die();
            }
            
        }
    }
    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $hoVaTen = trim($_POST["hoVaTen"]);
        $khoa = trim($_POST["khoa"]);
        $ngaySinh = $_POST["ngaySinh"];
        $lopId = $_POST["lopId"];
        // var_dump($ngaySinh)
        // print_r([$id, $hoVaTen, $khoa, $ngaySinh, $lopId]);
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
            $sql = "UPDATE sinhvien SET hoVaTen = '$hoVaTen', khoa = '$khoa', ngaySinh = '$ngaySinh', lopId = '$lopId' WHERE id = $id ";
            $result = $connect -> query($sql);
            if($result){
                echo ("Cập nhật sản phẩm thành công");
                header('Location: index.php');
            }else{
                echo ("Thất bại");
            }
        }
    }

    $sql = "SELECT * FROM lop";
    $result = $connect -> query($sql);
    $option = '';
    if($result){
        $listLop = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listLop){
            foreach($listLop as $item){
                $option .= '<option '.($item["id"] == $lopId ? "selected":"").' 
                value="'.$item["id"].'">'.$item["tenLop"].'</option>';
            }
        }
    }
?>

<form action="edit.php" method="post">
    <input type="hidden" name="id" id="" value="<?= $id;?>">

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