<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/welcome.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>welcome page</title>
</head>
<body>

<div class="container">
   <div>
      <img src="../img/welcome.jpg" class="rounded mx-auto d-block" alt="welcome" id="welcome_img">
   </div>
   <div class="jumbotron">
      <h2 class="text-center"> Welcome <?php echo$_SESSION['fullName']; ?> to your home page! </h2><br>
      <p class="text-center"> Your email is: <?php echo $_SESSION['email']; ?><br>Your mobile number is: <?php echo $_SESSION['mobile'];?> </p>
      <?php echo '<a  href="../index.html" role="button"><input type="button" name="logout" class="btn btn-dark" value="LogOut" style=" color:white; font-size:1vw; margin-left:42%; margin-top:5%; width:150px; "></a>'; ?>
   </div>
</div>

</body>
</html>