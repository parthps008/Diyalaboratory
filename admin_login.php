<?php

session_start();
include 'db.php';

if (isset($_POST['login'])) {

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin
WHERE username='$username'
AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

$_SESSION['admin'] = $username;

header("Location: admin_dashboard.php");
exit();

} else {

echo "<script>alert('Invalid Username or Password');</script>";

}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body {
    margin: 0;
    padding: 0;

    /* NEW BACKGROUND DESIGN */

    background: linear-gradient(
        135deg,
        #1e3c72,
        #2a5298
    );

    min-height: 100vh;
    font-family: Arial, sans-serif;
}

/* CENTER FORM BOX */

.auth-box {
    width: 420px;
    margin: 90px auto;
    padding: 30px;

    background: white;

    border-radius: 12px;

    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
}

/* BUTTON STYLE */

.btn-primary {
    background-color: #0d6efd;
    border: none;
}

.btn-primary:hover {
    background-color: #0b5ed7;
}

</style>

</head>

<body>

<div class="auth-box">

<h3 class="text-center mb-4">
Admin Login
</h3>

<form method="POST">

<div class="mb-3">
<label>Username</label>
<input type="text"
name="username"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password"
name="password"
class="form-control"
required>
</div>

<button
type="submit"
name="login"
class="btn btn-dark w-100">

Login

</button>

</form>

</div>

</body>
</html>