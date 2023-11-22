<?php
    include ("connect.php");
    $id = "";
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id;
        // $sql = "SELECT * FROM xe WHERE id = $id";
        if($id){
            try {
                $sql = "SELECT * FROM xe WHERE id = $id";
                echo $sql;
                $result = $connect -> query($sql);
            if($result){
                $listXe = $result -> fetch(PDO::FETCH_ASSOC);
                if($listXe){
                    $sql = "DELETE FROM xe WHERE id = ".$listXe["id"];
                    // echo $sql;
                    $result = $connect -> query($sql);
                    if($result){
                        header('Location: index.php');
                    }
                }
            }
            } catch (\Throwable $th) {
                echo "Không tìm thấy xe";
                die();
            }
            
        }
    }

?>