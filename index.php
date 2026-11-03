<?php

session_start();

?>
<?php

if (isset($_SESSION['name'])) {

echo "<div class='alert alert-success text-center'>

Welcome, <strong>" . $_SESSION['name'] . "</strong>

</div>";

}

?><!DOCTYPE html>
<html>
<head>

<title>Diya Laboratory</title>

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
}

.main-content {
flex: 1;
}

/* HERO BACKGROUND WITH YOUR LOGO */

.hero {

background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
url('images/logo-bg.jpg');

background-size: cover;
background-position: center;

padding: 160px 20px;

color: white;
text-align: center;

}

/* TEST CARDS */

.card {
border-radius: 12px;
transition: 0.3s;
}

.card:hover {
transform: translateY(-6px);
}

.card img {
height: 200px;
object-fit: cover;
}

</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="main-content">



<div class="hero">

<h1 class="display-4 fw-bold">
Welcome to Diya Laboratory
</h1>

<p class="lead">
Accurate Reports. Trusted Care.
</p>

<a href="appointment.php"
class="btn btn-light btn-lg">

Book Appointment

</a>

</div>



<div class="container mt-5">

<h2 class="text-center mb-4">
Our Services
</h2>

<div class="row">

<!-- Blood Test -->

<div class="col-md-4">

<div class="card shadow">

<img src="images/blood-test.jpg">

<div class="card-body text-center">

<h4>Blood Test</h4>

<p>
Complete blood analysis with accurate results.
</p>

</div>

</div>

</div>

<!-- Urine Test -->

<div class="col-md-4">

<div class="card shadow">

<img src="images/urine-test.jpg">

<div class="card-body text-center">

<h4>Urine Test</h4>

<p>
Reliable diagnostic urine testing services.
</p>

</div>

</div>

</div>



<div class="col-md-4">

<div class="card shadow">

<img src="images/health-checkup.jpg">

<div class="card-body text-center">

<h4>Health Checkup</h4>

<p>
Full body health screening packages.
</p>

</div>

</div>

</div>

</div>

</div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>