<?php
   include_once("connect.php");
    $sql = "SELECT sinhvien.id, hoVaTen, khoa, ngaySinh, lopId, lop.tenLop 
            FROM sinhvien INNER JOIN lop ON sinhvien.lopId = lop.id";

    $result = $connect -> query($sql);
    $hangSinhVien = '';
    if($result){
        $listSinhVien = $result->fetchAll(PDO::FETCH_ASSOC);
        if($listSinhVien){
            foreach($listSinhVien as $key => $item){
                $ngaySinh = new DateTime($item["ngaySinh"]);
                $ngaySinhFormatted = $ngaySinh->format('d/m/Y');
                $hangSinhVien.='
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$item["hoVaTen"].'</td>
                    <td>'.$item["khoa"].'</td>
                    <td>'.$ngaySinhFormatted.'</td>
                    <td>'.$item["tenLop"].'</td>
                    <td><a href ="edit.php?id='.$item["id"].'">Sửa</a>
                    <a href ="delete.php?id='.$item["id"].'">Xóa</a></td>
                </tr>';
            }
        }
    }

    $sqlLop = "SELECT lop.id, tenLop FROM lop";
    $resultLop = $connect -> query($sqlLop);
    $hangLop = '';
    if($resultLop){
        $listLop = $resultLop->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($listLop);
        if($listLop){
            foreach($listLop as $key => $item){
                $hangLop .='
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$item["tenLop"].'</td>
                    <td><a href ="editLop.php?id='.$item["id"].'">Sửa</a>
                    <a href ="deleteLop.php?id='.$item["id"].'">Xóa</a></td>
                </tr>';
            }
        }
    }

?>

<table border>
    <thead>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Khoa</th>
        <th>Ngày sinh</th>
        <th>Tên lớp</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php echo $hangSinhVien ?>
    </tbody>
</table>
<button><a href="add.php" style ="text-decoration: none">Add Student</a></button>

<table border>
    <thead>
        <th>STT</th>
        <th>Lớp</th>
        <td>Action</td>
    </thead>
    <tbody>
        <?php echo $hangLop ?>
    </tbody>
</table>
<button><a href="addLop.php" style ="text-decoration: none">Add Class</a></button>