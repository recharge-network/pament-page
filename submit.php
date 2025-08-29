<?php
$conn = new mysqli("localhost","root","","payments");

$utr = $_POST['utr'];
$userid = $_POST['userid'];

// DB में save
$conn->query("INSERT INTO utr_requests (userid,utr,status) VALUES ('$userid','$utr','pending')");

// WhatsApp number
$phone = "917318432028"; 

// Message
$msg = "💳 New Payment Request%0A🔢 UserID: $userid%0A📌 UTR: $utr%0A⏳ Waiting for Admin Approval";

// Redirect WhatsApp
header("Location: https://wa.me/$phone?text=$msg");
exit;
?>
