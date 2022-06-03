<?php
include '../include/dbcon.php';

$query = $con->query("SELECT * FROM ebook WHERE ebook_id = '$_GET[ebook_id]'");
$row = $query->fetch_array();
$fileName = "../ebook/" . $row['file'];

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $fileName . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($fileName));
header('Accept-Ranges: bytes');
@readfile($fileName);
