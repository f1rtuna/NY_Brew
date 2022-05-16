<?php
if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(empty_inputs_login($username, $password) !== false){
        //use url to pass error code
        header("location: ../login.php?error=emptyinput");
        exit();    
    }

    login_user($conn, $username, $password);

}
else{
    header("location: ../login.php");
    exit();
}