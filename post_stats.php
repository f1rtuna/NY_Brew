<?php   
    include 'header.php';
    include 'includes/dbh.inc.php';
    include 'includes/comments.inc.php';
?>

<div class="background">
    <div class="body">


    <?php
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];
            $sql = "Select * from posts
            where post_id = '$pid';";
            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);

            if($queryResults > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<div class = main_post>
                            <h3>" . $row['title'] . "</h3>
                            <p>" .$row['post'] . "</p";
                        echo "<div class = under_post>";
                            echo "<div class = profile>";
                                echo '<i class="fa fa-user"></i>';
                                echo "<p>&nbsp;" . $row['post_by'] . "</p";
                                echo "<p>&nbsp; created:" . date('Y-m-d', strtotime($row['created'])) . 
                                    "&nbsp&nbsp; category:&nbsp" . $row['category'] . "</p";

                            echo "</div>";
                        echo "</div>";
                        if(isset($_SESSION["username"])){
                        echo "<div class = 'votes'";
                        echo "<p>upvotes: ". $row['upvotes']." </p>";
                        echo "<form method = 'POST' action= '". update_upvotes($conn)."'> 
                        <input type='hidden' name = 'post_id' value = ". $pid .">
                        <button name = 'up_submit'>like</button></form>";
                        echo "<form method = 'POST' action= '". update_downvotes($conn)."'> 
                        <input type='hidden' name = 'post_id' value = ". $pid .">
                        <button name = 'down_submit'>dislike</button></form>";
                        echo "</div>";}
                        else{
                            echo "<div class = 'votes'";
                            echo "<p>upvotes: ". $row['upvotes']." </p>";
                            echo "</div>";
                        }
                    echo "</div>";

                }
                
            }

            if(isset($_SESSION["username"])){
                $commenter = $_SESSION["username"];
            }
            else{
                $commenter = "commenter";
            }
            
    
                $replies_sql = "Select r.r_id, r.referenced_post, r.upvotes, r.downvotes, r.comment_by, r.body
                from replies r join posts p on r.referenced_post = p.post_id
                where r.referenced_post = '$pid';";
                $replies_result = mysqli_query($conn, $replies_sql);
                $replies_queryResults = mysqli_num_rows($replies_result);
        
                echo "<h4 class = 'container' 'col-sm-5 col-md-6 col-12 pb-4'>Comments</h4>";
                if($replies_queryResults > 0){
                    while ($reply = mysqli_fetch_assoc($replies_result)){
                        echo "<div class='container' style: 'pointer-events: none;'>
                            <div>";
                        echo "<div class='col-sm-5 col-md-6 col-12 pb-4' style: 'pointer-events: none' >";
                        echo "<div class='comment mt-4 text-justify float-left' style: 'pointer-events: none'>
                                <img src='images/coffee.png' alt='user' class='rounded-circle' width='40' height='40'>
                                <h4>" . $reply['comment_by']. "</h4>";
                        echo "<span> upvotes: ".$reply['upvotes'] ."</span>";
                        if(isset($_SESSION["username"])){
                            echo "<div class = 'votes'>";
                            echo "<form method = 'POST' action= '". update_upreply($conn)."'> 
                            <input type='hidden' name = 'r_id' value = ". $reply['r_id'] .">
                            <button name = 'rup_submit' style=' z-index:99999999999!important;'>like</button></form>";
                            echo "<form method = 'POST' action= '". update_downreply($conn)."'> 
                            <input type='hidden' name = 'r_id' value = ". $reply['r_id'] .">
                            <button name = 'rdown_submit' style=' z-index:99999999999!important;'>dislike</button></form>";
                            echo "</div>";}
                        echo "<p>" . $reply['body'] . "</p>
                        </div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                echo "<section>
                <div class='container'>
                    <div>
                        <div class='col-sm-5 col-md-6 col-12 pb-4'>
                            <form id='algin-form' method='POST' action= '". setComments($conn)."'>
                                <div class='form-group'>
                                    <input type='hidden' name = 'user' class='form-control' style='background-color: white;' value = '". $commenter ."'>
                                    <input type='hidden' name = 'reference' class='form-control' style='background-color: white;' value = ". $pid .">
                                    <textarea name='message' id=''msg cols='30' rows='5' class='form-control' style='background-color: white;'></textarea>
                                </div>
                                <div class='form-group'>
                                    <button name = 'comment_submit' type='submit' id='post' class='btn' style = 'background-color:beige;'>Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>";
        }
        else{
            echo "<h2> can't acess this page that way! </h2>";
        }
    ?>

            <!-- <section>
                <div class='container'>
                    <div>
                        <div class='col-sm-5 col-md-6 col-12 pb-4'>
                            <form id='algin-form' method='POST' action= "">
                                <div class='form-group'>
                                    <input type='hidden' name = 'user' class='form-control' style='background-color: white;' placeholder="username">
                                    <input type='hidden' name = 'reference' class='form-control' style='background-color: white;' placeholder="post reference(see post)">
                                    <textarea name='message' id=''msg cols='30' rows='5' class='form-control' style='background-color: white;' placeholder="comment"></textarea>
                                </div>
                                <div class='form-group'>
                                    <button name = 'comment_submit' type='submit' id='post' class='btn' style = 'background-color:beige;'>Post Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section> -->

    </div>
</div>




<!-- while ($reply = mysqli_fetch_assoc($replies_result)){
                        echo "<div class='container'>
                            <div>";
                        echo "<div class='col-sm-5 col-md-6 col-12 pb-4'>";
                        echo "<div class='comment mt-4 text-justify float-left'>
                                <img src='images/coffee.png' alt='user' class='rounded-circle' width='40' height='40'>
                                <h4>" . $reply['comment_by']. "</h4>
                                <span> upvotes: ".$reply['upvotes'] ."</span>
                                <br>";
                        if(isset($_SESSION["username"])){
                            echo "<div class = 'votes'";
                            echo "<form method = 'POST' action= '". update_upreply($conn)."'> 
                            <input type='hidden' name = 'r_id' value = ". $reply['r_id'] .">
                            <button name = 'rup_submit'>like</button></form>";
                            echo "<form method = 'POST' action= '". update_downreply($conn)."'> 
                            <input type='hidden' name = 'r_id' value = ". $reply['r_id'] .">
                            <button name = 'rdown_submit' >dislike</button></form>";
                            echo "</div>";}
                        echo "<p>" . $reply['body'] . "</p>
                        </div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    } -->