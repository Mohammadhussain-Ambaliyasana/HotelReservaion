<?php
    require('inc/essentials.php');
    require('inc/dp_config.php');
    adminLogin();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require('inc/links.php'); ?>
    <style>
        .val{
            font-size: 90px;
        }
        
        .valprice{
            font-size: 60px;
        }
    </style>
</head>
<body class="bg-light">
    
<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
   <div class="row">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <div>
            <h3>DASHBOARD</h3><br>
        </div>


        <div class="container">
            <div class="row">
            <h5>Booking Analytics</h5><br><br>
                <div class="col-lg-3 col-md-6 mb-5 px-4 analytics">
                    <div class="bg-white text-primary align-items-center flex-column text-center d-flex justify-content-center rounded shadow p-4 border-4 border-dark pop">

                        <div class="val">
                            <?php
                                $sql = mysqli_query($con,"SELECT * FROM `booking_order`");
                                $row = mysqli_num_rows($sql);
                                echo $row;
                            ?>
                        </div>

                        <h5 class="d-flex align-items-center text-center mb-2 fw-b">
                            <b>Total Bookings</b>
                        </h5>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-5 px-4">
                    <div class="bg-white text-success align-items-center flex-column text-center d-flex justify-content-center rounded shadow p-4 border-4 border-dark pop">
                            
                            <div class="val">
                                <?php
                                    $sql = mysqli_query($con,"SELECT SUM(`trans_amt`) AS total_amount FROM `booking_order`");
                                    $row = mysqli_fetch_assoc($sql);
                                    $totalAmount = $row['total_amount'];
                                    echo '₹ '.$totalAmount;
                                ?>
                            </div>

                        <h5 class="d-flex align-items-center text-center mb-2 fw-b">
                            <b>Total Sales</b>
                        </h5>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-5 px-4">
                    <div class="bg-white text-warning align-items-center flex-column text-center d-flex justify-content-center rounded shadow p-4 border-4 border-dark pop">
                        <div>
                            
                            <div class="val">
                                <?php
                                    $sql = mysqli_query($con,"SELECT * FROM `user_cred`");
                                    $row = mysqli_num_rows($sql);
                                    echo $row;
                                ?>
                            </div>

                            <h5 class="d-flex align-items-center text-center mb-2 fw-b">
                                <b>Total Users</b>
                            </h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
            <h5>Rooms Analytics</h5><br><br>
                <div class="col-lg-4 col-md-6 mb-5 px-4 analytics">
                    <div class="bg-white text-success align-items-center flex-column text-center d-flex justify-content-center rounded shadow p-4 border-4 border-dark pop">

                        <div class="val">
                            <?php
                                $sql = mysqli_query($con,"SELECT SUM(`quantity`) AS total_rooms FROM `rooms`");
                                $row = mysqli_fetch_assoc($sql);
                                $totalAmount = $row['total_rooms'];
                                echo $totalAmount;
                            ?>
                        </div>

                        <h5 class="d-flex align-items-center text-center mb-2 fw-b">
                            <b>Total Rooms</b>
                        </h5>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white text-primary align-items-center flex-column text-center d-flex justify-content-center rounded shadow p-4 border-4 border-dark pop">
                            
                            <div class="val">
                                <?php
                                    $sql = mysqli_query($con,"SELECT SUM(`status`) AS total_active_rooms FROM `rooms`");
                                    $row = mysqli_fetch_assoc($sql);
                                    $totalAmount = $row['total_active_rooms'];
                                    echo $totalAmount;
                                ?>
                            </div>

                        <h5 class="d-flex align-items-center text-center mb-2 fw-b">
                            <b>Rooms Category</b>
                        </h5>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white text-danger align-items-center flex-column text-center d-flex justify-content-center rounded shadow p-4 border-4 border-dark pop">
                        <div>
                            
                            <div class="val">
                                <?php
                                    $sql = mysqli_query($con,"SELECT * FROM `rooms` WHERE `status`=0");
                                    $row = mysqli_num_rows($sql);
                                    echo $row;
                                ?>
                            </div>

                            <h5 class="d-flex align-items-center text-center mb-2 fw-b">
                                <b>Inactive Rooms</b>
                            </h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
            <h5>Users Analytics</h5><br><br>
                <div class="col-lg-3 col-md-6 mb-5 px-4 analytics">
                    <div class="bg-white text-primary align-items-center flex-column text-center d-flex justify-content-center rounded shadow p-4 border-4 border-dark pop">

                        <div class="val">
                        <?php
                                    $sql = mysqli_query($con,"SELECT * FROM `user_cred`");
                                    $row = mysqli_num_rows($sql);
                                    echo $row;
                                ?>
                        </div>

                        <h5 class="d-flex align-items-center text-center mb-2 fw-b">
                            <b>Total Users</b>
                        </h5>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-5 px-4">
                    <div class="bg-white text-success align-items-center flex-column text-center d-flex justify-content-center rounded shadow p-4 border-4 border-dark pop">
                            
                            <div class="val">
                                <?php
                                    $sql = mysqli_query($con,"SELECT SUM(`status`) AS active_users FROM `user_cred`");
                                    $row = mysqli_fetch_assoc($sql);
                                    $totalAmount = $row['active_users'];
                                    echo $totalAmount;
                                ?>
                            </div>

                        <h5 class="d-flex align-items-center text-center mb-2 fw-b">
                            <b>Active Users</b>
                        </h5>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-5 px-4">
                    <div class="bg-white text-warning align-items-center flex-column text-center d-flex justify-content-center rounded shadow p-4 border-4 border-dark pop">
                            
                            <div class="val">
                                <?php
                                    $sql = mysqli_query($con,"SELECT SUM(`is_verified`) AS active_users FROM `user_cred`");
                                    $row = mysqli_fetch_assoc($sql);
                                    $totalAmount = $row['active_users'];
                                    echo $totalAmount;
                                ?>
                            </div>

                        <h5 class="d-flex align-items-center text-center mb-2 fw-b">
                            <b>Verified Users</b>
                        </h5>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-5 px-4">
                    <div class="bg-white text-danger align-items-center flex-column text-center d-flex justify-content-center rounded shadow p-4 border-4 border-dark pop">
                        <div>
                            
                            <div class="val">
                                <?php
                                    $sql = mysqli_query($con,"SELECT * FROM `user_cred` WHERE `status`=0");
                                    $row = mysqli_num_rows($sql);
                                    echo $row;
                                ?>
                            </div>

                            <h5 class="d-flex align-items-center text-center mb-2 fw-b">
                                <b>Inactive Users</b>
                            </h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
   </div> 
</div>


<?php require('inc/scripts.php'); ?>
</body>
</html>