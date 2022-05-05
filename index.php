<?php
$insert = false;
if(isset($_POST['Name'])){
$server= "localhost";
$username ="root";
$password="";
$dbname = "test";
$con= mysqli_connect($server, $username, $password, $dbname);
if(!$con){
    die("connection to this database  failed due to ". mysqli_connect_error());
}
//echo "Success connecting to the db ";

$name= $_POST['Name'];
$gender= $_POST['Gender'];
$phone= $_POST['Phonenumber'];
$age=$_POST['Age'];
$other= $_POST['desc'];
$email= $_POST['Email'];

$sql= "INSERT INTO `test`.`tour` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";
//echo $sql;

if($con->query($sql) == true){
//echo "successfully inserted";
$insert= true;
}
else{
    echo "ERROR: $sql <br> $con->error";
   
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
    <title>Tourism form</title>
    <link rel="stylesheet" href="index.css">
   
</head>
<body>
    <img src="bg.jpg" alt="loading" class="bg">
    <div class="container">
        <h3>
            Welcome to IIT planning US tours 
        </h3>
         <p>
             please enter your details in form and subit the form to confirm the trip !!
         </p>
         <?php
         if($insert== true){
         echo "<p class='submitmsg'>thanks for submitting the form. Enjoy with us on tour!!</p>";
        };
        
         ?>
       <form action="http://localhost/code/index.php" method="post">
           <br>
           <!-- <label for="Name">Name : </label> -->
           <input type="text" name = "Name" id="Name" placeholder="Enter your Name">
           <br>
           <!-- <label for="age">Age : </label> -->
           <input type="text" name = "Age" id="age" placeholder="Enter your Age">
           <br>
           <!-- <label for="gender">Gender : </label> -->
           <input type="text" name = "Gender" id="gender" placeholder="Enter your Gender">
           <br>
           <!-- <label for="Email">Email : </label> -->
           <input type="email" name = "Email" id="Email" id="Email" placeholder="Enter your Email">
           <br>
           <!-- <label for="phone">Phone : </label> -->
           <input type="phone" name = "Phonenumber" id="phone" placeholder="Enter your Phone">
           <br>
           <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other detail here "></textarea>
           <button class="btn "type="submit">Submit</button>
           <!-- <button type="reset">Reset</button> -->
       </form>
         

    </div>

<script src="index.js"></script>
</body>
</html>



