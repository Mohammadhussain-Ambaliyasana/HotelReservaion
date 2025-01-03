<?php

require('../admin/inc/dp_config.php');
require('../admin/inc/essentials.php');

date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['check_availability']))
{
    $frm_data = filteration($_POST);
    $status = "";
    $result = "";

    // check in and out validations 

    $today_date = new DateTime(date("Y-m-d"));
    $checkin_date = new DateTime($frm_data['check_in']);
    $checkout_date = new DateTime($frm_data['check_out']);

    if($checkin_date == $checkout_date){
        $status = 'check_in_out_equal';
        $result = json_encode(["status"=>$status]);
    }
    else if($checkout_date < $checkin_date){
        $status = 'check_out_earlier';
        $result = json_encode(["status"=>$status]);
    }
    else if($checkin_date < $today_date){
        $status = 'check_in_earlier';
        $result = json_encode(["status"=>$status]);
    }

    // check booking availability if status is blank else return error 

    if($status!=''){
        echo $result;
    }
    else{
        session_start();
        $_SESSION['room'];

        // run query to check room is available or not 

        $count_days = date_diff($checkin_date,$checkout_date)->days;
        $payment = $_SESSION['room']['price'] * $count_days;

        $_SESSION['room']['payment'] = $payment;
        $_SESSION['room']['available'] = true;

        $result = json_encode(["status"=>'available', "days"=>$count_days, "payment"=>$payment]);
        echo $result;
    }

}

if(isset($_POST['pay_now']))
{
    $uid = $_POST['uid'];
    $rid = $_POST['rid'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $amt = $_POST['amt'];

    $query = "INSERT INTO `booking_order`(`room_id`, `user_id`, `check_in`, `check_out`, `trans_amt`) VALUES ('$rid','$uid','$checkin','$checkout','$amt')";
    $res = mysqli_query($con,$query);
    
    if($res){
        redirect('../bookings.php');
    }
    else{
        redirect('../confirm_bookings.php');
    }

}

?>