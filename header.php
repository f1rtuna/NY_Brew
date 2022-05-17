<!-- for header -->
<?php   
    // include(dirname(__DIR__).'/dbh.php');
    // include 'includes/dbh.inc.php';
?>

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet"> 
    <link rel = "stylesheet" href = "styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/3a34c0e717.js" crossorigin="anonymous"></script>
    <title>NY BREW</title>
</head>
<body>
    <!-- for the nav section -->
    <div class="topnav">
        <a class="active " id = "navbar__logo" href="index.php">
            <img src="./images/NY_Brew_logo.png" alt="logo">
        </a>
        <h4 class = "headline">WELCOME TO THE BREWERY</h4>
        <!-- see if user is logged in -->
        <?php
            if(isset($_SESSION["username"])){
                echo "<div class=login-container>";
                echo "<a href = './profile.php' class = active>Profile</a>";
                echo "<a href = './includes/logout.inc.php' class = active>Log Out</a>";
                echo "</div>";
            }
            else{
                echo "<div class=login-container>";
                echo "<a href = './login.php' class = active>Login</a>";
                echo "<a href = './signup.php' class = active>Sign-Up</a>";
                echo "</div>";
            }
        ?> 
    </div>