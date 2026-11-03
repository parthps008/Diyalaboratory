<?php
session_start();
include("db.php");

/* COUNT DATA */

$patients = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM patients"));

$appointments = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM appointments"));

$messages = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact_messages"));

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Dashboard</title>

<style>

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f4f6f9;
}

/* SIDEBAR */

.sidebar {
    width: 230px;
    height: 100vh;
    background: #1f66d1;
    position: fixed;
    color: white;
}

.sidebar h2 {
    text-align: center;
    padding: 20px 0;
}

.sidebar a {
    display: block;
    padding: 15px 20px;
    color: white;
    text-decoration: none;
}

.sidebar a:hover {
    background: #174ea6;
}

.logout {
    background: #0d47a1;
}

/* MAIN */

.main {
    margin-left: 230px;
    padding: 20px;
}

/* CARDS */

.cards {
    display: flex;
    gap: 20px;
    margin-bottom: 25px;
}

.card {
    flex: 1;
    color: white;
    padding: 25px;
    border-radius: 10px;
    font-size: 18px;
}

.blue { background: #1f66d1; }
.green { background: #2e7d32; }
.orange { background: #f57c00; }

/* TABLE */

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

th {
    background: orange;
    color: white;
    padding: 12px;
}

td {
    padding: 10px;
    border: 1px solid #ddd;
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>Owner Panel</h2>

<a href="admin_dashboard.php">Dashboard</a>

<a href="view_patients.php">View Patients</a>

<a href="view_appointments.php">View Appointments</a>

<a href="view_messages.php">Contact Messages</a>

<a href="logout.php" class="logout">Logout</a>

</div>

<!-- MAIN -->

<div class="main">

<h2>Welcome Admin</h2>

<!-- CARDS -->

<div class="cards">

<div class="card blue">

<h3>Total Patients</h3>

<h2>

<?php echo $patients; ?>

</h2>

</div>

<div class="card green">

<h3>Total Appointments</h3>

<h2>

<?php echo $appointments; ?>

</h2>

</div>

<div class="card orange">

<h3>Contact Messages</h3>

<h2>

<?php echo $messages; ?>

</h2>

</div>

</div>

<!-- RECENT APPOINTMENTS -->

<h2>Recent Appointments</h2>

<table>

<tr>

<th>ID</th>
<th>Test Name</th>
<th>Date</th>
<th>Status</th>

</tr>

<?php

$result = mysqli_query($conn,
"SELECT * FROM appointments ORDER BY id DESC LIMIT 5");

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

<td>

<?php echo $row['id']; ?>

</td>

<td>

<?php echo $row['test_name']; ?>

</td>

<td>

<?php echo $row['appointment_date']; ?>

</td>

<td>

<?php echo $row['status']; ?>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>
</html>