<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title']; ?> - ALL BOOKING</title>

  <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
</head>

<body class="bg-light">

  <?php require('inc/header.php'); ?>

  <?php

    // check login shutdown conditions

    if(!(isset($_SESSION['login']) && isset($_SESSION['login'])==true)){
      redirect('rooms.php');
    }

    $room_res = select("SELECT * FROM `booking_order` WHERE `user_id` = ? ORDER BY `booking_id` DESC",[$_SESSION['uId']],'i');

    if(mysqli_num_rows($room_res)==0){
      redirect('rooms.php');
    }

    
  ?>

  <div class="container">
    <div class="row">

      <div class=" col-12 my-5 mb-4 px-4">
        <h2 class="fw-bold">ALL BOOKING</h2>
      </div>

        <?php 

            while($res = mysqli_fetch_assoc($room_res)){

                ?><div class="col-lg-7 col-md-12 px-4"><?php
                    
                     
                        $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                        $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` WHERE `room_id`='$res[room_id]' AND `thumb`='1'");

                        if(mysqli_num_rows($thumb_q)>0)
                        {
                        $thumb_res = mysqli_fetch_assoc($thumb_q);
                        $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                        }

                        echo<<<data
                        <div class="card p-3 shadow-sm rounded">
                            <img src="$room_thumb" class="img-fluid rounded mb-3">
                        </div><br><br>
                        data;
                    ?>

                </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                <form action="ajax/confirm_booking.php" id="booking_form" method="post">
                    <h6 class="mb-3">BOOKING DETAILS</h6>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" value="<?php echo $_SESSION['uName'];?>" class="form-control shadow-none" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone Number</label>
                        <input name="phonenum" type="number" value="<?php echo $_SESSION['uPhone'];?>" class="form-control shadow-none" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control shadow-none" rows="1" readonly><?php echo $_SESSION['uAddress'];?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Check-In</label>
                        <input name="checkin" value="<?php echo $res['check_in']?>" type="date" class="form-control shadow-none" readonly>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Check-Out</label>
                        <input name="checkout" value="<?php echo $res['check_out']?>" type="date" class="form-control shadow-none" readonly>
                    </div>
                    <div class="col-md-12">
                
                        <button name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" disabled>Amount Paid <?php echo $res['trans_amt']?></button>
                    
                    </div>
                    </div>
                </form>
                </div>
                </div>
            </div>
            <?php

            }
        ?>


    </div>
  </div>

  <?php require('inc/footer.php'); ?>

</body>

</html>