<?php
$insert=false;
if(isset($_POST['name'])){
    
    $server="localhost";
    $username="root";
    $password="";
    $db="trip";

    $conn = mysqli_connect($server,$username,$password,$db);

    if(!$conn)
    {
        die("Connection to the database failed due to ".mysqli_connect_error());
    }
   // echo"Success connecting to the database";

   $name = $_POST['name'];
   $gender = $_POST['gender'];
   $age = $_POST['age'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $desc = $_POST['desc'];
   $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', 
   '$desc', current_timestamp());";

   //echo $sql;

   if($conn->query($sql) == true){
    $insert=true;
   }
   else{
    echo "ERROR: $sql<br> $conn->error";
   }

   $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROZO - your travel form</title>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz@10..48&family=Roboto+Mono:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz@10..48&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:coral;">
   <!-- <img class="bg" src="download.jpeg" alt="tcet"> -->
    <div class="container">
        <h1>Welcome to Industrial Visit 2023(IV-2k23) form!</h1>
        <p>Enter your details and submit this form to confirm your bookings in the IV.</p>
        <?php
        if($insert==true)
        {    
            echo "<p class='submitmsg'>Thank You for submitting the form! We are happy to see you soon.</p>";
        }?>
        <form action="index.php" method="post">
    
            <input type="text" name="name" id="name" placeholder="Enter your name: ">
            <input type="text" name="age" id="age" placeholder="Enter your age: ">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender: ">
            <input type="email" name="email" id="email" placeholder="Enter your email: ">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone: ">
            <textarea name="desc" id="desc" rows="10" cols="40" placeholder="Enter any other information: "></textarea>
            <button class="btn">Submit</button>
        </form>
    
    </div>
<script src="index.js"></script>

</body>
</html>