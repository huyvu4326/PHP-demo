<?php
    include ("connect.php");
    $id = "";
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sql = "SELECT * FROM sinhvien WHERE id = $id";
        if($id){
            try {
                $sql = "SELECT * FROM sinhvien WHERE id = $id";
                $result = $connect -> query($sql);
            if($result){
                $sinhVien = $result -> fetch(PDO::FETCH_ASSOC);
                if($sinhVien){
                    $sql = "DELETE FROM sinhvien WHERE id = ".$sinhVien["id"];
                    // echo $sql;
                    $result = $connect -> query($sql);
                    if($result){
                        header('Location: index.php');
                    }
                }
            }
            } catch (\Throwable $th) {
                echo "Không tìm thấy sinh viên";
                die();
            }
            
        }
    }

?>