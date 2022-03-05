<?php session_start();
include 'config.php';
$error = "Đăng kí";
if(isset($_POST['submit'])){
    $flag = true;
    if(empty($_POST['name'])){
        $flag = false;
    }
    if(empty($_POST['email'])) {
        $flag = false;
    }
    if(empty($_POST['password'])) {
        $flag = false;
    }
    if($flag){ 
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $sql = "INSERT INTO users (username,email,password) VALUES('$name','$email','$password')";
        if($result = $conn->query($sql)){
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $to      = ".$email";
            $subject = "Gmail xac nhan dang ki thanh cong";
            $message = ".$name đã đăng kí thành công tài khoản!!!";
            $header  =  "From: lethithu280300@gmail.com";
            $success = mail ($to,$subject,$message,$header);
            if( $success == true )
            {
                echo "Đã gửi mail thành công...";
            }
            else
            {
                  echo "Không gửi đi được...";
            }
            $error = "Đăng kí thành công";
        }else{
            $error = 'Đăng kí thất bại';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" href="css/index.css">
   <script defer src="js/index.js"></script>
<!--Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

<h1><?php echo $error;?></h1>
<form action="" name="form01" method="POST">
<div class="form-group">
    <label for="">Name user</label>
    <input type="text" id="username" name="name"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên" >
    <span id="username_error"></span>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email </label>
    <input type="email" id="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email" >
    <span id="email_error"></span> 
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mật khẩu</label>
    <input type="password" id="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu" >
    <span id="password_error"></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
    <input type="password" id="repassword" name="repassword" class="form-control" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu" >
    <span id="repassword_error"></span>
  </div>
  <button type="submit"  onclick="return validate();" name="submit" class="btn btn-primary">Đăng kí</button>
  <button class="btn btn-primary" style="float:right" ><a style="color:white" href="login.php">Đăng nhập</a></button>
  </form>
  <script>
  
</script>
</body>
