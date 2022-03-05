<?php
session_start();
include 'config.php';
$error ="Đăng nhập";
$error_email='';
$error_password='';
$check=true;
// $list_user='';
if(isset($_POST['submit'])){
    if(empty($_POST['email']))
    {
        $error_email = "Vui lòng nhập email";
        $check=false;
    }
    if(empty($_POST['password'])) {
        $error_p = "Vui lòng nhập password";
        $check=false;
    }
 
   if($check)
   {
        $email = $_POST['email'];
        $password = $_POST['password'];
            $sql = "SELECT * FROM users where email='$email' and password='$password'";
            $query = mysqli_query($conn , $sql);
            $count = mysqli_num_rows($query);
                if ($count==1) {
                      header('Location: index.php');
                }else{
                    echo "tên đăng nhập hoặc mật khẩu không đúng !";
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
    <title>đăng nhập</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    
<h1><?php echo $error?></h1>
    <form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập email" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nhập password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập password">
 
     </div>
     <button type="submit" name="submit" class="btn btn-primary">Đăng nhập</button>
     <button class="btn btn-primary" style="float:right" ><a style="color:white" href="register.php">Đăng kí</a></button>
    </form>
</body>
</html>
</body>
</html>