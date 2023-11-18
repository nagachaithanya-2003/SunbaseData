<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
        $firstname=$_POST['fname'];
        $lastname=$_POST['lname'];
        $street=$_POST['street'];
        $address=$_POST['addr'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $number=$_POST['num'];
        $email=$_POST['mail'];
        $password=$_POST['pass'];
        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query="insert into login(fname,lname,street,addr,city,state,num,mail,pass) values('$firstname','$lastname','$street','$address','$city','$state','$number','$email','$password')";
            mysqli_query($con,$query);
            echo "<script type='text/javascript'>alert('Successfully submitted')</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Enter all details')</script>";

        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>customer details</title>
</head>
<body>
    <div class="details mt-3">
        <fieldset>
        <h1>Customer Details</h1>
        <h4>Please fill the details</h4>
        <form method="POST">
            <label for="fname">First Name</label>
            <input type="text" name="fname" placeholder="First Name" required>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" placeholder="Last Name" required>
            <label for="street">Street</label>
            <input type="text" name="street" placeholder="Street" required>
            <label for="addr">Address</label>
            <input type="text" name="addr" placeholder="Address" required>
            <label for="city">City</label>
            <input type="text" name="city" placeholder="City" required>
            <label for="state">State</label>
            <input type="text" name="state" placeholder="State" required>
            <label for="phone">Phone</label>
            <input type="tel" name="num" placeholder="Phone" required>
            <label for="mail">Email</label>
            <input type="email" name="mail" placeholder="Email" required>
            <label for="pass">Password</label>
            <input type="password" name="pass" placeholder="create your password" required>
            <input type="submit" value="submit" name="submit">
            <p><b>Already have account?<a href="login.php">Login Here</a></b></p>
        </form>
        </fieldset>
    </div>
</body>
</html>