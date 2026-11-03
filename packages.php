<!DOCTYPE html>
<html>
<head>

<title>Health Packages</title>

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

.card {
border-radius: 12px;
transition: 0.3s;
}

.card:hover {
transform: scale(1.05);
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

<div class="container">

<h2 class="text-center mb-5">
Our Health Packages
</h2>

<div class="row g-4">

<!-- Package 1 -->

<div class="col-md-3">
<div class="card shadow">

<img src="images/blood.jpg" class="card-img-top">

<div class="card-body text-center">

<h5>Basic Blood Test</h5>

<p>
CBC, Hemoglobin, Blood Sugar
</p>

<h6 class="text-primary">
₹499
</h6>

</div>

</div>
</div>



<div class="col-md-3">
<div class="card shadow">

<img src="images/diabetes.jpg" class="card-img-top">

<div class="card-body text-center">

<h5>Diabetes Package</h5>

<p>
Fasting Sugar, HbA1c, Glucose
</p>

<h6 class="text-primary">
₹699
</h6>

</div>

</div>
</div>

<!-- Package 3 -->

<div class="col-md-3">
<div class="card shadow">

<img src="images/heart.jpg" class="card-img-top">

<div class="card-body text-center">

<h5>Heart Checkup</h5>

<p>
Cholesterol, ECG, Lipid Profile
</p>

<h6 class="text-primary">
₹999
</h6>

</div>

</div>
</div>


<div class="col-md-3">
<div class="card shadow">

<img src="images/thyroid.jpg" class="card-img-top">

<div class="card-body text-center">

<h5>Thyroid Test</h5>

<p>
T3, T4, TSH
</p>

<h6 class="text-primary">
₹799
</h6>

</div>

</div>
</div>

<!-- Package 5 -->

<div class="col-md-3">
<div class="card shadow">

<img src="images/kidney.jpg" class="card-img-top">

<div class="card-body text-center">

<h5>Kidney Function Test</h5>

<p>
Creatinine, Urea, Electrolytes
</p>

<h6 class="text-primary">
₹899
</h6>

</div>

</div>
</div>

<!-- Package 6 -->

<div class="col-md-3">
<div class="card shadow">

<img src="images/liver.jpg" class="card-img-top">

<div class="card-body text-center">

<h5>Liver Function Test</h5>

<p>
SGPT, SGOT, Bilirubin
</p>

<h6 class="text-primary">
₹899
</h6>

</div>

</div>
</div>

<!-- Package 7 -->

<div class="col-md-3">
<div class="card shadow">

<img src="images/fullbody.jpg" class="card-img-top">

<div class="card-body text-center">

<h5>Full Body Checkup</h5>

<p>
Complete Health Screening
</p>

<h6 class="text-primary">
₹1999
</h6>

</div>

</div>
</div>

<!-- Package 8 -->

<div class="col-md-3">
<div class="card shadow">

<img src="images/women.jpg" class="card-img-top">

<div class="card-body text-center">

<h5>Women's Health Package</h5>

<p>
Hormone, CBC, Vitamin Tests
</p>

<h6 class="text-primary">
₹1499
</h6>

</div>

</div>
</div>

</div>

</div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>