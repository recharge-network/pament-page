<?php
$conn = new mysqli("localhost","root","","payments");
$userid = $_GET['userid'];
$res = $conn->query("SELECT status FROM utr_requests WHERE userid='$userid' ORDER BY id DESC LIMIT 1");
$row = $res->fetch_assoc();
if($row){
  echo json_encode($row);
} else {
  echo json_encode(["status"=>"pending"]);
}
?>
