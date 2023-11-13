<?php
    #while
    // $i = 1;
    // while( $i <= 10){
    //     echo "i = $i <br>";
    //     $i++;
    // }

    #do - while
    // $a = 1;
    // $tong = 0;
    // do{
    //     $tong += $a;
    //     $a++;
    // }while($a <= 20);
    // echo "Tổng = $tong <br>";

    #For
    $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $sum = 0;
    // for( $i = 0; $i < count($arr); $i++){
    //     echo $arr[$i]." <br>";
    //     // $sum += $arr[$i];
    //     if ($arr[$i] % 2 === 0) {
    //         $sum += $arr[$i];
    //     }
    // }
    // echo "Tổng các số chẵn của mảng là: " . $sum;
    // function isPrime($number) {
    //     if ($number <= 1) {
    //         return false; 
    //     }
    //     for ($i = 2; $i * $i <= $number; $i++) {
    //         if ($number % $i === 0) {
    //             return false;
    //         }
    //     }
    //     return true; 
    // }
    // for ($i = 0; $i < count($arr); $i++) {
    //     if (isPrime($arr[$i])) {
    //         $sum += $arr[$i]; 
    //     }
    //     echo $arr[$i] . " <br>"; 
    // }
    // echo "Tổng các số nguyên tố trong mảng là: " . $sum;

    // $arr = [
    //     "a" => 1,
    //     "b" => 2,
    //     "c" => 3,
    //     "d" => 4,
    // ];

    // foreach( $arr as $key => $value ){
    //     echo "key = $key; value = $value <br>"; 
    // }

    // $array = [
    //     "name" => "Hà Huy Vũ",
    //     "age" => "21",
    //     "khoa" => "Công nghệ thông tin",
    //     "gt" => true,
    //     "result" => [6, 7.5, 8.5, 9]
    // ];
    // $array2 = [
    //     [
    //         "name" => "Hà Huy Vũ",
    //         "age" => "21",
    //         "khoa" => "Công nghệ thông tin",
    //         "gt" => true,
    //         "result" => [6, 7.5, 8.5, 9]
    //     ],
    //     [
    //         "name" => "Nguyễn Hoài Nam",
    //         "age" => "21",
    //         "khoa" => "Công nghệ thông tin",
    //         "gt" => true,
    //         "result" => [7, 7.5, 8, 5]
    //     ],
    //     [
    //         "name" => "Lưu Phúc Huy",
    //         "age" => "21",
    //         "khoa" => "Công nghệ thông tin",
    //         "gt" => true,
    //         "result" => [6, 8, 5, 9]
    //     ]
    // ];
    
    // foreach ($array2 as $person) {
    //     echo "Tên: " . $person["name"] . "<br>";
    //     echo "Tuổi: " . $person["age"] . "<br>";
    //     echo "Khoa: " . $person["khoa"] . "<br>";
    //     echo "Giới tính: " . ($person["gt"] ? "Nam" : "Nữ") . "<br>";
        
    //     // Tính điểm trung bình
    //     $results = $person["result"];
    //     $total = array_sum($results);
    //     $average = $total / count($results);
    //     echo "Điểm trung bình: " . number_format($average, 2) . "<br>";
    //     echo "<br>";
    // }
    // foreach ($array as $key => $value) {
    //     if (is_array($value)) {
    //         echo "$key: ";
    //         foreach ($value as $item) {
    //             echo "$item ";
    //         }
    //         echo "<br>";
    //     } else {
    //         echo "$key: $value\n";
    //     }
    // }
    // $results = $array["result"];
    // $totalScore = array_sum($results);
    // echo "Tổng điểm: $totalScore";
    // $thongTin = '';
    // $thongTin .= "Họ và tên: ".$array["name"]. "<br>";
    // $thongTin .= "Tuổi: ".$array["age"]. "<br>";
    // $thongTin .= "Khoa: ".$array["khoa"]. "<br>";
    // $thongTin .= "Giới tính: ". ( $array["gt"] ? "Nam" : "Nữ" ). "<br>";
    // $thongTin .= "Tổng điểm ".( array_sum($array['result'])). "<br>";
    
    // echo $thongTin;

    #function
    // function sayHello($name) {
    //     echo "Chào $name<br>";
    // }
    
    // $myName = "Huy Vũ";
    // sayHello($myName);

    // function tinhTong($a, $b) {
    //     return $a + $b;
    // }

    // $result = tinhTong(1574, 2567);

    // echo $result;

    // BTVN 
    /* 
    1. Viết một hàm kiểm tra 1 số có phải số nguyên tố không?
    2. Sử dụng hàm đó để kết hợp với foreach tính tổng các phần tử trong 1 array nếu là số nguyên tố?
     */
    function isPrime($number) {
        if ($number <= 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false; 
            }
        }
        return true;
    }
    // var_dump(isPrime(88));
    function sumPrimeNumbers($array) {
        $sum = 0;
        foreach ($array as $number) {
            if (isPrime($number)) {
                echo $number.'<br>';
                $sum += $number;
            }
        }
        return $sum;
    }
    $array = [4, 5, 6, 7, 2];
    $total = sumPrimeNumbers($array);
    echo "Tổng các số nguyên tố trong mảng là: $total";
    
    
?>

