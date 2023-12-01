<?php
    include("connect.php");

    if(isset($_COOKIE["username"])){
        echo "Xin chào " .$_COOKIE["username"];
        echo '<button><a href="logout.php">Đăng xuất</a></button>';
    }else{
        echo '<button><a href="login.php">Đăng nhập</a></button>';
    }

    $sql = "SELECT nhanvien.id, tenNhanVien, hinhAnh, maNhanVien, phongban.tenPhongBan, mail, soDienThoai 
            FROM nhanvien INNER JOIN phongban on nhanvien.phongBanId = phongban.id";
    $result = $connect -> query($sql);
    $hangNhanVien = '';
    if($result){
        $listNhanVien = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listNhanVien){
            foreach($listNhanVien as $key => $value){
                $hangNhanVien .= '
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["tenNhanVien"].'</td>
                    <td>'.$value["hinhAnh"].'</td>
                    <td>'.$value["maNhanVien"].'</td>
                    <td>'.$value["tenPhongBan"].'</td>
                    <td>'.$value["mail"].'</td>
                    <td>'.$value["soDienThoai"].'</td>
                    <td><a href ="edit.php?id='.$value["id"].'">Sửa</a>
                    <a href ="delete.php?id='.$value["id"].'">Xóa</a></td>
                </tr>';
            }
        }
    }


?>

<button><a href="add.php">Thêm</a></button>
<table border>
    <thead>
        <th>STT</th>
        <th>Tên nhân viên</th>
        <th>Hình ảnh</th>
        <th>Mã nhân viên</th>
        <th>Phòng ban</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Action</th>
    </thead>
    <tbody>
        <tr>
            <?= $hangNhanVien; ?>
        </tr>
    </tbody>
</table>