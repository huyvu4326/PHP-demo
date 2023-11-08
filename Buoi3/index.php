<?php
// //Array tiếp
//     $arr = [1, 2, 3, 4];
//     $arr1 = [
//         "a" => 1,
//         "b" => 2,
//         "c" => 3
//     ];
//     echo "<pre>";
//     print_r ($arr);
//     print_r ($arr1);
//     echo $arr1['c'];

// //Array đa chiều
// $arr2 = [
//     "a" => [1, 2, 3, 4],
//     "b" => [5, 6, 7, 8],
//     "c" => [9, 10, 11, 12]
// ];
// echo "<br>";
// print_r ($arr2);
// echo $arr2['a'][3];
// echo "<br>";

 #Câu điều kiện
//  $so = 100;
//  if($so % 2 == 0){
//     echo "Số chẵn: $so";
//  }else{
//     echo "Số lẻ: $so";
//  }
//  echo "<br>";

// $age = 20;
// if ($age < 0){
//     echo "Lỗi";
// }elseif($age <= 15) {
//     echo "Thiếu nhi";
// }elseif ($age >= 15 && $age <= 23) {
//     echo "Thiếu niên";
// }elseif ( $age >= 23 && $age <= 40) {
//     echo "Thanh niên";
// }elseif ( $age >= 40 && $age <= 60) {
//     echo "Trung niên";
// }elseif ( $age > 60 ) {
//     echo "Người già";
// }

// echo "<br>";

// $age2 = 61;
// if( $age2 < 15) {
//     echo "Thiếu nhi";
// }elseif ($age2 <= 23) {
//     echo "Thiếu niên";
// }elseif ( $age2 <= 40) {
//     echo "Thanh niên";
// }elseif ( $age2 <= 60) {
//     echo "Trung niên";
// }else{
//     echo "Người già";
// }

// switch - case
// $age = 20;
// switch(true){
//     case  ($age < 0): 
//         echo "Lỗi";
//         break;
//     case ($age > 0 && $age <= 15): 
//         echo "Thiếu nhi";
//         break;
//     case ($age > 15 && $age <= 23): 
//         echo "Thiếu niên";
//         break;
//     case ($age > 23 && $age <= 40): 
//         echo "Thanh niên";
//         break;
//     case ($age > 40 && $age <= 60): 
//         echo "Trung niên";
//         break;
//     default: 
//         echo "Người già";
// }
// Hằng số
// const PI = 3.14;
// echo PI;

// echo "<br>";

// define("HANG", [1, 2, 3, 4]);
// print_r(HANG);

// $check = '1';
// $result = match ( ($check)) {
//     '1' => "chuỗi 1",
//     1 => "số 1",
//     2 => "số 2",
// };
// echo "<br>";

// echo $result;

$age = 20; 

$result = match (true) {
    $age <= 0 => "Lỗi",
    $age > 0 && $age <= 15 => "Thiếu nhi",
    $age >= 16 && $age <= 23 => "Thiếu niên",
    $age >= 13 && $age <= 40 => "Thanh niên",
    $age >= 40 && $age <= 60 => "Trung niên",
    $age >= 60  => "Người già",
    default => "nothing"
};
echo $result;


?>