<?php

include ("db.php");

$Id = $_GET['Id'];
$name = $_GET['name'];

unlink("../gallary/".$name);

$delqry = "DELETE FROM img WHERE id=$Id";
$dqry = mysqli_query($con,$delqry);

header('location:changeimg.php');

?>