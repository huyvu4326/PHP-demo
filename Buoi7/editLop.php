<?php
    include("connect.php");
    $id = '';
    $tenLop = '';
    
    $errTenLop = '';
   
    $isCheck = true;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id;
        if($id){
            try {
                $sql = "SELECT * FROM lop WHERE id = $id";
                $result = $connect -> query($sql);
            if($result){
                $lop = $result -> fetch(PDO::FETCH_ASSOC);
                if($lop){
                    // echo ("<pre>");
                    // print_r($lop);
                    $id = $lop["id"];
                    $tenLop = $lop["tenLop"];
                  

                }else{
                    echo "Không tìm thấy lớp";
                    die();
            }
            }
            } catch (\Throwable $th) {
                echo "Không tìm thấy lớp";
                die();
            }
            
        }
    }
    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $tenLop = trim($_POST["tenLop"]);
        // print_r([$id, $tenLop, $khoa, $ngaySinh, $lopId]);
        if(empty($tenLop)){
            $errtenLop = "Vui lòng nhập tên lớp";
            $isCheck = false;
        }
        if($isCheck){
            $sql = "UPDATE lop SET tenLop = '$tenLop' WHERE id = $id ";
            $result = $connect -> query($sql);
            if($result){
                echo ("Cập nhật tên thành công");
                header('Location: index.php');
            }else{
                echo ("Thất bại");
            }
        }
    }

    $sql = "SELECT * FROM lop";
    $result = $connect -> query($sql);
    $option = '';
    if($result){
        $listLop = $result -> fetchAll(PDO::FETCH_ASSOC);
        if($listLop){
            // foreach($listLop as $item){
            //     $option .= '<option '.($item["id"] == $lopId ? "selected":"").' 
            //     value="'.$item["id"].'">'.$item["tenLop"].'</option>';
            // }
        }
    }
?>

<form action="editLop.php" method="post">
    <input type="hidden" name="id" id="" value="<?= $id;?>">
    <label for="">Tên Lớp</label>
    <input type="text" name="tenLop" id="" value ="<?= $tenLop?>"><br>
    <span style="color:red"><?= $errTenLop ?></span><br>
    <input type="submit" name="submit" value="Gửi" id="">

</form>