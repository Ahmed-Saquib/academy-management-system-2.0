<?php
if (isset($_POST['submit'])){
      $uid=$_POST["uid"];
      $uname=$_POST["uname"];
      $password=$_POST["password"];
}else{
      session_start();
      if(!isset($_SESSION['uid'])){
            if(isset($_COOKIE['uid'])) {
            $postUserID=$_COOKIE['uid'];
            $conn=mysqli_connect("localhost","root","","school");
            // Check connection
            if (mysqli_connect_errno()){
                  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $sqlUser="SELECT studentpass,username from account where studentid='$postUserID'";
            $result=mysqli_query($conn,$sqlUser);
            if (mysqli_connect_errno()){
                  echo "Failed to retrieve data: " . mysqli_connect_error();
            }
            while($row=mysqli_fetch_array($result)){
                    $postUserPass=$row['studentpass'];
                    $postUserName=$row['username'];
             }

             $_SESSION['uid']=$postUserID;
             $_SESSION['uname']=$postUserName;
             $_SESSION['password']=$postUserPass;
             $n=$_SESSION['uid'];
            $conn=mysqli_connect("localhost","root","","school");
      // Check connection
            if (mysqli_connect_errno()){
          //echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }


            $sqlUser="SELECT usertype from account where studentid='$n'";
            $result=mysqli_query($conn,$sqlUser);
            if (mysqli_connect_errno()){
                echo "Failed to retrieve data: " . mysqli_connect_error();
            }
            while($row=mysqli_fetch_array($result)){
            if($row['usertype']==1){
                echo "<script>window.location.href = 'student-homepage.php';</script>";
            }else{
                echo "<script>window.location.href = 'admin-homepage.php';</script>";
             }
         }
      }
      }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Academia Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                  </div>
                  <form class="user"method="post" action="validation.php">
                    <div class="form-group">
                      <input type="text"  name="uid" class="form-control form-control-user" id="uid"  placeholder="ID"required>
                    </div>
                    <div class="form-group">
                    <input type="text"  name="uname" class="form-control form-control-user" id="Name"  placeholder="Name"required>
                    </div>
                    <div class="form-group">
                    <input type="password"  name="password" class="form-control form-control-user" id="password"  placeholder="Password"required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary btn-user btn-block">
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
