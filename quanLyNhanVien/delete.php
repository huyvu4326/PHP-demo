<?php
    include("connect.php");
    $id = '';
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id;
        if($id){
                $sql = "SELECT * FROM nhanvien WHERE id = $id";
                // echo $sql;
                $result = $connect -> query($sql);
                if($result){
                    $listNhanVien = $result -> fetch(PDO::FETCH_ASSOC);
                    if($listNhanVien){
                        $sql = "DELETE FROM nhanvien WHERE id = ".$listNhanVien["id"];
                        $result = $connect -> query($sql);
                        if($result){
                            header("Location: index.php");
                        }else{
                            echo ("Không tìm thấy nhân viên");
                            die();
                        }
                    }
                }
        }
    }

?>