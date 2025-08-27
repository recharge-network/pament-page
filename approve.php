<?php
$conn = new mysqli("localhost","root","","payments");
$id = $_GET['id'];
$conn->query("UPDATE utr_requests SET status='approved' WHERE id=$id");
echo "✅ Approved! <a href='admin.php'>Back</a>";
?>
