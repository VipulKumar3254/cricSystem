
<?php


    if( isset( $_POST['signup']))
    {

        $host='localhost';
    $username='root';
    $password="";
    $conn  = new mysqli($host,$username,$password);
        $name =$_POST['name'];
        $passw =$_POST['password'];
         echo " $name <br/>"; 
         echo " $passw <br/>"; 
        

        if( empty($name)|| empty($passw))
        {
            header("Location:http://localhost:80/cricSystem/signup.php");

        }
        else
        {


         $encryptedPassword= password_hash($passw,PASSWORD_DEFAULT);
         $conn->query(" use cricSystem");

        $result = $conn->query("insert into users values  ( '$name' , '$encryptedPassword' )  ");
         if($result)
         {
            header("Location:http://localhost:80/cricSystem/home.php");
         }
         else{
             echo "<h1> server is busy please try again after some time </h1>";
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



        
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" id='auth'>
                <label id='formp' >enter details for Sign-Up</label>
                <input type="text" name="name" id="name" placeholder='enter name'>
                <input type="password" name='password' id='password1' placeholder='enter password'>
                <div>

                    <input type="submit"  name='signup' value='Sign-Up'>
                    <input type="button" name='login' value="Login" onclick="login1()">
                </div>


             </form>


             <script>
                function login1(){
                    console.log("HII");
                    window.location.replace('http://localhost:80/cricSystem/login.php')
                }
             </script>


</body>
</html>
    