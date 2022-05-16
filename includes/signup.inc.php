<?php

if(isset($_POST['submit'])){
    // initializing variables via superglobals
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    // $city = $_POST["city"];
    // $state = $_POST["state"];
    // $zip = $_POST["zip"];

    $email = $_POST['email'];
    $password = $_POST['password'];
    $rptpassword = $_POST['rptpassword'];
    
    $profile = $_POST['profile'];

    //necessary files for main implementation
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //listing functions to catch errors
    if(empty_inputs($first_name, $last_name, $username, 
    $email, $password, $rptpassword, $profile) !== false){
        //use url to pass error code
        header("location: ../signup.php?error=emptyinput");
        exit();    
    }

    //for username invalid
    if(invalid_username($username) !== false){
        //use url to pass error code
        header("location: ../signup.php?error=invalidusername");
        exit();    
    }
    //for email invalid ex. missing @
    if(invalid_email($email) !== false){
        //use url to pass error code
        header("location: ../signup.php?error=invalidemail");
        exit();    
    }

    //password repeat match
    if(pwd_match($password, $rptpassword) !== false){
        //use url to pass error code
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();    
    }

    //if username already exists
    if(user_exists($conn, $username) !== false){
        //use url to pass error code
        header("location: ../signup.php?error=usernametaken");
        exit();    
    }

    //create user function
    create_user($conn, $username, $email, $first_name, 
    $last_name, $password, $profile);
}
else{
    header("location: ../signup.php");
    exit();
}