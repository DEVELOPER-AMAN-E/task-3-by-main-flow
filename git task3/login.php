<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
        <?php 
             
                include("php/config.php");
                if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                        <p>Wrong Email or Password</p>
                        </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Go Back</button>";
        
                }
                if(isset($_SESSION['valid'])){
                    header("Location: profile.php");
                }
                }else{

           
           ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email" >Email :</label>
                    <input type="email" name="email" id="email" placeholder="ex:myname@gmail.com" required>
                </div>
                <div class="field input">
                    <label for="password"> Password : </label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required/>
                </div>
                <div class="field">
                    <input type="submit" id="submit" name="submit" value="login"/>
                </div>
                <div class="links">
                    Don't Have Account: <a href="register2.php">Sign-Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>