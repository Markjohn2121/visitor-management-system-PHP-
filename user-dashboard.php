<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid'] == 0)) {
    header('location:logout.php');
} else {

    //For deleting pass

    if (isset($_GET['vid'])) {
        $vid = intval($_GET['vid']);
        $sql = mysqli_query($con, "delete from tblvisitor where id='$vid'");
        echo "<script>alert('Visitor pass deleted');</script>";
        echo "<script>window.location.href = 'manage-newvisitors.php'</script>";
    }



    //For update remark pass

    if (isset($_GET['remarkid'])) {
        $remark = intval($_GET['remarkid']);
        $query = mysqli_query($con, "update tblvisitor set remark='out' where  ID='$remark'");


        if ($query) {
            $msg = "Visitors Remark has been Updated.";
        } else {
            $msg = "Something Went Wrong. Please try again";
        }



        // echo "<script>alert('Thank you came again');</script>";
        //  echo "<script>window.location.href = 'manage-newvisitors.php'</script>";
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
        <title>CVMS Visitors</title>

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
            /* .side-div{
                display: none !important;
            
            } */
            .page-wrapper {
            grid-template-columns: 5fr !important;
            grid-template-areas: 'main  main' !important;
            /* background-color: #141414 !important; */
        }
        .side-div {
            display: none !important;
        }
        .page-container {
            grid-area: 1 / 1 !important;
            z-index: 1;
        }
        .account-wrap{
            display: none !important;
        }
        </style>
    </head>

    <body class="animsition" style="height:100vh;">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <?php include_once('includes/sidebar.php'); ?>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->

            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <div class="header-con">
                    <?php include_once('includes/header.php'); ?>


                </div>
                <!-- END HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <!-- <br>
            <br>
            <br> -->
                <div class="main-content">




                    <div class="">





                        <div class="">




                            <div class="">




                                <div class="newVisitTable-con">
                                <h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">WELCOME</h1>
        <h2 style="font-family:Impact, Haettenschweiler,">New Visitor's for Today</h2>

                                    <div class="newVisitTable" style="text-align:left; ">
                                    
                                    <a href="user-visitors-form.php" class="btn btn-primary fa fa-user" style="color: aqua;margin-bottom:1em; border-radius:1em; padding:1em;">

                                            <button >New Visitor</button>
                                        </a>

                                    </div>


                                    <div class="table-con table-responsive " style="height:70vh;overflow:auto">
                                        <table class="table table-bordered table-hover  table-md " style="">
                                            <thead class="table-dark" >
                                                <tr>

                                                    <th>S.NO</th>

                                                    <th>Full Name</th>

                                                    <th>Contact Number</th>
                                                    <th>Email</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <?php
                                            $ret = mysqli_query($con, "select *from tblvisitor where date(EnterDate)=CURDATE() ORDER BY ID ");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($ret)) {

                                            ?>
                                                <tbody class="table-group-divider">
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>

                                                        <td><?php echo $row['FullName']; ?></td>

                                                        <td><?php echo $row['MobileNumber']; ?></td>
                                                        <td><?php echo $row['Email']; ?></td>
                                                        <td><a href="user-visitor-detail.php?editid=<?php echo $row['ID']; ?>" title="View Full Details"><i class="fa fa-file fa-1x"></i></a> |

                                                            <a href="manage-newvisitors.php?vid=<?php echo $row['ID']; ?>" onclick="return confirm('Do you really want to Delete ?');" title="Delete the record"><i class="fa fa-trash fa-1x" style="color:red;"></i></a> |

                                                            <!-- out visitor -->

                                                            <?php if ($row['remark'] == "") { ?>
                                                                <a href="manage-newvisitors.php?remarkid=<?php echo $row['ID']; ?>" title="Visitors Time Out"><i class="fa fa-check-box fa-1x btn btn-success " style=" font-size:sma;font-weight:bolder; padding:4px;">OUT</i></a>



                                                            <?php } else { ?>

                                                            <?php } ?>




                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php
                                                $cnt = $cnt + 1;
                                            } ?>
                                        </table>
                                    </div>
                                </div>

                            </div>



                            <!-- <?php include_once('includes/footer.php'); ?> -->
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
<?php }  ?>