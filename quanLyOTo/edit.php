<?php
include("connect.php");

$id = "";
$tenLoaiXe = "";
$xuatXu = "";
$idDanhMuc = "";
$mauSac = "";
$hinhAnh = "";

$errTenLoaiXe = "";
$errXuatXu = "";
$errIdDanhMuc = "";
$errMauSac = "";
$errHinhAnh = "";

$isCheck = true;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if ($id) {
        try {
            $sql = "SELECT * FROM xe WHERE id = $id";
            $result = $connect->query($sql);
            if ($result) {
                $listXe = $result->fetch(PDO::FETCH_ASSOC);
                if ($listXe) {
                    $id = $listXe["id"];
                    $tenLoaiXe = $listXe["tenLoaiXe"];
                    $xuatXu = $listXe["xuatXu"];
                    $idDanhMuc = $listXe["idDanhMuc"];
                    $mauSac = $listXe["mauSac"];
                    $hinhAnh = $listXe["hinhAnh"];
                } else {
                    echo "Không tìm thấy xe";
                    die();
                }
            }
        } catch (\Throwable $th) {
            echo "Không tìm thấy xe";
            die();
        }
    }
}

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $tenLoaiXe = trim($_POST["tenLoaiXe"]);
    $xuatXu = trim($_POST["xuatXu"]);
    $idDanhMuc = $_POST["idDanhMuc"];
    $mauSac = trim($_POST["mauSac"]);
    
    // File upload handling
    if ($_FILES['hinhAnh']['error'] == 0) {
        $hinhAnh = $_FILES['hinhAnh']['name'];
        $target = "uploads/" . basename($hinhAnh);
        move_uploaded_file($_FILES['hinhAnh']['tmp_name'], $target);
    }

    if (empty($tenLoaiXe)) {
        $errTenLoaiXe = "Vui lòng nhập tên xe";
        $isCheck = false;
    }
    if (empty($xuatXu)) {
        $errXuatXu = "Vui lòng nhập xuất xứ xe";
        $isCheck = false;
    }

    if ($isCheck) {
        // Update the "xe" table
        $sql = "UPDATE xe SET tenLoaiXe = '$tenLoaiXe', xuatXu = '$xuatXu', idDanhMuc = '$idDanhMuc', mauSac = '$mauSac', hinhAnh = '$hinhAnh' WHERE id = $id";
        
        // Execute the SQL query
        $result = $connect->query($sql);

        // Check for success
        if ($result) {
            echo "Cập nhật sản phẩm thành công";
            header('Location: index.php');
        } else {
            echo "Thất bại";
        }
    }
}

// Fetch danh muc options
$sql = "SELECT * FROM danhmuc";
$option = "";
$result = $connect->query($sql);
if ($result) {
    $listDanhMuc = $result->fetchAll(PDO::FETCH_ASSOC);
    if ($listDanhMuc) {
        foreach ($listDanhMuc as $item) {
            $option .= '<option ' . ($item["id"] == $idDanhMuc ? "selected" : "") . ' value="' . $item["id"] . '">' . $item["tenHangXe"] . '</option>';
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
    <form action="edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <div>
            <label for="tenLoaiXe">Tên loại xe</label>
            <input type="text" name="tenLoaiXe" id="tenLoaiXe" value="<?= $tenLoaiXe ?>">
            <span style="color: red"><?= $errTenLoaiXe ?></span>
        </div>
        <div>
            <label for="xuatXu">Xuất xứ</label>
            <input type="text" name="xuatXu" id="xuatXu" value="<?= $xuatXu ?>">
            <span style="color: red"><?= $errXuatXu ?></span>
        </div>
        <div>
            <label for="idDanhMuc">Danh mục</label>
            <select name="idDanhMuc" id="idDanhMuc">
                <?= $option ?>
            </select>
            <span style="color: red"><?= $errIdDanhMuc ?></span>
        </div>
        <div>
            <label for="mauSac">Màu sắc</label>
            <input type="color" name="mauSac" id="mauSac" value="<?= $mauSac ?>">
            <span style="color: red"><?= $errMauSac ?></span>
        </div>
        <div>
            <label for="hinhAnh">Hình ảnh</label>
            <input type="file" name="hinhAnh" id="hinhAnh">
            <span style="color: red"><?= $errHinhAnh ?></span>
        </div>
        <div>
            <button type="submit" name="submit">Cập nhật</button>
        </div>
    </form>
</body>

</html>