<?php
    include("connect.php");

    $flight_number = '';
    $total_passengers = '';
    $description = '';
    $airline_id = '';

    $sql = "SELECT * FROM flights";
    $result = $connect -> query($sql);
    if($result){
        $listFlight = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listFlight){
            // echo "<pre>";
            // print_r($listFlight);
        }
    }

    $sql = "SELECT * FROM airlines";
    $option = '';
    $result = $connect -> query($sql);
    if($result){
        $listAirline = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listAirline){
            foreach ($listAirline as $value){
                $option .= '<option ' . ($value["airline_id"] == $airline_id ? "selected" : "") . ' 
                        value="' . $value["airline_id"] . '">' . $value["airline_name"] . '</option>';
            }
        }
    }
    if(isset($_POST['submit'])){
        $flight_number = ($_POST["flight_number"]);
        $total_passengers = ($_POST["total_passengers"]);
        $description = ($_POST["description"]);
        $airline_id = ($_POST["airline_id"]);
            $sql = "INSERT INTO flights(flight_number, total_passengers, description, airline_id) VALUES ('$flight_number', '$total_passengers', '$description', '$airline_id')";
            $result = $connect -> query($sql);
            if($result){
                header('Location: index.php');
            }else{
                echo "error";
            }
    }
   


?>

<form action="add.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="flight_number">Số chuyến bay</label>
        <input type="number" name="flight_number" id="flight_number" value="<?= $flight_number?>">
    </div>
    <div>
        <label for="total_passengers">Tổng hành khách</label>
        <input type="number" name="total_passengers" id="total_passengers" value="<?= $total_passengers?>">
    </div>
    <div>
        <label for="description">Mô tả</label>
        <input type="text" name="description" id="description" value="<?= $description?>">
    </div>
    <div>
        <label for="airline_id">Hãng hàng không</label>
        <select name="airline_id" id="airline_id">
            <?= $option; ?>
        </select>
    </div>
    <div>
        <button type="submit" name="submit">Add</button>
    </div>
</form>