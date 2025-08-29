<?php
session_start();

// ---- Admin credentials (Change kar lo apne हिसाब से) ----
$ADMIN_USER = "admin";
$ADMIN_PASS = "12345";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user === $ADMIN_USER && $pass === $ADMIN_PASS) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "❌ Invalid Username or Password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
    body {font-family: Arial; background:#f3f4f6; display:flex; height:100vh; justify-content:center; align-items:center;}
    .login-box {background:white; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.2);}
    input {width:100%; padding:10px; margin:10px 0; border:1px solid #ccc; border-radius:6px;}
    button {width:100%; padding:10px; background:green; color:white; border:none; border-radius:6px; cursor:pointer;}
    .error {color:red;}
  </style>
</head>
<body>
  <div class="login-box">
    <h2>🔑 Admin Login</h2>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
