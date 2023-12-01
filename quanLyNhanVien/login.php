<?php
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        // print_r([$username,$password]);
        if($username=='admin' && $password =='123456'){
            // echo "đăng nhập thành công";
            //tạo ra cookie
            setcookie("username",$username,time() + 60*60*24);

            // echo $_COOKIE["username"];
            header('Location: index.php');

        }else{
            echo "Sai tài khoản hoặc mật khẩu";
        }
    }

?>

<form action="login.php" method="post">
    <label for="">UserName</label>
    <input type="text" name="username"><br>

    <label for="">Password</label>
    <input type="password" name="password"><br>

    <input type="submit" name="submit">
</form>