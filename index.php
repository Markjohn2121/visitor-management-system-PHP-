<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID,type from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
        if($ret['type']=='admin'){
            $_SESSION['cvmsaid']=$ret['ID'];
            $sds =$_SESSION['cvmsaid']; echo"<script>alert('$sds');</script>";
     header('location:dashboard.php');
        }else if($ret['type']=='user'){
            $_SESSION['cvmsaid']=$ret['ID'];
            // $sds =$_SESSION['cvmsaid']; echo"<script>alert('$sds');</script>";
            echo "<script>window.location.href = 'user-dashboard.php'</script>";


            

            

        }
      
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>VMS Login</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <style>
    .page-wrappers {
        background-image: url('images/icon/avatar3.png');
        background-size: contain;
        background-repeat: no-repeat;
        background-attachment: fixed;

        background-position: center;
        width: 100%;
        height: 100%;




    }

    .login-wraps {
        width: 100% !important;
        height: 100vh !important;
        /* margin: 100px auto; */
        /* background-color: red !important; */
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        /* background-color: black; */
        background: rgba(219, 200, 200, 0.34);
        border-radius: 16px;
        box-shadow: 50 4px 30px rgba(160, 200, 156, 14);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        -moz-backdrop-filter: blur(8px);
        -ms-backdrop-filter: blur(8px);
        -o-backdrop-filter: blur(8px);
        border: 1px solid rgba(0, 0, 0);


    }

    .login-content {
        position: relative;
        width: 40% !important;
        /* height: 50vh !important; */
        aspect-ratio: 5/2 !important;
        /* background-color: blue !important; */
        border-radius: 2em;
        display: flex;
        flex-direction: column;

        /* From https://css.glass */
        background: rgba(219, 200, 200, 0.34);
        border-radius: 16px;
        box-shadow: 50 4px 30px rgba(160, 200, 156, 14);
        backdrop-filter: blur(80px);
        -webkit-backdrop-filter: blur(80px);
        -moz-backdrop-filter: blur(80px);
        -ms-backdrop-filter: blur(80px);
        -o-backdrop-filter: blur(80px);
        border: 1px solid rgba(0, 0, 0);

    }

    .login-form {
        /* background-color: aqua; */
        position: relative;
        width: 80%;
        justify-content: center;
        align-items: center;
        align-self: center;
        justify-self: center;
        border-radius: 2em;
        /* filter: blur(5px); */

    }

    .sb {
        border-radius: 2em;
        background-color: blue;
    }

    input {
        border-radius: 2em !important;
        /* background-color:antiquewhite !important; */
        color: black !important;
    }

    label {
        color: black !important;
    }

    .forgot-pass {
        color: black !important;
        font-size: 12px !important;
        font-weight: bold !important;
        margin-top: 10px !important;
    }

    @media screen and (max-width: 720px) {
        .login-content {
            position: relative;
            width: 95% !important;
            /* height: 50vh !important; */
            /* aspect-ratio: 1/6 !important; */


        }
    }
    </style>
</head>

<body class="animsition">
    <div class="page-wrappers">
        <div class="page-contents>
            <div class=" container" style="width:100%;height:100vh!important; ">
            <div class="login-wraps">
                <div class="login-content">
                    <div class="login-logo">

                        <h3>Visitor Management System (VMS)</h3>


                    </div>
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                    <div class="login-form">
                        <form action="" method="post" name="login">
                            <div class="form-group">
                                <label>User Name</label>
                                <input class="au-input au-input--full" type="text" name="username"
                                    placeholder="User Name" required="true">
                            </div>xc
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password"
                                    placeholder="Password">
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <a class="forgot-pass" href="forgot-password.php">Forgotten Password?</a>
                                </label>
                            </div>
                            <button class=" sb au-btn au-btn--block au-btn--green m-b-10" type="submit"
                                name="login">sign in</button>
                            <div class="social-login-content">

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->