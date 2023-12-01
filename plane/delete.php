<?php
    include("connect.php");
    $flight_id = '';
    if(isset($_GET["flight_id"])){
        $flight_id = $_GET["flight_id"];
        if($flight_id){
            try {
                $sql = "SELECT flights WHERE flight_id = $flight_id";
                // echo $sql;
                $result = $connect -> query($sql);
                if($result){
                    $listFlight = $result -> fetch(PDO::FETCH_ASSOC);
                    if($listFlight){
                        $sql = "DELETE FROM flights WHERE flight_id = ".$listFlight["flight_id"];
                        $result = $connect -> query($sql);
                        if($result){
                            header("Location: index.php");
                        }else{
                            echo ("Không tìm thấy chuyến bay");
                            die();
                        }
                    }
                }
            } catch (\Throwable $th) {
                echo ("Không tìm thấy chuyến bay");
                die();
            }
        }
    }

?>