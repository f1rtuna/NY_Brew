<?php   
    include 'header.php';
    include 'includes/dbh.inc.php';
?>               
    <div class="background">
        <div class="body">
            <!-- for the search section -->
            <!--Grid column-->
            <div class="search_or_post">
                <div class="col-md-6 mb-4">
                    <div class="input-group md-form form-sm form-1 pl-0">
                        <div class="input-group-prepend">
                        <span class="input-group-text purple lighten-3" id="basic-text1"></span>
                        </div>
                        <form class = "search" action="posts.php" method = "POST">
                            <input class="form-control my-0 py-1" type="text" name = "search" placeholder="Search" aria-label="Search">
                            <button type="submit" name = "submit-search" class="btn btn-secondary">Search</button>
                        </form>
                        
                    </div>
                </div>
                <div class="create_post">
                    <?php
                        if(isset($_SESSION["username"])){
                            echo "<div class=create>";
                            echo "<a class = create href='create_post.php'><h4>Create Post</h4></a>";
                            echo "</div>";
                        }
                        else{
                            echo "<div class=create>";
                            echo "<a class = create href='index.php?error=nocreatepost'><h4>Create Post</h4></a>";
                            echo "</div>";
                            if(isset($_GET["error"])){
                                if($_GET["error"] == "nocreatepost"){
                                echo "<p class = error>you can't create a post until you login</p>";
                                }
                            }
                        
                        }
                    ?>
                    <!-- <a href="#"><h4>Create Post</h4></a> -->
                </div>
            </div>
            

            <div class="communities">
                <div class="highlander">
                    <a href = 'index.php?unit=1'><h4>Highlander</h4></a>
                </div>
                <div class="lofty_towers">
                    <a href = 'index.php?unit=2'><h4>Lofty Towers</h4></a>
                </div>
                <div class="prestige">
                    <a href = 'index.php?unit=3'><h4>The Prestige</h4></a>
                </div>
                <div class="city_heights">
                    <a href = 'index.php?unit=4'><h4>City Heights</h4></a>
                </div>
                <div class="all">
                    <a href = 'index.php'><h4>All Complexes</h4></a>
                </div>
            </div>
            <div class="posts">
                <h3>Posts</h3>
                <?php
                    if(isset($_GET['unit'])){
                            $unit = $_GET['unit'];
                            if($unit == 1){
                                echo "<h3> community: Highlander </h4>";
                            }
                            else if($unit == 2){
                                echo "<h3> community: Lofty Towers </h4>";
                            }
                            else if($unit == 3){
                                echo "<h3> community: The Prestige </h4>";
                            }
                            else if($unit == 4){
                                echo "<h3> community: City Heights </h4>";
                            }
                            echo "<br>";
                            $sql = "Select * from posts
                            where complex_reference = '$unit'
                            order by created desc;";
                            $result = mysqli_query($conn, $sql);
                            $queryResults = mysqli_num_rows($result);

                            if($queryResults > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<div class = inner_post>
                                    <a href = 'post_stats.php?pid=" . $row['post_id']."'>
                                    <h4>" . $row['title'] . "</h4></a>
                                            <p>" .$row['post'] . "</p";
                                    // echo "<div class = inner_post>
                                    // <h4>" . $row['title'] . "</h4>
                                    // <p>" .$row['post'] . "</p";
                                    echo "<div class = under_post>";
                                        echo "<div class = profile>";
                                            echo '<i class="fa fa-user"></i>';
                                            echo "<p>&nbsp;" . $row['post_by'] . "</p";
                                            echo "<p>&nbsp; created:" . date('Y-m-d', strtotime($row['created'])) . 
                                                     "&nbsp&nbsp; category:&nbsp" . $row['category'] . "</p";
                                            
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<br class = none>";
                                }
                            }
                        
                    }
                    else{
                        echo "<h3> community: NY Brew</h4>";
                        echo "<br>";
                        $sql = "Select * from posts
                        order by created desc;";
                        $result = mysqli_query($conn, $sql);
                        $queryResults = mysqli_num_rows($result);

                        if($queryResults > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                echo "<div class = inner_post>
                                <a href = 'post_stats.php?pid=" . $row['post_id']."'>
                                <h4>" . $row['title'] . "</h4></a>" .$row['post'] . "</p";
                                // echo "<div class = inner_post>
                                //     <h4>" . $row['title'] . "</h4>
                                //     <p>" .$row['post'] . "</p";
                                    echo "<div class = under_post>";
                                        echo "<div class = profile>";
                                            echo '<i class="fa fa-user"></i>';
                                            echo "<p>&nbsp;" . $row['post_by'] . "</p";
                                            
                                            echo "<p>&nbsp; created:" . date('Y-m-d', strtotime($row['created'])) . 
                                            "&nbsp&nbsp; category:&nbsp" . $row['category'] . "</p";
                                        echo "</div>";

                                    echo "</div>";
                                echo "</div>";
                                echo "<br>";
                            }
                        }
                    }
                ?>

                
            </div>
        </div>
    </div>
    
    
<?php  
    include 'footer.php'
?>

