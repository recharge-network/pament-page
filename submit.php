<?php
$conn = new mysqli("localhost","root","","payments");
$utr = $_POST['utr'];
$userid = $_POST['userid'];
$conn->query("INSERT INTO utr_requests (userid,utr,status) VALUES ('$userid','$utr','pending')");
echo "ok";
?>
