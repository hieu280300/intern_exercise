<?php
session_start();
include 'connect.php';
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}
$sql = "SELECT * FROM users WHERE id='".$id."'";
$result = $con -> query($sql);
$data=[];

if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        $data[]=$row;
    }
}
$html='';
foreach($data as $item){
    $html .='<tr ">
				<td>'.$item['id'].'</td>
				<td>'.$item['name'].'</td>
				<td>'.$item['email'].'</td>
				
			</tr>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List user</title>
</head>
<body>
    
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            <?php  
                echo $html;
            ?>
        </tbody>
    </table>
</body>
</html>