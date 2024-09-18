<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="profile.php"> Logo</a></p>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="logout.php"><button id="submit">Logout</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
        <?php 
            if(isset($_POST['submit'])){
                $username = $_POST['name'];
                $email = $_POST['email'];
                $age = $_POST['Age'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                    </div> <br>";
                    echo "<a href='profile.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                    $id = $_SESSION['id'];
                    $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                    while($result = mysqli_fetch_assoc($query)){
                        $res_Uname = $result['name'];
                        $res_Email = $result['email'];
                        $res_Age = $result['Age'];
                    }
            ?>
            <header>Change Profile</header>
            <form action="" method="post">
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
                <div class="field">
                    <input type="submit" id="submit" name="submit" value="Update"/>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>