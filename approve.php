<?php
session_start();
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in']!==true){
    header("Location: admin-login.php");
    exit;
}

$conn = new mysqli("localhost","root","","payments");
$id = $_GET['id'];
$conn->query("UPDATE utr_requests SET status='approved' WHERE id=$id");
echo "✅ Approved! <a href='admin.php'>Back</a>";
?>
