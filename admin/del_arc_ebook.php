<?php

include('../include/dbcon.php');

$get_id = $_GET['archive_id'];

mysqli_query($con, "delete from e_archieve where archive_id = '$get_id' ") or die(mysqli_error($con));
echo "<script>alert('Successfully deleted!');history.go(-1);</script>";
