<?php
    include("connect.php");
    $flight_id = '';
    $flight_number = '';
    $total_passengers = '';
    $description = '';
    $airline_id = '';

    $sql = "SELECT * FROM airlines";
    $option = '';
    $result = $connect -> query($sql);
    if($result){
        $listAirline = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listAirline){
            foreach ($listAirline as $value){
                $option .= '<option ' . ($value["airline_id"] == $airline_id ? "selected" : "") . ' value="' . $value["airline_id"] . '">' . $value["airline_name"] . '</option>';
            }
        }
    }

    if(isset($_GET["flight_id"])){
        $flight_id = $_GET["flight_id"];
        if($flight_id){
            try {
                $sql = "SELECT * FROM flights WHERE flight_id = $flight_id";
                $result = $connect -> query($sql);
                if($result){
                    $listFlight = $result -> fetch(PDO::FETCH_ASSOC);
                    if($listFlight){
                        $flight_id = $listFlight["flight_id"];
                        $flight_number = $listFlight["flight_number"];
                        $total_passengers = $listFlight["total_passengers"];
                        $description = $listFlight["description"];
                        $airline_id = $listFlight["airline_id"];
                    }else{
                        echo "Không tìm thấy chuyến bay";
                        die();
                    }
                }
            } catch (\Throwable $th) {
                echo "Không tìm thấy chuyến bay 1";
                die();
            }
        }
    }

    if(isset($_POST['submit'])){
        $flight_id = ($_POST["flight_id"]);
        $flight_number = ($_POST["flight_number"]);
        $total_passengers = ($_POST["total_passengers"]);
        $description = ($_POST["description"]);
        $airline_id = ($_POST["airline_id"]);
            $sql = "UPDATE flights SET flight_number = '$flight_number', total_passengers = '$total_passengers', description = '$description', airline_id WHERE flight_id = $flight_id";
            $result = $connect -> query($sql);
            if($result){
                header('Location: index.php');
            }else{
                echo "error";
            }
    }
   


?>

<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="flight_id" value="<?= $flight_id; ?>">
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
        <button type="submit" name="submit">Edit</button>
    </div>
</form>