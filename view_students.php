<?php
session_start();

if(!isset($_SESSION["admin"])){
header("Location: login.html");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>View Students</title>
<link rel="stylesheet" href="css/style.css">

<style>

.table-section{
padding:80px 20px;
display:flex;
justify-content:center;
}

.student-table{
width:90%;
border-collapse:collapse;
background:white;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

.student-table th,
.student-table td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

.student-table th{
background:#ff6f61;
color:white;
}

.student-table tr:nth-child(even){
background:#f9f9f9;
}

.profile-img{
width:60px;
height:60px;
border-radius:50%;
object-fit:cover;
}

</style>
<script src="js/search.js"></script>
</head>

<body>

<nav>
<div class="container nav-container">

<h2 class="logo">StudentMS</h2>

<ul>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="logout.php">Logout</a></li>

</ul>

</div>
</nav>

<main>
<div style="text-align:center;margin-bottom:20px;">
<input type="text" id="searchInput" placeholder="Search student..."
style="padding:10px;width:300px;border-radius:6px;border:1px solid #ccc;">
</div>

<section class="table-section">

<table class="student-table">

<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Age</th>
<th>Gender</th>
<th>Skills</th>
<th>Department</th>
<th>Joining Date</th>
<th>Profile</th>
<th>Comments</th>
</tr>
</thead>

<tbody id="studentTable">
</tbody>
<?php

$file = fopen("data/students.csv","r");
//to hide first data
fgetcsv($file);

while(($row = fgetcsv($file)) !== false){

echo "<tr>";

echo "<td>".$row[0]."</td>";
echo "<td>".$row[1]."</td>";
echo "<td>".$row[2]."</td>";
echo "<td>".$row[3]."</td>";
echo "<td>".$row[4]."</td>";
echo "<td>".$row[5]."</td>";
echo "<td>".$row[6]."</td>";

echo "<td><img src='uploads/".$row[7]."' class='profile-img'></td>";

echo "<td>".$row[8]."</td>";

echo "</tr>";

}

fclose($file);

?>

</table>

</section>

</main>

<footer>
<p>© 2026 Student Activity Management System | Developed by Vino</p>
</footer>

</body>
</html>