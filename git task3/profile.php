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
    <title>Profile</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p>Logo</p>
        </div>
        <div class="right-links">
            <?php 
            
                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                    $res_id = $result['Id'];
                }
                
                echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>
            <a href="edit.php">Change Profile</a>
            <a href="logout.php"><button id="submit">Logout</button></a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b>Ludixflex</b>, Welcome</p>
                </div>
                <div class="box">
                    <p>Your mail is: <b>123@gmail.com</b></p>
                </div>
            </div>
            <div class="box">
                <p>And you are <b>20 Year old</b>.</p>
            </div>
        </div>
    </main>
</body>
</html>