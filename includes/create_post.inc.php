<?php

if(isset($_POST['submit'])){
    // initializing variables via superglobals
    $title = $_POST["title"];
    $complex_reference = (int)$_POST["complex_reference"];
    $category = $_POST["category"];
    $zero = 0;
    $post_by = $_SESSION["username"];
    $post = $_POST["posting"];

    //necessary files for main implementation
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //listing functions to catch errors
    if(empty_post_inputs($title, $complex_reference, $category, 
    $post) !== false){
        //use url to pass error code
        header("location: ../create_post.php?error=emptyinput");
        exit();    
    }

    //create post function
    create_post($conn, $title, $complex_reference, $category, $post, $post_by, $zero);
}
else{
    header("location: ../create_post.php");
    exit();
}