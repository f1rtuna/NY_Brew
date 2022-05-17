<?php

function empty_inputs($first_name, $last_name, $username, 
$email, $password, $rptpassword, $profile){
    //by default false 
    $to_return = false;
    if(empty($first_name) || empty($last_name) || empty($username) ||
    empty($email) || empty($password) || empty($rptpassword) || empty($profile)){
        $to_return = true;
    }
    return $to_return;
}

function invalid_username($username){
    //by default false 
    $to_return = false;
    //only allow these characters for username
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $to_return = true;
    }
    return $to_return;
}

//php built in valid email filter
function invalid_email($email){
    $to_return = false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $to_return = true;
    }
    return $to_return;
}

function pwd_match($password, $rptpassword){
    $to_return = false;
    if($password !== $rptpassword){
        $to_return = true;
    }
    return $to_return;
}

function user_exists($conn, $username){
    $to_return = false;
    //question mark for prepared statements
    //prevents sql injection attacks
    $sql = "select * from users where username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();    
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    //stored binded statement to results
    $results = mysqli_stmt_get_result($stmt);

    //assigns data to row while also checking boolean
    if($row = mysqli_fetch_assoc($results)){
        return $row;
    }
    else{
        //re-initialize just in case
        $to_return = false;
        return $to_return;
    }

    mysqli_stmt_close($stmt);
}

function create_user($conn, $username, $email, $first_name, 
$last_name, $password, $profile){
    //question mark for prepared statements
    //prevents sql injection attacks
    $sql = "INSERT INTO users (username, email,
    first_name, last_name, password, profile) 
    values (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    //could user password_hash for security but kee simple
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $first_name,
    $last_name, $password, $profile);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    $sql2 = "INSERT INTO users_status (username, date_of_status,
    status_name) 
    values (?, ?, ?);";
    $stmt2 = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt2, $sql2)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $decaf = "decaf";
    $date = date('Y-m-d H:i:s');
    //could user password_hash for security but kee simple
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $date, $decaf);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql3 = "INSERT INTO users_tally (username, answer_upvotes,
    post_upvotes, brew_tally) 
    values (?, ?, ?, ?);";
    $stmt2 = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt2, $sql2)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $zero = 0;
    
    //could user password_hash for security but kee simple
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "siii", $username, $zero, $zero, $zero);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();

}





//now for login
function empty_inputs_login($username, $password){
    //by default false 
    $to_return = false;
    if(empty($username) || empty($password)){
        $to_return = true;
    }
    return $to_return;
}

function login_user($conn, $username, $password){
    $username_exists = user_exists($conn, $username);

    if($username_exists === false){
        header("location: ../login.php?error=nouser");
        exit();
    }

    //if decided to do hashed password
    $password_provided = $username_exists['password'];

    if(strcmp($password_provided, $password) != 0){
        header("location: ../login.php?error=wronglogin");
    }
    else if(strcmp($password_provided, $password) == 0){
        //start session
        session_start();

        //creating superglobal for session
        $_SESSION["username"] = $username_exists["username"];
        header("location: ../index.php");
        exit();
    }

    //check if db password matches
    // $check_password = password_verify($password, $password_provided);

    // if($check_password === false){
    //     header("location: ../loogin.php?error=wronglogin");
    // }
    // else if($check_password === true){
    //     //start session
    //     session_start();

    //     //creating superglobal for session
    //     $_SESSION["username"] = $username_exists["username"];
    //     header("location: ../index.php");
    //     exit();
    // }
}


//for creating posts
function empty_post_inputs($title, $complex_reference, $category, $post){
    $to_return = false;
    if(empty($title) || empty($complex_reference) ||
    empty($category) || empty($post)){
        $to_return = true;
    }
    return $to_return;
}

function create_post($conn, $title, $complex_reference, $category, $post, $post_by, $zero){
    $sql = "INSERT INTO posts (title, post,
    complex_reference, category, upvotes, downvotes,
    post_by, created, post_score) 
    values (?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $date = date('Y-m-d H:i:s');
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../create_post.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssisiissi", $title, $post, $complex_reference,
    $category, $zero, $zero, $post_by, $date, $zero);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../create_post.php?error=none");
    exit();

}