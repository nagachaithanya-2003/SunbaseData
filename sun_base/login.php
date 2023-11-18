<?php
session_start();
include("db.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $loginid=$_POST['lid'];
    $pwd=$_POST['pass'];
    if(!empty($loginid) && !empty($pwd) && !is_numeric($loginid))
    {
        $query="select * from Login where mail='$loginid' limit 1";
        $result=mysqli_query($con,$query);
        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data=mysqli_fetch_assoc($result);
                if($user_data['pass']==$pwd)
                {
                    header("location:success.php");
                    die;
                }
            }
        }
            echo "<script type='text/javascript'>alert('Invalid LoginId or Password')</script>";
    }
    else{
        
        echo "<script type='text/javascript'>alert('Invalid LoginId or Password')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="login mt-3">
        <fieldset>
        <h1>Login</h1>
        <form method="POST">
            <label for="lid">Login Id</label>
            <input type="text" name="lid" placeholder="login id" required>
            <label for="pass">Password</label>
            <input type="password" name="pass" placeholder="password" required>
            <input type="submit" value="submit" name="submit">
            <p><b>Not having account?<a href="customerdetails.php"><b>SignUp Here</b></a></b></p>
        </form>
        </fieldset>

    </div>
</body>
</html>