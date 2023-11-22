<?php
include("connect.php");

$tenLoaiXe = "";
$xuatXu = "";
$idDanhMuc = "";
$mauSac = "";
$errTenLoaiXe = "";
$errXuatXu = "";
$errIdDanhMuc = "";
$errMauSac = "";
$errHinhAnh = "";
$hinhAnh = "";
$isCheck = true;

$sql = "SELECT * FROM xe";
$result = $connect->query($sql);
if ($result) {
    $listXe = $result->fetchAll(PDO::FETCH_ASSOC);
    if ($listXe) {
        // echo "<pre>";
    }
}

$sql = "SELECT * FROM danhmuc";
$option = "";
$result = $connect->query($sql);
if ($result) {
    $listDanhMuc = $result->fetchAll(PDO::FETCH_ASSOC);
    if ($listDanhMuc) {
        foreach ($listDanhMuc as $item) {
            $option .= '<option ' . ($item["id"] == $idDanhMuc ? "selected" : "") . ' 
            value="' . $item["id"] . '">' . $item["tenHangXe"] . '</option>';
        }
    }
}

if (isset($_POST["submit"])) {
    $tenLoaiXe = trim($_POST["tenLoaiXe"]);
    $xuatXu = trim($_POST["xuatXu"]);
    $idDanhMuc = ($_POST["idDanhMuc"]);
    $mauSac = ($_POST["mauSac"]);
    $hinhAnh = $_FILES["hinhAnh"];
    
    if (empty($tenLoaiXe)) {
        $errTenLoaiXe = "Vui lòng nhập tên xe";
        $isCheck = false;
    }
    if (empty($xuatXu)) {
        $errXuatXu = "Vui lòng nhập xuất xứ xe";
        $isCheck = false;
    }
    if (empty($mauSac)) {
        $errMauSac = "Vui lòng chọn màu sắc";
        $isCheck = false;
    }
    if (empty($hinhAnh["name"])) {
        $errHinhAnh = "Vui lòng chọn ảnh";
        $isCheck = false;
    }

    if ($isCheck) {
        $fileName = time() . '_' . uniqid('', true) . '.' . pathinfo($hinhAnh["name"], PATHINFO_EXTENSION);
        $dir = "uploads/" . $fileName;

        if (move_uploaded_file($hinhAnh["tmp_name"], $dir)) {
            $sql = "INSERT INTO xe (tenLoaiXe, xuatXu, idDanhMuc, mauSac, hinhAnh)
                    VALUES ('$tenLoaiXe', '$xuatXu', '$idDanhMuc', '$mauSac', '$fileName')";
            $result = $connect->query($sql);
            if ($result) {
                echo ("Thêm sản phẩm thành công");
                header('Location: index.php');
            } else {
                echo ("Thất bại");
            }
        } else {
            echo "Lỗi khi tải lên tập tin";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="tenLoaiXe">Tên loại xe</label>
            <input type="text" name="tenLoaiXe" id="tenLoaiXe" value="<?= $tenLoaiXe?>">
            <span style="color: red"><?= $errTenLoaiXe?></span>
        </div>
        <div>
            <label for="xuatXu">Xuất xứ</label>
            <input type="text" name="xuatXu" id="xuatXu" value="<?= $xuatXu?>">
            <span style="color: red"><?= $errXuatXu?></span>
        </div>
        <div>
            <label for="idDanhMuc">Danh mục</label>
            <select name="idDanhMuc" id="idDanhMuc">
                <?= $option?>
            </select>
            <span style="color: red"><?= $errIdDanhMuc?></span>
        </div>
        <div>
            <label for="mauSac">Màu sắc</label>
            <input type="color" name="mauSac" id="mauSac" value="<?= $mauSac?>">
            <span style="color: red"><?= $errMauSac?></span>
        </div>
        <div>
            <label for="hinhAnh">Hình ảnh</label>
            <input type="file" name="hinhAnh" id="hinhAnh" value="<?= $hinhAnh?>">
            <span style="color: red"><?= $errHinhAnh?></span>
        </div>
        <div>
            <button type="submit" name="submit">Thêm xe</button>
        </div>
    </form>
</body>
</html>
