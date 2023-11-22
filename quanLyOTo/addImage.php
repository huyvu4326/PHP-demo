<?php
include("connect.php");
    $errImage = "";

    $image = "";

    $isCheck = true;

    if(isset($_POST["submit"])){
        $image = $_FILES["hinhAnh"];
        // echo "<pre>";
        // print_r ($image);
        $fileName = $image["name"];
        if($fileName){
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            // echo $extension;
            $arrAllow = [
                'png',
                'jpg',
                'jpeg'
            ];
            if(!in_array($extension, $arrAllow)){
                $errImage = 'Cần nhập đúng file';
                $isCheck = false;
            }
        }else{
            $isCheck = false;
            $errImage = "Cần nhập hình ảnh";
        }

        if($isCheck){
            $fileName = time().$fileName;
            $dir = "uploads/".$fileName;
            if(move_uploaded_file($image["tmp_name"], $dir)){
                $sql = "INSERT INTO image(hinhAnh) VALUES ('$fileName')";
                $result = $connect -> query($sql);
                if($result){
                    echo "Succes";
                }else{
                    echo "Error";
                }
            };
        }
    }
?>

<form action="addImage.php" method="post" enctype="multipart/form-data">
    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" id="">
    <span style="color: red"><?= $errImage?></span>
    <input type="submit" name="submit" id="" value="Gửi">
</form>