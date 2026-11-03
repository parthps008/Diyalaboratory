<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>

<title>About Us - Diya Laboratory</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body {
    background-color: #f4f6f9;
}

/* HERO SECTION */

.hero {
    background: linear-gradient(
        rgba(13,110,253,0.6),
        rgba(13,110,253,0.6)
    ),
    url('images/your-image-name.jpg');

    background-size: contain;   /* shows full image */
    background-repeat: no-repeat;
    background-position: center;
    background-color: #0d6efd;

    color: white;
    padding: 120px 0;
    text-align: center;
}

/* CARD HOVER EFFECT */

.card:hover {
    transform: translateY(-8px);
    transition: 0.3s;
}

/* STATS SECTION */

.stats {
    background: #0d6efd;
    color: white;
    padding: 40px 0;
}

</style>

</head>

<body>

<!-- HERO SECTION -->

<div class="hero">

<h1>About Diya Diagnostic Laboratory</h1>

<p class="lead">
Providing accurate and reliable diagnostic services
</p>

</div>

<div class="container mt-5">

<!-- ABOUT CONTENT -->

<div class="row">

<div class="col-md-6">

<img src="images/lab1.jpg"
     class="img-fluid rounded shadow">

</div>

<div class="col-md-6">

<h2 class="text-primary">Who We Are</h2>

<p>

Diya Diagnostic Laboratory is a trusted healthcare partner
offering high-quality laboratory testing services. We are
committed to delivering fast, accurate, and reliable results
using modern technology and professional staff.

</p>

<p>

Our laboratory follows strict quality standards to ensure
patient safety and satisfaction.

</p>

</div>

</div>

</div>

<!-- MISSION & VISION -->

<div class="container mt-5">

<div class="row text-center">

<div class="col-md-6">

<div class="card shadow p-3">

<h4 class="text-primary">Our Mission</h4>

<p>

To provide accurate diagnostic services with advanced
technology and excellent patient care.

</p>

</div>

</div>

<div class="col-md-6">

<div class="card shadow p-3">

<h4 class="text-success">Our Vision</h4>

<p>

To become the most trusted diagnostic laboratory
delivering quality healthcare services.

</p>

</div>

</div>

</div>

</div>

<!-- WHY CHOOSE US -->

<div class="container mt-5">

<h2 class="text-center text-primary mb-4">

Why Choose Us

</h2>

<div class="row text-center">

<div class="col-md-3">

<div class="card shadow p-3">

<h5>Qualified Staff</h5>

<p>Experienced medical professionals</p>

</div>

</div>

<div class="col-md-3">

<div class="card shadow p-3">

<h5>Modern Equipment</h5>

<p>Advanced diagnostic technology</p>

</div>

</div>

<div class="col-md-3">

<div class="card shadow p-3">

<h5>Fast Reports</h5>

<p>Quick and accurate results</p>

</div>

</div>

<div class="col-md-3">

<div class="card shadow p-3">

<h5>Affordable Prices</h5>

<p>Quality service at low cost</p>

</div>

</div>

</div>

</div>

<!-- STATS SECTION -->

<div class="stats mt-5">

<div class="container">

<div class="row text-center">

<div class="col-md-3">

<h2>10+</h2>

<p>Years Experience</p>

</div>

<div class="col-md-3">

<h2>5000+</h2>

<p>Patients Served</p>

</div>

<div class="col-md-3">

<h2>50+</h2>

<p>Lab Tests</p>

</div>

<div class="col-md-3">

<h2>24/7</h2>

<p>Support</p>

</div>

</div>

</div>

</div>

<?php
include 'footer.php';
?>

</body>
</html>