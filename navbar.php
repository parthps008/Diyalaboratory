<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
<div class="container">

<a class="navbar-brand fw-bold" href="index.php">
Diya Laboratory
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="nav">



<ul class="navbar-nav ms-auto">

<li class="nav-item">
    <a class="nav-link text-white" href="index.php">Home</a>
</li>

<li class="nav-item">
    <a class="nav-link text-white" href="about.php">About</a>
</li>

<li class="nav-item">
    <a class="nav-link text-white" href="packages.php">Packages</a>
</li>

<li class="nav-item">
    <a class="nav-link text-white" href="contact.php">Contact</a>
</li>

<?php if (isset($_SESSION['email'])) { ?>

<!-- SHOW WHEN LOGGED IN -->

<li class="nav-item">
    <a class="nav-link text-white" href="appointment.php">
        Appointment
    </a>
</li>

<li class="nav-item">
    <a class="nav-link text-white" href="my_appointments.php">
        My Appointment
    </a>
</li>

<li class="nav-item">
    <a class="nav-link btn ms-2 px-3 fw-bold"
       href="logout.php"
       style="background-color:#dc3545; color:white; border-radius:8px;">
        Logout
    </a>
</li>

<?php } else { ?>

<!-- SHOW WHEN NOT LOGGED IN -->

<li class="nav-item">
    <a class="nav-link btn ms-2 px-3 fw-bold"
       href="login.php"
       style="background-color:#198754; color:white; border-radius:8px;">
        Login
    </a>
</li>

<li class="nav-item">
    <a class="nav-link btn ms-2 px-3 fw-bold"
       href="register.php"
       style="background-color:#0d6efd; color:white; border-radius:8px;">
        Register
    </a>
</li>

<?php } ?>

<!-- ADMIN BUTTON ALWAYS VISIBLE -->

<li class="nav-item">
    <a class="nav-link btn ms-2 px-3 fw-bold"
       href="admin_login.php"
       style="background-color:#ffc107; color:black; border-radius:8px;">
        Admin
    </a>
</li>

</ul>
</div>

</div>
</nav>