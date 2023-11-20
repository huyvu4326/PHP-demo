<?php
    include ("connect.php");
    $id = "";
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql = "SELECT * FROM lop WHERE id = $id";
        if($id){
            try {
                $sql = "SELECT * FROM lop WHERE id = $id";
                $result = $connect -> query($sql);
            if($result){
                $lop = $result -> fetch(PDO::FETCH_ASSOC);
                if($lop){
                    $sql = "DELETE FROM lop WHERE id = ".$lop["id"];
                    // echo $sql;
                    $result = $connect -> query($sql);
                    if($result){
                        header('Location: index.php');
                    }
                }
            }else{
                echo "Không tìm thấy lớp";
                die();
            }
            } catch (\Throwable $th) {
                echo "Không tìm thấy lớp";
                die();
            }
            
        }
    }

?>