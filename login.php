<?php 
    include_once 'header.php';
?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-99">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="images/NY_Brew_logo.png"
                alt="login icon" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action = "includes/login.inc.php" method = "post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Welcome</span>
                  </div>
                  <!-- for signup success -->
                  <?php
                  if(isset($_GET["error"])){
                    
                    //check for super-global error and display accordingly

                    if($_GET["error"] == "emptyinput"){
                        echo "<p>Fill in all fields</p>";
                    }
                    else if($_GET["error"] == "wronglogin"){
                        echo "<p>invalid credentials";
                    }
                    else if($_GET["error"] == "invalidemail"){
                        echo "<p>email not valid</p>";
                    }
                    else if($_GET["error"] == "nouser"){
                        echo "<p>user doesn't exist</p>";
                    }
                  }
                  ?>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text" name = "username" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name = "password" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name = "submit">Login</button>
                  </div>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="signup.php"
                      style="color: #393f81;">Register here</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
