<?php
session_start();
include 'config.php';
$error_email='';
$error_password='';
$list_user='';
if(isset($_POST['submit'])){
    
    if($_POST['email']== null){
        $error_email='Nhập email';
    }
    else
    {
        $email = $_POST['email'];
    }
    if($_POST['password']==null){
        $error_password='Nhập password';
    }
    else{
        $password = md5($_POST['password']);
    }
    if($email && $password){
        $sql = "SELECT * FROM users where email='".$email."' and password='".$password."'";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>đăng nhập</title>
    <style>
        body
        {
            padding: 200px 700px;
        }
    </style>
</head>
<body>
    
<h2>Đăng nhập</h2>
<h5><?php echo $error?></h5>
    <form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <p><?php echo $error_email;  ?></p>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    <p><?php echo $error_password;  ?></p>
     </div>
     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <p><?php echo $list_user;  ?></p>
    </form>
</body>
</html>
</body>
</html>