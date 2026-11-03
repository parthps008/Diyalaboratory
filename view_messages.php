<?php

include 'db.php';

$sql = "SELECT * FROM contact_messages";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Contact Messages</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Contact Messages</h2>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Message</th>
<th>Created At</th>

</tr>

<?php

while ($row = mysqli_fetch_assoc($result)) {

echo "<tr>

<td>".$row['id']."</td>
<td>".$row['name']."</td>
<td>".$row['email']."</td>
<td>".$row['message']."</td>
<td>".$row['created_at']."</td>

</tr>";

}

?>

</table>

<a href="admin_dashboard.php" class="btn btn-secondary">
Back
</a>

</div>

</body>
</html>