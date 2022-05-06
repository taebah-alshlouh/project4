<?php
session_start();
$_SESSION["logIn"]=$_POST["logIn"];
$_SESSION["signUp"]=$_POST["signUp"];
if(isset($_SESSION["logIn"]) == true) {
   header("location:http://localhost/project4/login/Login.php");
}
elseif(isset($_SESSION["signUp"]) == true){
    header("location: http://localhost/project4/signup/SignUp.php");
}

?>
