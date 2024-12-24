<?php
    require('inc/essentials.php');
    require('inc/dp_config.php');

    session_start();
    session_destroy();
    redirect('index.php');
?>