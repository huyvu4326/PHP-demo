<?php
    include("connect.php");

    $tenNhanVien = "";
    $hinhAnh = "";
    $maNhanVien = "";
    $phongBanId = "";
    $mail = "";
    $soDienThoai = "";

    $sql = "SELECT * FROM nhanvien";
    $result = $connect -> query($sql);
    if($result){
        $listNhanVien = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listNhanVien){
            // echo "<pre>";
            // print_r($listFlight);
        }
    }

    
    if(isset($_POST['submit'])){
        $tenNhanVien = ($_POST["tenNhanVien"]);
        $hinhAnh = ($_POST["hinhAnh"]);
        $maNhanVien = ($_POST["maNhanVien"]);
        $phongBanId = ($_POST["phongBanId"]);
        $mail = ($_POST["mail"]);
        $soDienThoai = ($_POST["soDienThoai"]);
            $sql = "INSERT INTO nhanvien(tenNhanVien, hinhAnh, maNhanVien, phongBanId, mail, soDienThoai) VALUES ('$tenNhanVien', '$hinhAnh', '$maNhanVien', '$phongBanId', '$mail', '$soDienThoai')";
            $result = $connect -> query($sql);
            if($result){
                header('Location: index.php');
            }else{
                echo "error";
            }
    }
    $sql = "SELECT * FROM phongban";
    $option = '';
    $result = $connect -> query($sql);
    if($result){
        $listPhongBan = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listPhongBan){
            foreach ($listPhongBan as $value){
                $option .= '<option ' . ($value["id"] == $phongBanId ? "selected" : "") . ' 
                        value="' . $value["id"] . '">' . $value["tenPhongBan"] . '</option>';
            }
        }
    }
   


?>

<form action="add.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="tenNhanVien">Tên nhân viên</label>
        <input type="text" name="tenNhanVien" id="tenNhanVien" value="<?= $tenNhanVien?>">
    </div>
    <div>
        <label for="hinhAnh">Hình ảnh</label>
        <input type="file" name="hinhAnh" id="hinhAnh" value="<?= $hinhAnh?>">
    </div>
    <div>
        <label for="maNhanVien">Mã nhân viên</label>
        <input type="text" name="maNhanVien" id="maNhanVien" value="<?= $maNhanVien?>">
    </div>
    <div>
        <label for="phongBanId">Phòng ban</label>
        <select name="phongBanId" id="phongBanId">
            <?= $option; ?>
        </select>
    </div>
    <div>
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail" value="<?= $mail?>">
    </div>
    <div>
        <label for="soDienThoai">Số điện thoại</label>
        <input type="number" name="soDienThoai" id="soDienThoai" value="<?= $soDienThoai?>">
    </div>
    <div>
        <button type="submit" name="submit">Add</button>
    </div>
</form>