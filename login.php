<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db.php';

if (isset($_POST['login'])) {

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM patients
WHERE email='$email'
AND password='$password'";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {

$row = mysqli_fetch_assoc($result);



$_SESSION['patient_id'] = $row['id'];
$_SESSION['email'] = $row['email'];
$_SESSION['name'] = $row['name'];

/* REDIRECT */

header("Location: index.php");
exit();

} else {

$error = "Invalid Email or Password";

}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Patient Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    margin: 0;
    padding: 0;

    

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
Patient Login
</h3>

<?php
if (isset($error)) {
echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button type="submit" name="login" class="btn btn-primary w-100">
Login
</button>

<div class="text-center mt-3">

Don't have an account?

<a href="register.php">
Register Here
</a>

</div>

</form>

</div>

</body>
</html>