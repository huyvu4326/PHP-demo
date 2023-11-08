<?php
    // $a = "ten";
    // $$a = "ok";
    // echo $ten;

    // $a = '123';

    // $b = (int) $a;

    // var_dump($b);

    // is_int($b);

    // echo "<br>";

    // $c = (float) $a;

    // $d = (boolean) $a;

    // $e  = (string) $c;

    // array
    $array = array(1,2,3,4);

    echo "<pre>";
        print_r($array);
    echo "</pre>";

    echo"<br>";

    $arr = ['a', 'b', 'c', 'd', 'e'];

    $arr[3] = 'dm';
    // add
    $arr[] = "g";
    array_push($arr, 'h', 'j');
    array_unshift($arr, "11");
    array_splice($arr, 3, 0, "dcm");
    //remove
    unset($arr[3]);
    array_pop($arr);
    array_shift($arr);
    array_splice($arr, 3, 1);
    echo "<pre>";
        print_r($arr);
    echo "</pre>";

    echo $arr[2];
?>