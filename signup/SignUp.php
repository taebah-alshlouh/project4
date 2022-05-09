<?php

session_start();


$name_regex="/^(?!(?:\S*\s){4})([a-zA-Z\'\s]+)$/";
$phone_regex="/[0-9]{14}/";
$email_pattern="/([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
$pass_regex="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";


if (isset($_POST['submit'])){
    $_SESSION['fullName']=$_POST['fullName'];
    $_SESSION['mobile']=$_POST['mobile'];
    $_SESSION['dateOfBirth']=$_POST['DOB'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['password']=$_POST['password'];
    $_SESSION['confirmPassword']=$_POST['confirmPassword'];
    $_SESSION['date_creation']=date("Y-m-d");
   

    // FullName check
    if(preg_match($name_regex,$_SESSION['fullName'])){///preg_match////return true or false////////
        $fullName_correct=true;
    }else{
        $fullName_result="<span style=' color:red; font-size:0.8vw; margin-left:20%;'>Invalid Name, your name should contain letters only,or contain four sections</span> <br>";
        $fullName_correct=false;
    }
    // mobile check
    if(preg_match($phone_regex,$_SESSION['mobile'])){
        $confirmmobile_correct=true;
    }
    else{
        $mobile_result="<span style=' color:red; font-size:1vw; margin-left:20%;'>Invalid Phone Number, phone number must consist of 14 digits</span> <br>";
        $confirmmobile_correct=false;
    }
    // date Of Birth check
    if((floor((time() - strtotime($_SESSION['dateOfBirth'])) / 31556926)) >16){
        $confirmDob_correct=true;
    }
    
    else{
        $dob_result="<span style=' color:red; font-size:1vw; margin-left:20%;'>you are too young to register</span> <br>";
        $confirmDob_correct=false;
    }

     //Email check
    if(preg_match($email_pattern,$_SESSION['email'])){
        $email_correct=true;
    }
    else{
        $email_result="<span style=' color:red; font-size:1vw; margin-left:20%;'>Invalid Email</span> <br>";
        $email_correct=false;
    }
    
	 //Password check
     if(preg_match($pass_regex,$_SESSION['password'])){
        $password_correct=true;
    }
    else{
        $password_result="<span style=' color:red; font-size:0.8vw; margin-left:20%;'>Invalid Password, the password shoud have: 8 characters at least,One uppercase letter,One lowercase letter,One digit,A special character </span> <br>";
        $paswword_correct=false;
    }
    
     //Confirm Password
     if(preg_match($pass_regex,$_SESSION['confirmPassword'])){
        if ($_SESSION['confirmPassword'] == $_SESSION['password']){
            $password_match=true;
            $confirmPassword_correct=true;
        }
        else{
            $password_match=false;
            $confirmPassword_result="<span style=' color:red; font-size:1vw; margin-left:20%;'>Password doesn't match</span> <br>";
        } 
    }
    else{
        $confirmPassword_result="<span style=' color:red; font-size:0.8vw; margin-left:20%;'>Invalid Password, the password shoud have: 8 characters at least,One uppercase letter,One lowercase letter,One digit,A special character </span> <br>";
        $confirmPaswword_correct=false;
    }  

    $_SESSION['array'];
    if(empty($_SESSION["array"])){
      $_SESSION["array"]= [];
    }
    
    if($fullName_correct && $confirmmobile_correct && $confirmDob_correct && $email_correct && $confirmPassword_correct){
        $user_Data=[
            'full Name'=> $_SESSION['fullName'],
            'Mobile Number'=> $_SESSION['mobile'],
            'Date Of Birth'=>$_SESSION['dateOfBirth'],
            'Email'=> $_SESSION['email'],
            'Password'=> $_SESSION['password'],
            'Password Confirmation'=> $_SESSION['confirmPassword'],
            'Create Date'=>$_SESSION['date_creation']
        ];
        array_push($_SESSION['array'],$user_Data);
        header('location: http://localhost/project4/project4/login/Login.php');
        exit();
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
    <title>Sign Up</title>
</head>
<body>
  <a href="../index.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z"/></svg></a>
  <div class="container login_div">
  <h1>Sign up</h1>
  <p id="signup-paragraph1">Create an Account ,It's free! </p>
    <form  method="post">
      <div class="mb-3">
        <label for="Full-name" class="form-label">Full name</label>
        <input type="text" class="form-control" name="fullName" value="<?php if(isset($_SESSION['fullName']))
        {echo $_SESSION['fullName'];}?>" id="Full-name" placeholder="Enter your name from four sections" required >
        <?php if(isset($fullName_result))
        {echo $fullName_result;}?>
      </div>
      <div class="mb-3">
        <label for="Mobile" class="form-label">Mobile</label>
        <input type="number" class="form-control" name="mobile" value="<?php if(isset($_SESSION['mobile']))
        {echo $_SESSION['mobile'];}?>" id="Mobile" placeholder="Enter your phone number" required>
        <?php if(isset($mobile_result))
        {echo $mobile_result;}?>
      </div>      
      <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="DOB" value="<?php if(isset($_SESSION['dateOfBirth']))
        {echo $_SESSION['dateOfBirth'];}?>" id="dob"  placeholder="DD-MM-YYYY" required>
        <?php if(isset($dob_result))
        {echo $dob_result;}?>
      </div>
    <div class="mb-3">
        <label for="Email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?php if(isset($_SESSION['email']))
        {echo $_SESSION['email'];}?>" id="Email" placeholder="abc@gmail.com" required>
        <?php if(isset($email_result))
        {echo $email_result;}?>
      </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="Password" required>
        <?php if(isset($password_result))
        {echo $password_result;}?>
      </div>

      <div class="mb-3">
        <label for="c-password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="confirmPassword" id="c-password" required>
        <?php if(isset($confirmPassword_result))
        {echo $confirmPassword_result;}?>
      </div>
      <div class="mb-3">
        <input type="submit" class="btn btn-dark" name="submit" value="Sign Up" id="btn-login">
      </div>
      <p id="login-paragraph2">Already have an account?<span id="login-span"> <a href="../login/Login.php"> Login</a></span> </p>
    </form>
  </div>
</body>
</html>