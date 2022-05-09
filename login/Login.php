<?php

session_start();

    if (isset($_POST['submit'])){
        
        $_SESSION['loginEmail']=$_POST['email'];
        $_SESSION['loginPassword']=$_POST['password'];
        $adminEmail_correct=true;
        $adminPass_correct=true;
    
        foreach ($_SESSION['array'] as $value) {
            //Check  the email validation
                if($_SESSION['email']==($value['Email']||'taebah@gmail.com')){
                    $loginEmail_correct=true;}
                else{
                    $loginEmail_result="<span style=' color:red; font-size:1vw; margin-left:25%'>Invalid Email</span><br>";
                    $loginEmail_correct=false;}
            //Check the password validation
                if($_SESSION['password']==$value['Password']){
                    $loginPassword_correct=true;}
                else{
                    $loginPassword_result="<span style=' color:red; font-size:1vw; margin-left:25%'>Invalid Password</span><br>";
                    $loginPassword_correct=false;}
        }
        if($loginEmail_correct && $loginPassword_correct)
            header('location: http://localhost/project4/project4/php/welcome.php');
        else
        echo '<script language="javascript">';
        echo 'alert("Invalid email or password")'; 
        echo '</script>';
         
        //  Admin info check
        if($_SESSION['email']=="taebah@gmail.com"){
            if($_SESSION['password']== "Taebah*1234"){
                $adminEmail_correct=true;
                $adminPass_correct=true;
        
            }else{
                $loginPassword_result="<span style=' color:red; font-size:1vw; margin-left:25%'>Invalid Password</span><br>";
                $adminPass_correct=false;
            }
        }else{
            $loginEmail_result="<span style=' color:red; font-size:1vw; margin-left:25%'>Invalid Email</span><br>";
            $adminEmail_correct=false;
        }
        if ($adminEmail_correct && $adminPass_correct ){
            header('location:http://localhost/project4/project4/Admin.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Login page</title>
</head>
<body>
  <a href="../index.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z"/></svg></a>
  <div class="container login_div">
  <h1>Login</h1>
  <p id="login-paragraph1">Welcome Back! Login with your credentials </p>
    <form  method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="abc@gmail.com">
        <?php if(isset($loginEmail_result))
        {echo $loginEmail_result;}?>
      </div>
      <div class="mb-3">
        <label for="pass" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="pass" placeholder="Enter the password">
        <?php if(isset($loginPassword_result))
        {echo $loginPassword_result;}?>
      </div>
      <div class="mb-3">
        <input type="submit" class="btn btn-dark" name="submit" value="Login" id="btn-login">
      </div>
      <p id="login-paragraph2">Dont have an account?<span id="login-span"><a href="../signup/SignUp.php">Sign Up</a></span></p>
    </form>
  </div>
</body>
</html>