<?php
include 'navbar.php';
include 'db.php';

/* HANDLE CONTACT FORM */

if (isset($_POST['send'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_messages
(name, email, message, created_at)
VALUES
('$name', '$email', '$message', NOW())";

if (mysqli_query($conn, $sql)) {

header("Location: contact.php?success=1");
exit();

}

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Contact Us - Diya Laboratory</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body {
background: #f4f6f9;
}

/* HEADER */

.contact-header {
background: linear-gradient(90deg,#0d6efd,#6610f2);
color: white;
padding: 50px 0;
text-align: center;
}

/* IMAGE FIX */

.image-box {
width: 100%;
height: 280px;
overflow: hidden;
border-radius: 12px;
}

.image-box img {
width: 100%;
height: 100%;
object-fit: cover;
}

/* CARD */

.info-card {
background: white;
padding: 20px;
border-radius: 12px;
box-shadow: 0 4px 12px rgba(0,0,0,0.1);
margin-top: 20px;
}

/* FORM */

.form-box {
background: white;
padding: 30px;
border-radius: 12px;
box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.info-title {
color: #0d6efd;
font-weight: bold;
margin-bottom: 10px;
}

</style>

</head>

<body>

<!-- HEADER -->

<div class="contact-header">

<h1>Contact Diya Diagnostic Laboratory</h1>

<p>
We are here to assist you. Feel free to contact us anytime.
</p>

</div>

<div class="container mt-5">

<?php
if (isset($_GET['success'])) {
echo "<div class='alert alert-success text-center'>
Message Sent Successfully!
</div>";
}
?>

<div class="row">

<!-- LEFT SIDE -->

<div class="col-md-6">

<!-- IMAGE -->

<div class="image-box">

<img src="images/lab-building.jpg">

</div>

<!-- ADDRESS -->

<div class="info-card">

<div class="info-title">
Address
</div>

<p>

Near Pawar Hospital,<br>
Palus Karad Road,<br>
Palus, Sangli - 416310,<br>
Maharashtra

</p>

</div>

<!-- CONTACT -->

<div class="info-card">

<div class="info-title">
Contact Details
</div>

<p>

📞 <strong>Phone:</strong> +91 9860006433

</p>

<p>

📧 <strong>Email:</strong> diyalabpalus@gmail.com

</p>

<p>

🕒 <strong>Working Hours:</strong> Open 10:00 AM to 8:00 PM

</p>

</div>

</div>

<!-- RIGHT SIDE FORM -->

<div class="col-md-6">

<div class="form-box">

<h3 class="text-center mb-4">
Send Us a Message
</h3>

<form method="POST">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Message</label>

<textarea
name="message"
class="form-control"
rows="5"
required></textarea>

</div>

<button
type="submit"
name="send"
class="btn btn-primary w-100">

Send Message

</button>

</form>

</div>

</div>

</div>

</div>

<?php
include 'footer.php';
?>

</body>
</html>