<?php
    include("connect.php");
    $id = "";
    $tenNhanVien = "";
    $hinhAnh = "";
    $maNhanVien = "";
    $phongBanId = "";
    $mail = "";
    $soDienThoai = "";

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($id){
            // try {
                $sql = "SELECT * FROM nhanvien WHERE id = $id";
                $result = $connect -> query($sql);
                if($result){
                    $listNhanVien = $result -> fetch(PDO::FETCH_ASSOC);
                    if($listNhanVien){
                        // print_r ($listNhanVien);
                        $id = $listNhanVien["id"];
                        $tenNhanVien = $listNhanVien["tenNhanVien"];
                        $hinhAnh = $listNhanVien["hinhAnh"];
                        $maNhanVien = $listNhanVien["maNhanVien"];
                        $phongBanId = $listNhanVien["phongBanId"];
                        $mail = $listNhanVien["mail"];
                        $soDienThoai = $listNhanVien["soDienThoai"];
                       
                    }else{
                        echo "Không tìm thấy nhân viên";
                        die();
                    }
                }
            // } catch (\Throwable $th) {
            //     echo "Không tìm thấy nhân viên 1";
            //     die();
            // }
        }
    }

    if(isset($_POST['submit'])){
        $id = ($_POST["id"]);
        $tenNhanVien = ($_POST["tenNhanVien"]);
        $hinhAnh = ($_POST["hinhAnh"]);
        $maNhanVien = ($_POST["maNhanVien"]);
        $phongBanId = ($_POST["phongBanId"]);
        $mail = ($_POST["mail"]);
        $soDienThoai = ($_POST["soDienThoai"]);
            $sql = "UPDATE nhanvien SET tenNhanVien = '$tenNhanVien', hinhAnh = '$hinhAnh', maNhanVien = '$maNhanVien', phongBanId = '$phongBanId', mail = '$mail', soDienThoai = '$soDienThoai' WHERE id = $id";
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
        $listDanhMuc = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listDanhMuc){
            foreach ($listDanhMuc as $value){
                $option .= '<option ' . ($value["id"] == $phongBanId ? "selected" : "") . ' value="' . $value["id"] . '">' . $value["tenPhongBan"] . '</option>';
            }
        }
    }


?>

<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="" value = "<?= $id?>">
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
        <button type="submit" name="submit">Edit</button>
    </div>
</form>