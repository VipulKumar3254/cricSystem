
<?php

session_start();


if(!isset($_SESSION['name']))
{
    header("Location:http://localhost:80/cricSystem/login.php");    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganaur's best cricket stadium</title>
    <link rel='stylesheet' href='style.css'/>
     
</head>
<body>





        <nav class="navbar" >
            <h2 id='criclive' >CricLive</h2>
            <a href="./register.php" class='links' >Register Now</a>
            <a href="Matches.php" class='links' >Checkout Matches</a>
            <a href="about.php" class='links' >About Us</a>
            <a href="contact.php" class='links' >Contact Us</a>
            <a href="/profile" class='links'>   <?php 
             echo $_SESSION['name']; ?>
             <a href="./logout.php" class="links">Log-Out</a>
              </a>

          
        </nav>


       

</body>
</html>