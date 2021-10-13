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
<?php //print_r($_SESSION)?>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create Blog</p>

                <form class="mx-1 mx-md-4" method="POST" action="createblog.php"  enctype="multipart/form-data">

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="blog_header" name="blog_header" class="form-control" value="<?php if(isset($blog->blog_header)) echo $blog->blog_header;?>"/>
                      <label class="form-label" for="blog_header">Blog Header</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <select name="blog_cat" id="blog_cat" style="width: 375px">
                            <option value="1">Category 1</option>
                        </select>
                      <label class="form-label" for="blog_cat">Blog Category</label>
                    </div>
                  </div>
                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">                      
                    <textarea id="blog_des" name="blog_des" rows="4" cols="50"><?php if(isset($blog->blog_des)) echo $blog->blog_des;?></textarea>
                      <label class="form-label" for="blog_des">Description</label>
                    </div>
                  </div>
                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="file" id="customFile" name="customFile">
                      <label class="form-label" for="customFile">Blog Image</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <button type="submit" name="saveBlog" class="btn btn-primary btn-lg">SAVE</button>
                  &nbsp;&nbsp;
                  <input type="button" class="btn btn-primary btn-lg" onclick="window.location.replace('index.php');" value="CLOSE">
                  </div>

                </form>

              </div>
              <!--
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">

              </div>
-->
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