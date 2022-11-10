


<?php
    session_start();
    if(!isset($_SESSION['name']))
    {
        header("Location:http://localhost:80/cricSystem/login.php");
    }


    if(isset($_POST['book']))
    {


        if( ! ( empty($_POST['matchName'])  || empty($_POST['startTime']) || empty($_POST['duration'])  || empty($_POST['date'])))
        {
            
            $host='localhost';
            $username='root';
            $password="";
            $conn  = new mysqli($host,$username,$password);

            if($conn)
            {
                $duration = $_POST['duration'];
                $startTime= $_POST['startTime'];
                $date= $_POST['date'];
                $matchName = $_POST['matchName'];
                $username= $_SESSION['name'];


                $conn->query("use cricSystem");
                $fetchQuery=" select * from matchRecords where (duration = $duration || start = $startTime || matchDate = $date )";
                
          
                
                $result =$conn->query($fetchQuery);
              
                if(mysqli_num_rows($result)==0)
                {
                    $insertQuery= " insert into matchRecords values ( '$matchName', '$startTime','$date','$username','$duration')   " ;
                    
                    if($conn->query($insertQuery))
                    {
                         echo " Slot is booked successfully.. Prepare for match .. <br/>"; 
                    }
                    else{
                         echo " Please try again after some time.. <br/>"; 
                    }
                }
                else
                {
                    echo "<h2 style=' color:white;   text-align:center;'> This slot is booked. Please select other timing. <br/> </h2>";

                }
                
            }
            else
            {
                echo " please try after some time <br/>";
            }

        }
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
    <link rel="stylesheet" href="register.css">
     
</head>
<body>





        <nav class="navbar" >
            <h2 id='criclive' >CricLive</h2>
            <a href="./register.php" class='links' >Register Now</a>
            <a href="Matches.php" class='links' >Checkout Matches</a>
            <a href="about.php" class='links' >About Us</a>
            <a href="contact.php" class='links' >Contact Us</a>
              </a>

          
        </nav>


        <form action="<?php $_SERVER['PHP_SELF']; ?>" class='match' method='POST'>
            <input type="text" placeholder="Enter name of Match" id="matchName" name="matchName" class='controls'> 
            <input type="number" name="startTime" id="startTime" placeholder="match startime time in hour" class='controls'> 
            <input type="number" name="duration" id="duration" placeholder="match duration in hour" class='controls'> 
            <label for="date" class='controls'>Select Date of Match</label> 
            <input type="date" name="date" id="date" class='controls'>
            <input type="submit" name='book' value="Bool Slot">
        </form>
        
         


</body>
</html>