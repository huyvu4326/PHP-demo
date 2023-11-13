<?php
    // #date
    // date_default_timezone_set('Asia/Ho_Chi_Minh');
    // $minute = time();
    // // echo $minute;/

    // $now = date('Y-m-d H:i:s');
    // echo $now. '<br>';
    // // echo date_default_timezone_get();

    // $stringDate = '2023-11-10 19:05:28'; //get on database
    // $stringDate1 = $now;
    // // Cách 1
    // // $day1 = new DateTime($stringDate);
    // //Cách 2
    // $day2 = date_create($stringDate1);
    // // print_r($day2);
    // // echo date_format($day2, 'd-m-Y');
    // echo date_format($day2, 'H-i-s; d/m/Y'); //Giờ - phút - giây; Ngày - tháng - năm.

    // //Cách để lấy ra thông tin cụ thể của đối tượng
    // $day = date_parse($stringDate1);
    // echo "<pre>";
    // print_r($day);
    // echo $day['minute'];

    $array = [
        "football" => "Đá bóng",
        "swim" => "Bơi",
        "run" => "Chạy",
        "jum" => "Nhảy"
    ];
    $options = '';
    foreach ($array as $key => $value){
        $options .= '<option value="'.$key.'">'.$value.'</option>';
    }
?>
<div>
    <form action="index.php" method="post">
        <div>
            <label for="">UserName</label>
            <input type="text" name="user">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="pass">
        </div>
        <div>
            <label for="">Môn học</label>
            <select name="subject" id="">
                <option value="match">Toán</option>
                <option value="english">Tiêng anh</option>
                <option value="code">PHP</option>
            </select>
        </div>
        <div>
            <label for="">Hoạt động</label>
            <select name="doing" id="">
                <?php echo $options;?>
            </select>
        </div>
        <div>
            <label>Chọn môn thể thao:</label>
            <input type="radio" name="sport" value="football"> Bóng đá
            <input type="radio" name="sport" value="swim"> Bơi
            <input type="radio" name="sport" value="run"> Chạy
        </div>
        <div>
            <label>Chọn sở thích:</label>
            <input type="checkbox" name="hobby[]" value="music"> Âm nhạc
            <input type="checkbox" name="hobby[]" value="travel"> Du lịch
            <input type="checkbox" name="hobby[]" value="reading"> Đọc sách
        </div>
        <input type="submit" name="submit" value="Gửi">
    </form>
</div>


<?php

    if(isset($_POST['submit'])){
        $userName = $_POST['user'];
        echo $userName. '<br>';
        $passWord = $_POST['pass'];
        echo $passWord. '<br>';
        $selectedSubject = $_POST['subject'];
        echo $selectedSubject. '<br>';
        $selectedActivity = $_POST['doing']; 
        echo $array[$selectedActivity]. '<br>';
        $selectedSport = isset($_POST['sport']) ? $_POST['sport'] : [];
        echo $array[$selectedSport] . '<br>';
        $selectedHobbies = isset($_POST['hobby']) ? $_POST['hobby'] : [];
        if (empty($selectedHobbies)) {
            echo "No hobbies selected.";
        } else {
            echo implode(", ", $selectedHobbies) . '<br>';
        }
    }
    
?>