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
    <title>Admin Panel - BOOKED ROOMS</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">BOOKED ROOMS</h3> 

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">

                    <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                        <table class="table table-hover border text-center">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Check In</th>
                                    <th scope="col">Check Out</th>
                                    <th scope="col">Booked Date</th>
                                </tr>
                            </thead>
                            <tbody id="room-data">
                                <?php 

                                    $i = 1;
                                    $query = selectAll('booking_order');
                                    while($res = mysqli_fetch_assoc($query)){
                                        $uq = select("SELECT `name` FROM `user_cred` WHERE `id`=?",[$res['user_id']],'i');
                                        $ures = mysqli_fetch_assoc($uq);

                                        $rq = select("SELECT `name` FROM `rooms` WHERE `id`=?",[$res['room_id']],'i');
                                        $rres = mysqli_fetch_assoc($rq);
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $ures['name']; ?></td>
                                                <td><?php echo $rres['name']; ?></td>
                                                <td><?php echo $res['trans_amt']; ?></td>
                                                <td><?php echo $res['check_in']; ?></td>
                                                <td><?php echo $res['check_out']; ?></td>
                                                <td><?php echo $res['datentime']; ?></td>
                                            </tr>
                                        <?php
                                        $i++;
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                            

                </div>
            </div>

        </div> 
    </div>
</div>


<?php require('inc/scripts.php'); ?>
<script src="scripts/rooms.js"></script>

</body>
</html>