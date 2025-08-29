<?php
session_start();
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in']!==true){
    header("Location: admin-login.php");
    exit;
}

$conn = new mysqli("localhost","root","","payments");
$res = $conn->query("SELECT * FROM utr_requests ORDER BY id DESC");

echo "<h2>Welcome Admin</h2>";
echo "<p><a href='logout.php'>🚪 Logout</a></p>";

while($r=$res->fetch_assoc()){
  echo "UserID: ".$r['userid']." | UTR: ".$r['utr']." | Status: ".$r['status']." ";
  if($r['status']=="pending"){
    echo "<a href='approve.php?id=".$r['id']."'>[Approve]</a>";
  }
  echo "<br>";
}
?>
