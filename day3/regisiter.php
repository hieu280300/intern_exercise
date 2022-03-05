<?php

include 'config.php';
$error='Đăng kí';
$error_name='';
$error_password='';
$error_email='';
if(isset($_POST['submit'])){

    if($_POST['name']==null){
        $error_name='Nhập tên';
    }
    if($_POST['password']==null){
        $error_password='Nhập password';
       
    }
    if($_POST['email']==null){
        $error_email='Nhập email';
    }
    else{
        $name = $_POST['name'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $sql = "INSERT INTO users (email,password,name) VALUES('$email','$password','$name')";
        if($result = $con->query($sql)){
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body
        {
            padding: 200px 700px;
        }
    </style>
    <title>đăng kí</title>
</head>
<body>
<h2><b>Đăng kí</b></h2>
<form action="" method="POST">
<div class="form-group">
    <label for="">Name user</label>
    <input type="text" name="name"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name user"  onBlur="validateName()">
    <p><?php echo $error_name;  ?></p>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email </label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"  onBlur="validateEmail()">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <p><?php echo $error_email;  ?></p>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mật khẩu</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  onblur="validatePassword()">
    <p><?php echo $error_password;  ?></p>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
    <input type="password" name="repassword" class="form-control" id="exampleInputPassword1" placeholder="Password"  onblur="validatePassword()">
    <p><?php echo $error_password;  ?></p>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Đăng kí</button>
  <button class="btn btn-primary" style="background:red; float:right" ><a href="login.php">Đăng nhập</a></button>
  </form>
  <script>
       function validateName() {
        var str = form01.name.value;
        if (str.length == 0) {
            alert("Họ Tên không được bỏ trống. Vui lòng nhập đầy đủ họ và tên!");
            return false;
        }
        return true
    }
      function validatePassword() {
        var str01 = form01.password.value;
        var str02 = form01.repassword.value;

        var passwordFormat = /^?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
        if ((str01.length == 0 && str02.length == 0) || str01.length < 8 || str01 != str02 || !passwordFormat.test(str01)) {
            alert("Vui lòng kiểm tra mật khẩu!");
            return false;
        }
    }
    function validateEmail() {
        var str = form01.email.value;

        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (str.length == 0 || !mailformat.test(str)) {
            alert(" Vui lòng kiểm tra lại email!");
            return false;
        }

  </script>


</html>