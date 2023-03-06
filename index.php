<?php
$insert = FALSE;

if(isset($_POST['name'])){
$server = "Localhost";
$username = "root";
$password = "";
 
#   Now we make connection for connect to sql;
$con = mysqli_connect($server,$username,$password);
if(!$con){
    die("The connection is failed due to" . mysqli_connect.error());
}
//echo 'connection successful!';
$name =$_POST['name'];
$age =$_POST['age'];
$gender =$_POST['gender'];
$mail = $_POST['email'];
$phone =$_POST['phone'];
$msg =$_POST['des'];

$query = " INSERT INTO `mydata`.`trip`(`Name`, `Age`, `Gend`, `E_Mail`, `Phone`, `Msg`, `Dt`) VALUES ('$name','$age','$gender','$mail','$phone','$msg',current_timestamp())";

if($con ->query($query)==TRUE){
  $insert =TRUE;
}
else {
    echo 'Data not inseted ';
}
$con->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellcom to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <div class="container">
        <h2>Wellcom To NITS Travel Form</h2>
        <p>Enter your valid information for participation of trip.</p>
        <?php
        if($insert==TRUE){
            echo " <p id='endp'>Thanks for submit the form. We are happy to see you in our party.</p>";
        }
        ?>
        
        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter Your Name" autocomplete="off" required>
        <input type="number" name="age" id="age" placeholder="Enter Your Age" autocomplete="off" required>
        <select name="gender" id="gender" required>
            <option value="Gender" selected hidden>Gender</option>
            <option value="male">Male</option>
            <option value="fmale">Female</option>
        </select>
        <input type="email" name="email" id="email" placeholder="Enter Your Email" autocomplete="off" required>
        <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone" autocomplete="off" required>
        <textarea  name="des" id="des" cols="30" rows="10" placeholder="Enter Your other Information" required></textarea>
         <button class="btn">Sumbit</button> 
        
        </form>
    </div>
</body>
</html>