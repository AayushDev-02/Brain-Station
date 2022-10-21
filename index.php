<?php
$insert=false;
if(isset($_POST['Name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con=mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this data base failed due to" .
        mysqli_connect_error());

    }
// echo"success connecting to DB";

$Name = $_POST['Name'];
// $Gender = $_POST['Gender'];
$Age = $_POST['Age'];   
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
// $desc=$_POST['desc'];
$Password=$_POST['Password'];

$sql="INSERT INTO `edu`.`stu` (`Name`, `Age`, `Email`, `Phone`,`Password`, `Date`) VALUES ( '$Name', '$Age', '$Email', '$Phone', '$Password', current_timestamp())";

// echo $sql;

if($con->query($sql)==true){
    // echo "successfully inserted";
    $insert=true;
}
else{
    echo "error: $sql <br> $con->error";
}

$con->close();

}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Brain Station</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="VIT BHOPAL">
    <div class="container">
        <h1>Welcome to Brain Station login form</h3>
        <p>Enter your details and submit this form to confirm your participation with our site </p>
        <?php
        if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for furthere courses</p>";
            header("Location: web.php");
            exit();
        }
        
        ?>
        <form action="index.php" method="post">
            <input type="text" name="Name" id="name" placeholder="Enter your name">
            <input type="text" name="Age" id="age" placeholder="Enter your Age">
            <!-- <input type="text" name="Gender" id="gender" placeholder="Enter your gender"> -->
            <input type="email" name="Email" id="email" placeholder="Enter your email">
            <input type="phone" name="Phone" id="phone" placeholder="Enter your phone">
            <input type="text" name="Passoword" id="phone" placeholder="Enter your Password">
            <!-- <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea> -->
            <a href="web.php"><button class="btn">Submit</button></a> 
            <!-- <a href="website\web.php"></a><button class="btn">Go to Website</button>  -->
        </form>
    </div>

    <!-- <img class="img1" src="img1.svg" alt=""> -->
    <script src="index.js"></script>

    <!-- INSERT INTO `stu` (`sno`, `Name`, `Age`, `Gender`, `E-mail`, `phone`, `Other`, `Date`) VALUES ('1', 'Vedish', '19', 'Male', 'this@twjwgmail.com', '1234567855', 'this is my first php my admin message', current_timestamp()); -->
    
</body>
</html>