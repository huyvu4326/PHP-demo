<?php
    include("connect.php");
    $id = '';
    $tenHangXe = '';

    $errTenHangXe = '';

    $isCheck = true;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($id){
            try {
                $sql = "SELECT * FROM danhmuc WHERE id = $id";
                $result = $connect -> query($sql);
                if($result){
                    $listDanhMuc = $result -> fetch(PDO::FETCH_ASSOC);
                    if($listDanhMuc){
                        // echo "<pre>";
                        $id = $listDanhMuc["id"];
                        $tenHangXe = $listDanhMuc["tenHangXe"];
                    }else{
                        echo "Không tìm thấy hãng xe";
                        die();
                    }
                }
            } catch (\Throwable $th) {
                echo "Không tìm thấy hãng xe";
                die();
            }
        }
    }
    
    if(isset($_POST["submit"])){
        $tenHangXe  = $_POST["tenHangXe"];
        if(empty($tenHangXe)){
            $errTenHangXe = "Vui lòng nhập tên hãng xe";
            $isCheck = false;
        }
        if($isCheck){
            $sqlDanhMuc = "UPDATE danhmuc SET tenHangXe = '$tenHangXe' WHERE id = $id ";
            $resultDanhMuc = $connect -> query($sqlDanhMuc);
            if($resultDanhMuc){
                echo ("cập nhật sản phẩm thành công");
                header('Location: index.php');
            }else{
                echo ("Thất bại");
            }
        }
    }
    $sql = "SELECT * FROM danhmuc";
    $option = "";
    $result = $connect -> query($sql);
    if($result){
        $listDanhMuc = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listDanhMuc){
        }
    
    }

?>
<form action="editDanhMuc.php" method="post">
    <input type="hidden" name="id" id="" value="<?= $id;?>">
    <label for="">Hãng xe</label>
    <input type="text" name="tenHangXe" id="" value ="<?= $tenHangXe?>"><br>
    <span style="color:red"><?= $errTenHangXe ?></span><br>

    <input type="submit" name="submit" value="Gửi" id="">

</form>