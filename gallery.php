<!DOCTYPE html>
<html>
<head>
    <title>Gallery - Diya Laboratory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gallery-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
            background: white;
        }
        .gallery-card:hover {
            transform: translateY(-6px);
        }
        .gallery-card img {
            width: 100%;
            height: 240px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<section class="container py-5 min-vh-100">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Our Laboratory Gallery</h1>
        <p class="lead text-muted">State-of-the-art diagnostic facilities and advanced equipment</p>
    </div>
    
    <div class="row g-4">
        <div class="col-lg-4 col-md-6">
            <div class="gallery-card">
                <img src="images/lab1.jpg" alt="Lab Equipment">
                <div class="card-body p-4 text-center">
                    <h5 class="fw-bold">Advanced Diagnostic Lab</h5>
                    <p class="text-muted mb-0">Cutting-edge testing equipment</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="gallery-card">
                <img src="images/blood-test.jpg" alt="Blood Analysis">
                <div class="card-body p-4 text-center">
                    <h5 class="fw-bold">Hematology & Pathology</h5>
                    <p class="text-muted mb-0">High-precision specimen analysis</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="gallery-card">
                <img src="images/lab-building.jpg" alt="Clinic Facility">
                <div class="card-body p-4 text-center">
                    <h5 class="fw-bold">Modern Facility</h5>
                    <p class="text-muted mb-0">Clean, welcoming patient centers</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="gallery-card">
                <img src="images/health-checkup.jpg" alt="Health Consultation">
                <div class="card-body p-4 text-center">
                    <h5 class="fw-bold">Experienced Specialists</h5>
                    <p class="text-muted mb-0">Dedicated medical team & pathologists</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="gallery-card">
                <img src="images/urine-test.jpg" alt="Biochemistry">
                <div class="card-body p-4 text-center">
                    <h5 class="fw-bold">Biochemistry Testing</h5>
                    <p class="text-muted mb-0">Rapid & accurate clinical test reports</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="gallery-card">
                <img src="images/your-image-name.jpg" alt="Technology">
                <div class="card-body p-4 text-center">
                    <h5 class="fw-bold">Digital Diagnostics</h5>
                    <p class="text-muted mb-0">Online report tracking & scheduling</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
