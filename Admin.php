<?php
session_start();
setCookie('fullName', date("H:i:s-m/d/y"), 60*24*60*60+time());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/Admin.css">
    <title>Admin page</title>
</head>
<body>
    <!-- <div class="container"> -->
    <div class="table-responsive-md">
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">ID </th>
                  <th scope="col">Name</th>
                  <th scope="col">Email </th>
                  <th scope="col">password</th>
                  <th scope="col">date created</th>
                  <th scope="col">date last login</th>
                </tr>  
            </thead>  
            <tbody>
                <tr>
                  <th scope="row"><?php echo $_SERVER['REMOTE_ADDR'] ?></th>
                  <td><?php echo $_SESSION['fullName'] ;?> </td>
                  <td><?php echo $_SESSION['email'] ;?></td>
                  <td><?php echo $_SESSION['password'] ;?></td>
                  <td><?php echo $_SESSION['date_creat'] ;?></td>
                  <td><?php echo $_COOKIE['fullName']; ?></td>
                </tr>
              </tbody> 
        </table>
      </div>
    <!-- </div> -->
</body>
</html>