<header class="header-desktops" style="padding:0 ;margin-top:0 !important;">
    <div class="section__content section__content--p10" style="padding:0 !important;margin-top:0 !important;">
        <div class="container-fluid" style="padding:0;margin-top:0 !important;">
            <div class="header-wraps" style="padding:0 !important;margin-top:0;">
                <div class="header-wrap" style="padding:0 !important;margin-top:0 ;">

                    <div class="form">
                    <form class="form-header" name="search" action="search-visitor.php" method="post">
                        <input class="au-input au-input--s" type="text" name="searchdata" id="searchdata"
                            placeholder="Search by names &amp; mobile number..." />
                        <button class="au-btn--submit" type="submit" name="search">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                    </div>
                   
                    <div class="header-button">
                        <div class="noti-wrap">
                            <?php
                                $adminid=$_SESSION['cvmsaid'];
                                $ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adminid'");
                                $row=mysqli_fetch_array($ret);
                                $name=$row['AdminName'];

                                ?>

                        </div>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="images/icon/avatar-02.png" alt="acc thumb" style="border-radius:50%" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $name; ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="images/icon/avatar-02.png" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?php echo $name; ?></a>
                                            </h5>

                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="admin-profile.php">
                                                <i class="zmdi zmdi-account"></i>Admin Profile</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="change-password.php">
                                                <i class="zmdi zmdi-settings"></i>Change Password</a>
                                        </div>

                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="logout.php">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</header>