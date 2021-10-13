<?php //include("config.php") ?>

<html>
<head>
<link id="stylecall" rel="stylesheet" href="css/bootstrap.css" />
<link rel='stylesheet' href='css/ncss.css' />

<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/myjs.js"></script>
</head>
<body>

<body onload="showClock()">

<?php include 'menu-data.php';//echo print_r($_SESSION);?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="usdnam" name="usdnam" class="form-control" />
                      <label class="form-label" for="usdnam">User Name</label>
                    </div>
                  </div>
                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="usdfnam" name="usdfnam" class="form-control" />
                      <label class="form-label" for="usdfnam">First Name</label>
                    </div>
                  </div>
                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="usdlnam" name="usdlnam" class="form-control" />
                      <label class="form-label" for="usdlnam">Last Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="usdemail" name="usdemail" class="form-control" />
                      <label class="form-label" for="usdemail">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password1" name="password1" class="form-control" />
                      <label class="form-label" for="password1">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password2" name="password2" class="form-control" />
                      <label class="form-label" for="password2">Repeat your password</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input
                      class="form-check-input me-2"
                      type="checkbox"
                      value=""
                      id="usdagrement"
                      name="usdagrement"
                    />
                    <label class="form-check-label" for="usdagrement">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="userSubmit" class="btn btn-primary btn-lg">Register</button>
                    &nbsp;&nbsp;
                    <input type="button" class="btn btn-primary btn-lg" onclick="popupLogin()" value="Login">
                    
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
<?php
      if(isset($_SESSION["msg_error"])){
        echo "<script>alert('".$_SESSION["msg_error"]."')</script>";
        //session_unset($_SESSION["msg_error"]);
        unset ($_SESSION["msg_error"]);
      }
    ?>