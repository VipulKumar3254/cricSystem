<?php

    
if( isset($_POST['login']))
{   
    
    $name =$_POST['name'];

    $passw1 =$_POST['password'];

   
    if( empty($name) || empty($passw1))
    {
        header("Location:http://localhost:80/cricSystem/login.php");
        
    }
    
    else
    {


    
    $host='localhost';
    $username='root';
    $password="";
    $conn  = new mysqli($host,$username,$password);


   
    $conn->query("use cricSystem");

    // $result = $conn->query("select name, password from users");  
    $result = $conn->query("select name, password from users where name='$name'");  
   
    $rows = mysqli_num_rows($result);
    echo " $rows";
   
    if( $rows)
    {
        $data = $result->fetch_assoc();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
      $dbPassword = $data['password'];
       echo " $dbPassword <br/>"; 
      $logResult = password_verify($passw1,$dbPassword);
        if(  $logResult )
        {
            session_start();
            $_SESSION['name']=$name;
            $_SESSION['password']=$data['password'];
            header("Location:http://localhost:80/cricSystem/index.php");


            
        }
        else{
             echo " authenticaton credentials failed please try again.... <br/>"; 
        }

    }
  else
  {
      echo " authenticaton credentials failed please try again.. <br/>"; 
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
                <label id='formp' >enter details for login</label>
                <input type="text" name="name" id="name" placeholder='enter name'>
                <input type="password" name='password' id='password1' placeholder='enter password'>
                <div>

                    <input type="submit"  name='login' value='login'>
                    <input type="button" name='signup' value="Sign-Up" onclick="signup1()">
                </div>


             </form>


             <script>
                function signup1(){
                    window.location.replace('http://localhost:80/cricSystem/signup.php')
                }
             </script>


</body>
</html>