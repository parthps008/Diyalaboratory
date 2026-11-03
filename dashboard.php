<?php

session_start();

if (!isset($_SESSION['email'])) {

header("Location: login.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Patient Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

html, body {
height: 100%;
margin: 0;
}

body {
display: flex;
flex-direction: column;
min-height: 100vh;
background: #f8f9fa;
}

.main-content {
flex: 1;
padding: 40px;
}

</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="main-content">

<div class="container text-center">

<h2>Welcome to Your Dashboard</h2>

<p class="lead">

You are successfully logged in.

</p>

<a href="appointment.php" class="btn btn-primary">
Book Appointment
</a>

<br><br>

<a href="logout.php" class="btn btn-danger">
Logout
</a>

</div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>