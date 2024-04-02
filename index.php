<?php
include "connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
    <title>signup</title>
</head>
<body>
    <div class="signup-box">
        <h1>SIGN UP</h1>
        <h4>for better future</h4>
        <form action="index.php" method="POST">
            <label>Full name </label>
            <input type="text" placeholder="johnny sins" name="fname">
            <label>Phone no.</label>
            <input type="text" placeholder="12345678" name="phno">
            <label>email</label>
            <input type="text" placeholder="js@gmail.com" name="mail">
            <label>password</label>
            <input type="text" placeholder="secret" name="pass">
            <label>confirm password</label>
            <input type="text" placeholder="super secret"name="cpass">
            <input type="submit" value="SUBMIT" class="submit-button" >
           
        </form>

    <?php    
    if ($_SERVER["REQUEST_METHOD"] =="POST" ){

       $fmane=$_POST["fname"];
       $numb=$_POST["phno"];
       $email=$_POST["mail"];
       $passw=$_POST["pass"];
       $ord=$_POST["cpass"]; 
}
//variable declaration and assign

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Error: Invalid email format.";
    exit();
}
//email verification

if (strlen($numb) !== 10) {
    echo "phone no. to be 10 digits";
    exit();
}

if (!empty($passw) && !empty($ord)) {
if ($passw === $ord) {

    } else {
    echo "please do perfectly";
    exit();
}
} else {
    // One or both password fields are empty, show error message
    echo "password fields empty";
}


    $hash = password_hash($passw , PASSWORD_DEFAULT);
    //password hash
    
      $sql = "INSERT INTO `signup` (`fullname`, `phoneno.`, `email`, `password`) VALUES ('$fmane', '$numb', '$email', '$hash')";

    //exit if password don't match

        $result=mysqli_query($conn,$sql);

        if(!$result){
            echo "incorrect";
    }
    //no use because always through a value, to be corrected

?>


        <p>agree to conditions</p>
    </div>
    <p class="go"> already have a account? <a href="a">login</a></p>

</body>
</html>