<?php 
    include_once 'header.php';
?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="background">
    <div class="body2">
        
        <div class="container">
            <div class="row">
                
                <div class="col-md-8 col-md-offset-2">
                    
                    <h1>Create post</h1>
                    
                    <form action="includes/create_post.inc.php" method="POST">    		    
                        <div class="form-group">
                            <label for="title">Title <span class="require">*</span></label>
                            <input type="text" class="form-control" name="title" />
                        </div>
                        <!-- <input type="text" name = "category" /> -->
                        <select name = "category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>category</option>
                            <option value="community amenities">community amenities</option>
                            <option value="free space">free space</option>
                            <option value="general">general</option>
                            <option value="health/fitness">health/fitness</option>
                            <option value="in unit">in unit</option>
                            <option value="perks">perks</option>
                            <option value="utilities">utilities</option>
                            <option value="other">other</option>
                        </select>
                        <!-- <input type="text" name = "complex_reference"/> -->
                        <select name = "complex_reference" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected >complex</option>
                            <option value="1">Highlander</option>
                            <option value="2">Lofty Towers</option>
                            <option value="3">Prestige</option>
                            <option value="4">City Heights</option>
                        </select>
                        <div class="form-group">
                            <label for="description">Post</label>
                            <textarea rows="5" class="form-control" name="posting" style='color: black;'></textarea>
                        </div>
                    
                        
                        <div class="form-group">
                            <button type="submit" name = "submit" class="btn btn-primary">
                                Post
                            </button>
                        </div>
                        <?php if(isset($_GET["error"])){
                                if($_GET["error"] == "none"){
                                    echo "<p>We've got your post!</p>";
                                }
                                else if($_GET["error"] == "emptyinput"){
                                    echo "<p>Fill in all fields</p>";
                                }
                                else if($_GET["error"] == "stmtfailed"){
                                    echo "<p>something went wrong try again</p>";
                                }
                            }
                            ?>
                        
                    </form>
                </div>		
            </div>
        </div>
    </div>
</div>

<?php  
    include 'footer.php'
?>