<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome page</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/welcome.css">
</head>
<body>

<div class="container">
   <div class="jumbotron">
      <h1 class="text-center"> Welcome <?php echo$_SESSION['fullName']; ?> to your home page! </h1>
      <p class="text-center"> Your email is: <?php echo $_SESSION['email']; ?>, and your mobile number is: <?php echo $_SESSION['mobile'];?> </p>
      <!-- <a class="btn btn-primary btn-lg" href="../index.html" role="button">Logout</a> -->
   </div>
</div>
</body>
</html>