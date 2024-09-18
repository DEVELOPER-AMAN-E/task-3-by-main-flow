<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div>
        <?php
            include("php/config.php");
            $new =$_POST['new password'];
            $confirm =$_POST['confirm password'];
            if(empty($new)){
                $error_msg['new']="Password is required";
            }
            if(empty($confirm)){
                $error_msg['confirm']="Confirm password is required";
            }
            if($new != $confirm){
                $error_msg['confirm2']="Confirm password is required";
            }
            else{
                if(isset($_POST['submit'])){
                    $username = $_POST['name'];
                    $email = $_POST['email'];
                    $age = $_POST['Age'];
                    $password = $_POST['new password'];

                    //verifying the unique email

                    $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

                    if(mysqli_num_rows($verify_query) !=0 ){
                        echo "<div class='message'>
                                    <p>This email is used, Try another One Please!</p>
                                </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    }
                    else{

                        mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Erroe Occured");

                        echo "<div class='message'>
                                    <p>Registration successfully!</p>
                                </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Login Now</button>";
                    
                    }
                }else{

                    
                    
            
            ?>
    </div>
    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <form action="" method="post">
                if(isset($error_msg['new'])){
                    echo $error_msg['new'];
                }
                if(isset($error_msg['confirm'])){
                    echo $error_msg['confirm'];
                }
                if(isset($error_msg['confirm2'])){
                    echo $error_msg['confirm2'];
                }
                <div class="field input">
                    <label for="email" >Email :</label>
                    <input type="email" name="email" id="email" placeholder="ex:myname@gmail.com" required>
                </div>

                <div class="field input">
                    <label for="Full-Name" >Name :</label>
                    <input type="text" name="name" id="Name" placeholder="Enter Your Name" required>
                </div>

                <div class="field input">
                    <label for="Age" >Age :</label>
                    <input type="number" name="Age" id="Age" placeholder="Enter Your Age" required>
                </div>

                <div class="field input">
                    <label for="new password">New Password : </label>
                    <input type="password" name="new password" id="password" placeholder="Enter password" required/>
                    <label for="confirm password">Confirm Password : </label>
                    <input type="password" name="confirm password" id="password" placeholder="Enter Confirm password" required/>
                </div>
                <div class="field">
                    <input type="submit" id="submit" name="submit" value="Register"/>
                </div>
                <div class="links">
                    Already Have Account: <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php }}?>
    </div>
</body>
</html>