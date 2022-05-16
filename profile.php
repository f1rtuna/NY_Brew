<?php   
    include 'header.php';
    include 'includes/dbh.inc.php';
?> 

<div class="background">
    <div class="body">
        <div class="card_details">
        <div class="card_title">
            <h2>Here is your profile Card!</h2>
        </div>
        <div class="container d-flex justify-content-center align-items-center">
                    
                    <div class="card">

                    <div class="upper">

                        <img src="images/skyline.jpg" class="img-fluid" id = "skyline">
                        
                    </div>

                    <div class="user text-center">

                        <div class="profile">

                        <img src="images/coffee.png" class="rounded-circle" width="80">
                        
                        </div>

                    </div>


                    <div class="mt-5 text-center">

                        <h4 class="mb-0"><?php echo $_SESSION["username"]?></h4>
                        <span class="text-muted d-block mb-2">NY Brew</span>


                        <div class="d-flex justify-content-between align-items-center mt-4 px-4">

                        <div class="stats">
                            <h5 class="mb-0">Brew Tally</h5>
                            <span><?php $username = $_SESSION["username"];
                            $sql = "select brew_tally from users_tally
                            where username = '$username'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo $row["brew_tally"];
                                }
                            } else {
                                echo "0";
                            }

                            ?></span>

                        </div>
                        <div class="stats">
                            <h5 class="mb-0">User Class:</h5>
                            <span><?php $username = $_SESSION["username"];
                            $sql = "select status_name from users_status
                            where username = '$username'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo $row["status_name"];
                                }
                            } else {
                                echo "0";
                            }

                            ?></span>

                        </div>
                        
                        </div>
                        
                    </div>
                    
                    </div>

                </div>
            </div>
    </div>
</div>