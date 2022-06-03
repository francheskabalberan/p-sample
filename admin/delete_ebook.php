<?php

include('../include/dbcon.php');

$get_id = $_GET['ebook_id'];
$query = $con->query("SELECT * FROM ebook WHERE ebook_id = '$get_id'");
$row = $query->fetch_array();
unlink("../ebook/" . $row['file']);
mysqli_query($con, "delete from ebook where ebook_id = '$get_id' ") or die(mysqli_error($con));
echo "<script>alert('Successfully deleted!');history.go(-1);</script>";
