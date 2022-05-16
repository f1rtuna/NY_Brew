<?php 
    include_once 'header.php';
?>

<!-- <section class = "signup">
    <h2>Sign Up</h2>
    <form action="signup.inc.php" method = "post">
        <input type="text" name = "first_name" placeholder="First Name">
        <input type="text" name = "last_name" placeholder="Last Name">
        <input type="text" name = "username" placeholder="username">
        <input type="password" name = "password" placeholder="password">
        <input type="password" name = "password_rpt" placeholder="repeat password">
        <input type="text" name = "city" placeholder="city/hometown">
        <input type="text" name = "country" placeholder="country">
        <input type="date" name = "date_of_birth" placeholder="date of birth">
        <input type="text" name = "profile" placeholder="have an introduction?">

        <button type = "submit" name = "submit">Sign Up</button>
    </form>
</section> -->



<section class="vh-65" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <?php
                  //check for super-global error and display accordingly
                  if(isset($_GET["error"])){
                    if($_GET["error"] == "none"){
                      echo "<p>Congrat's you have signed up, login here</p>";
                    }
                    else if($_GET["error"] == "emptyinput"){
                      echo "<p>Fill in all fields</p>";
                    }
                    else if($_GET["error"] == "invalidusername"){
                      echo "<p>username not valid\n
                            Allowable characters: a-zA-Z0-9</p>";
                    }
                    else if($_GET["error"] == "invalidemail"){
                      echo "<p>email not valid</p>";
                    }
                    else if($_GET["error"] == "passwordsdontmatch"){
                      echo "<p>passwords don't match</p>";
                    }
                    else if($_GET["error"] == "usernametaken"){
                      echo "<p>username already exists, please choose a different one</p>";
                    }
                    else if($_GET["error"] == "stmtfailed"){
                      echo "<p>Something went wrong, Please try again</p>";
                    }
                  }
                ?>
                <form class="mx-1 mx-md-4" action = "includes/signup.inc.php" method = "post">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <!-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> -->
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name= "first_name" placeholder="first name"/>
                      <input type="text" id="form3Example1c" class="form-control" name= "last_name" placeholder="last name"/>
                      <input type="text" id="form3Example1c" class="form-control" name= "username" placeholder="username"/>
                    </div>
                  </div>
                  
                  <div class="form-row">
                        <div class="form-group col-md-6">
                        </div>
                    </div>
                  <br>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name = "email"/>
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name = "password"/>
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name = "rptpassword"/>
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <!-- <i class="fas fa-user fa-lg me-3 fa-fw"></i> -->
                    <!-- <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name= "profile"/>

                      <label class="form-label" for="form3Example1c">Tell us about yourself :)</label>
                    </div> -->
                    <div class="form-group shadow-textarea">
                        <i class="fas fa-solid fa-info"></i>
                        <label for="exampleFormControlTextarea6">Profile</label>
                        <textarea type = "text" class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Tell us about yourself..." name = "profile"></textarea>
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name = "submit" class="btn btn-primary btn-lg">Sign-Up</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="images/skyline.jpg"
                  class="img-fluid" alt="skyline">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

