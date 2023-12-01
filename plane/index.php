<?php
include("connect.php");
$hang = '';
$sql = "SELECT flights.flight_id, flight_number, image, total_passengers, description, airlines.airline_name
        FROM flights INNER JOIN airlines ON flights.airline_id = airlines.airline_id";
$result = $connect->query($sql);
if ($result) {
    $listFlight = $result->fetchAll(PDO::FETCH_ASSOC);
    if ($listFlight) {
        // echo "<pre>";
        // print_r($listFlight);
        foreach ($listFlight as $key => $value) {
            $hang .= '
            <tr>
                <td>'.($key + 1).'</td>
                <td>'.$value["flight_number"].'</td>
                <td><img src="uploads/'.$value["image"].'" alt="" style ="width:150px"></td>
                <td>'.$value["total_passengers"].'</td>
                <td>'.$value["description"].'</td>
                <td>'.$value["airline_name"].'</td>
                <td><a href="edit.php?flight_id='.$value["flight_id"].'">Sửa</a>
                    <a href="delete.php?flight_id='.$value["flight_id"].'">Xóa</a></td>
            </tr>
            
            ';
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
    <button><a href="add.php">Add Product</a></button>
    <table border>
        <thead>
            <th>STT</th>
            <th>Số chuyến bay</th>
            <th>Hình ảnh</th>
            <th>Tổng hành khách</th>
            <th>Mô tả</th>
            <th>Hãng hàng không</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?= $hang; ?>
        </tbody>
    </table>
</body>

</html>