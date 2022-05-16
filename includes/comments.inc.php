<?php

function setComments($conn){
    if(isset($_POST['comment_submit'])){
        $user = $_POST['user'];
        $reference = $_POST['reference'];
        $message = $_POST['message'];
        $zero = 0;
        
        if(strcmp($user, "commenter") == 0){
            echo "<h2>need to be able to sign in if you want to post</h2>";
            exit();
        }

        $sql = "INSERT into replies (upvotes, downvotes,
        referenced_post, comment_by, body) 
        values (?, ?, ?, ?, ?)";
    
        // $date = date('Y-m-d H:i:s');
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../post_stats.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "iiiss", $zero, $zero, $reference, $user, $message);
        mysqli_stmt_execute($stmt);
        echo "<meta http-equiv='refresh' content='0'>";
        mysqli_stmt_close($stmt);
    }

}

function update_upvotes($conn){
    if(isset($_POST['up_submit'])){
        $post_id = $_POST['post_id'];
        $username = $_SESSION["username"];
        $tally = $_POST['tally'];

        $sql = "UPDATE posts
        set upvotes=upvotes+1
        where post_id = $post_id";
    
        $sql2 = "UPDATE users_tally
        set post_upvotes=post_upvotes+1
        where username = '$username'";

        $sql3 = "UPDATE users_tally
        set brew_tally=brew_tally+1
        where username = '$username'";
        

        $queries = [
            $sql,
            $sql2,
            $sql3,
        ];

        // Execute the multiple SQL queries
        foreach ($queries as $query) {
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }   
}

function update_downvotes($conn){
    if(isset($_POST['down_submit'])){
        $post_id = $_POST['post_id'];
        $username = $_SESSION["username"];

        $sql = "UPDATE posts
        set upvotes=upvotes-1
        where post_id = $post_id";
    
        $sql2 = "UPDATE users_tally
        set post_upvotes=post_upvotes-1
        where username = '$username'";

        $sql3 = "UPDATE users_tally
        set brew_tally=brew_tally-1
        where username = '$username'";

        $queries = [
            $sql,
            $sql2,
            $sql3,
        ];

        // Execute the multiple SQL queries
        foreach ($queries as $query) {
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }   
}

function update_upreply($conn){
    if(isset($_POST['rup_submit'])){
        $r_id = $_POST['r_id'];
        $username = $_SESSION["username"];

        $sql = "UPDATE replies
        set upvotes=upvotes+1
        where r_id = $r_id";
    
        $sql2 = "UPDATE users_tally
        set answer_upvotes=answer_upvotes+1
        where username = '$username'";

        $sql3 = "UPDATE users_tally
        set brew_tally=brew_tally+1
        where username = '$username'";

        $queries = [
            $sql,
            $sql2,
            $sql3,
        ];

        // Execute the multiple SQL queries
        foreach ($queries as $query) {
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }   
}

function update_downreply($conn){
    if(isset($_POST['rdown_submit'])){
        $r_id = $_POST['r_id'];
        $username = $_SESSION["username"];

        $sql = "UPDATE replies
        set upvotes=upvotes-1
        where r_id = $r_id";
    
        $sql2 = "UPDATE users_tally
        set answer_upvotes=answer_upvotes-1
        where username = '$username'";

        $sql3 = "UPDATE users_tally
        set brew_tally=brew_tally-1
        where username = '$username'";

        $queries = [
            $sql,
            $sql2,
            $sql3,
        ];

        // Execute the multiple SQL queries
        foreach ($queries as $query) {
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo "<meta http-equiv='refresh' content='0'>";
        }

        // $sql = "UPDATE posts
        // set upvotes=upvotes-1
        // where post_id = $post_id";
    
        // if ($conn->query($sql) === TRUE) {
        //     echo "<meta http-equiv='refresh' content='0'>";
        //   } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }
    }   
}