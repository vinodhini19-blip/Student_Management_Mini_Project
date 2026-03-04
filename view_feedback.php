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

<title>View Feedback</title>
<link rel="stylesheet" href="css/style.css">

<style>

.table-section{
padding:60px 20px;
display:flex;
justify-content:center;
}

.data-table{
width:80%;
border-collapse:collapse;
background:white;
box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

.data-table th,
.data-table td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

.data-table th{
background:#ff6f61;
color:white;
}

.data-table tr:nth-child(even){
background:#f9f9f9;
}
/* feedback form css*/
/* page layout */

body{
display:flex;
flex-direction:column;
min-height:100vh;
margin:0;
}

/* main content grows */

main{
flex:1;
}
</style>

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
<section class="table-section">

<table class="data-table">

<tr>
<th>Student Name</th>
<th>Rating</th>
<th>Feedback</th>
<th>Date</th>
</tr>

<?php

$file = fopen("data/feedback.csv","r");

fgetcsv($file);

while(($row = fgetcsv($file)) !== false){

echo "<tr>";

echo "<td>".$row[0]."</td>";
echo "<td>".$row[1]."</td>";
echo "<td>".$row[2]."</td>";
echo "<td>".$row[3]."</td>";

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