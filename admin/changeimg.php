<?php  

include ("db.php");

session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}

if(isset($_POST['submit'])){

    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_temp_loc = $_FILES['file']['tmp_name'];
    $file_save_loc = "../gallary/".$file_name;

    if($file_type=="image/png" or $file_type=="image/jpg" or $file_type=="image/jpeg") {
        $upl_img = move_uploaded_file($file_temp_loc, $file_save_loc);

        if($upl_img){
            $qry = "INSERT INTO img(name) VALUES ('$file_name')";
            $runqry = mysqli_query($con, $qry);
            if($runqry){
                ?>
                <script>
                    alert ("Image Uploaded!");
                </script>
            <?php
            }
        }else{
            ?>
                <script>
                    alert ("Error In Uploading!");
                </script>
            <?php
        }
    }else{
        ?>
                <script>
                    alert ("Please Uploade File Which Is Image Only With Extention Of PNG,JPG,JPEG");
                </script>
            <?php
    }

}


?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUNRISE HOTEL</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->

    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
    <div id="wrapper">

        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">
                    <?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                    </li>
                    <li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Room Booking</a>
                    </li>
                    <li>
                        <a href="Payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    <li>
                        <a href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
                    <li>
                        <a class="active-menu" href="changeimg.php"><i class="fa fa-qrcode"></i> Change Images</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>




            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Change images <small>in gallary</small>
                        </h1>
                    </div>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="addpic">
                        <input type="file" name="file" class="file" value="Add New Image"><br>
                        <input type="submit" name="submit" class="submit" value="Add Image">
                    </div>
                </form>

                <br><br><br><br>

                <div class="tablediv">
                    <table class="dettable">
                        <thead class="thead">
                            <tr>
                                <th class="th th1">Images</th>
                                <th class="th th2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">

                            <?php

                            $selectqry = "SELECT * From img";
                            $sltqry = mysqli_query($con,$selectqry);
                            $num = mysqli_num_rows($sltqry);

                            while ($res = mysqli_fetch_array($sltqry)) {

                                ?>
                                    
                                <tr class="tbodytr">
                                    <td class="pic det">
                                        <div class="picimg">
                                            <img src="../gallary/<?php echo $res['name']; ?>" alt="Image" class="detimg">
                                        </div>
                                    </td>
                                    <td class="act det">
                                        <div class="fadivcont">
                                            <div class="fadiv trash">
                                                <a href="delete.php?Id=<?php echo $res['id'] ?>&name=<?php echo $res['name'] ?>">
                                                    <div><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></div>
                                                    <div>Delete</div>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                            }
                        ?>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>







    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>