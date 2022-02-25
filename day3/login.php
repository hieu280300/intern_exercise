<?php
session_start();
include 'config.php';
$check=1;
$error='Mời đăng nhập';
$error_email='';
$error_password='';
$list_user='';

if(isset($_POST['submit'])){
    
    if($_POST['email']==''){
        $error_email='Mời nhập email';
        $check=2;
    }

    if($_POST['password']==''){
        $error_password='Mời nhập password';
        $check=2;
    }
    if($check==1){
        $email   = $_POST['email'];
        $password   = md5($_POST['password']);


        $sql = "SELECT * FROM users where email='".$email."' AND password='".$password."'";


        $result = $con->query($sql);
        $data=[];

        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $data['users']=$row;
            }

            $_SESSION['id'] = $data['users']['id'];
            $error = 'Đăng nhập thành công';
            $list_user='<button class="btn btn-primary" ><a href="welcom.php"><i class="fa fa-lock"></i> List User</a></button>';
        }else{
            $error = 'Đăng nhập thất bại';
        }

    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>đăng nhập</title>
</head>
<body>
    
<h2><b><?php echo $error;  ?></b></h2>
    <form action="" method="POST">
        Email:<input type="Email" name="email" placeholder="Email">
        <p><?php echo $error_email;  ?></p>
        Password:<input type="password" name="password" placeholder="Password">
        <p><?php echo $error_password;  ?></p>
        <button type="submit" name='submit' class="btn btn-primary" >Đăng Nhập</button>
    </form>
    <p><?php echo $list_user;  ?></p>

</body>
</html>


</body>
</html>