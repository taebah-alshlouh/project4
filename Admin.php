<?php
session_start();
setCookie('fullName', date("m/d/y"), 60*24*60*60+time());//////time()=> Returns the current timestamp/////
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Admin.css">
    <title>Admin page</title>
</head>
<body>
    <!-- <div class="container"> -->
      <h2 style=" margin-left:42%; margin-top:2%;margin-bottom:2%;">Admain page</h2>
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
                    <?php
                     $id= 1;
                     foreach ($_SESSION['array'] as $value) {
                       echo "<tr>
                                 <td>".$id."</td>
                                 <td>".$value['full Name']."</td>
                                 <td>".$value['Email']."</td> 
                                 <td>".$value['Password']."</td> 
                                 <td>".$value['Create Date']."</td>
                                 <td>".$_COOKIE['fullName']."</td>
                            </tr>";  
                        $id++; }
                      ?>
              </tbody> 
        </table>
      </div>
    <!-- </div> -->

   <?php echo '<a href="index.html" style="color:#205375"> <input type="submit" class="btn btn-dark" name="logout" value="LogOut" style=" color:white; font-size:1vw; margin-left:45%; margin-top:5%"></a>'?>

</body>
</html>