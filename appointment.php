<?php

session_start();
include 'db.php';

/* CHECK IF PATIENT IS LOGGED IN */

if (!isset($_SESSION['email'])) {

header("Location: login.php");
exit();

}

/* BOOK APPOINTMENT */

if (isset($_POST['book'])) {

$email = $_SESSION['email'];

/* GET PATIENT ID USING EMAIL */

$get_patient = mysqli_query($conn,
"SELECT id FROM patients WHERE email='$email'");

if (mysqli_num_rows($get_patient) == 1) {

$row = mysqli_fetch_assoc($get_patient);

$patient_id = $row['id'];

$test_name = $_POST['test_name'];
$appointment_date = $_POST['appointment_date'];

$status = "Pending";


$sql = "INSERT INTO appointments
(patient_id, test_name, appointment_date, status, created_at)
VALUES
('$patient_id', '$test_name', '$appointment_date', '$status', NOW())";

$result = mysqli_query($conn, $sql);

if ($result) {

header("Location: my_appointments.php?booked=1");
exit();

} else {

echo "Error: " . mysqli_error($conn);

}



} else {

echo "<script>
alert('Patient not found. Please login again.');
window.location='login.php';
</script>";

}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Book Appointment</title>

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

<div class="container">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow p-4">

<h2 class="text-center mb-4">
Book Appointment
</h2>

<form method="POST">

<div class="mb-3">
<label>Test Name</label>

<select name="test_name" class="form-control" required>

<option value="">Select Test</option>
<option>Blood Test</option>
<option>Urine Test</option>
<option>Thyroid Test</option>
<option>Diabetes Test</option>
<option>Full Body Checkup</option>

</select>

</div>

<div class="mb-3">
<label>Appointment Date</label>

<input type="date"
name="appointment_date"
class="form-control"
required>

</div>

<button name="book"
class="btn btn-success w-100">

Book Appointment

</button>

</form>

</div>

</div>

</div>

</div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>