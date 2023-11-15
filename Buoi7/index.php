<?php
   include_once("connect.php");
    $sql = "SELECT sinhvien.id, hoVaTen, khoa, ngaySinh, lopId, lop.tenLop 
            FROM sinhvien INNER JOIN lop ON sinhvien.lopId = lop.id";

    $result = $connect -> query($sql);
    $hang = '';
    if($result){
        $listSinhVien = $result->fetchAll(PDO::FETCH_ASSOC);
        if($listSinhVien){
            foreach($listSinhVien as $key => $item){
                $ngaySinh = new DateTime($item["ngaySinh"]);
                $ngaySinhFormatted = $ngaySinh->format('d/m/Y');
                $hang.='
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$item["hoVaTen"].'</td>
                    <td>'.$item["khoa"].'</td>
                    <td>'.$ngaySinhFormatted.'</td>
                    <td>'.$item["tenLop"].'</td>
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
    </thead>
    <tbody>
        <?php echo $hang ?>
    </tbody>
</table>

<button><a href="add.php" style ="text-decoration: none">Submit</a></button>