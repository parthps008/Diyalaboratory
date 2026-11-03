<?php

include 'db.php';

if (isset($_POST['register'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql = "INSERT INTO patients
(name, email, phone, password, created_at)
VALUES
('$name', '$email', '$phone', '$password', NOW())";

$result = mysqli_query($conn, $sql);

if ($result) {

header("Location: login.php?success=1");
exit();

} else {

echo "Error: " . mysqli_error($conn);

}

}



?>

<!DOCTYPE html>
<html>
<head>

<title>Patient Registration</title>

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
Patient Registration
</h3>

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button
type="submit"
name="register"
class="btn btn-success w-100">

Register

</button>

<div class="text-center mt-3">

Already have an account?

<a href="login.php">
Login Here
</a>

</div>

</form>

</div>

</body>
</html>