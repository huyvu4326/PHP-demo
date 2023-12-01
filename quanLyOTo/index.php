<?php
include("connect.php");
$sql = "SELECT xe.id, tenLoaiXe, xuatXu, danhmuc.tenHangXe as tenDanhMuc, mauSac, hinhAnh
        FROM xe INNER JOIN danhmuc ON xe.idDanhMuc = danhmuc.id";
$result = $connect->query($sql);
$hangXe = "";
if ($result) {
    $listXe = $result->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // print_r($listXe);
    // die();
    if ($listXe) {
        foreach ($listXe as $key => $item) {
            $hangXe .= '
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$item["tenLoaiXe"].'</td>
                    <td>'.$item["xuatXu"].'</td>
                    <td>'.$item["tenDanhMuc"].'</td>
                    <td><input type="color" value="'.$item["mauSac"].'" disabled></td>
                    <td><img src="uploads/' . $item["hinhAnh"] . '" alt="" style="width: 100px"></td>
                    <td><a href ="edit.php?id='.$item["id"].'">Sửa</a>
                    <a href ="delete.php?id='.$item["id"].'">Xóa</a></td>
                </tr>';
        }
    }
    
}
$sqlDanhMuc = "SELECT danhmuc.id, tenHangXe FROM danhmuc";
    $resultDanhMuc = $connect -> query($sqlDanhMuc);
    $hangDanhMuc = '';
    if($resultDanhMuc){
        $listDanhMuc = $resultDanhMuc->fetchAll(PDO::FETCH_ASSOC);
        if($listDanhMuc){
            foreach($listDanhMuc as $key => $item){
                $hangDanhMuc .='
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$item["tenHangXe"].'</td>
                    <td><a href ="editDanhMuc.php?id='.$item["id"].'">Sửa</a>
                </tr>';
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootsthap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Quản lý ô tô</title>
</head>

<body>
    <div>
        <button><a href="add.php">Thêm xe</a></button>
        <table border>
            <thead>
                <th>STT</th>
                <th>Tên loại xe</th>
                <th>Xuất xứ</th>
                <th>Danh mục</th>
                <th>Màu sắc</th>
                <th>Hình ảnh</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?= $hangXe?>
            </tbody>
        </table>
    </div>
    <div>
        <button><a href="addDanhMuc.php">Thêm danh mục</a></button>
        <table border>
            <thead>
                <th>STT</th>
                <th>Tên hãng xe</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?= $hangDanhMuc?>
            </tbody>
        </table>
    </div>
    
</body>

</html>

