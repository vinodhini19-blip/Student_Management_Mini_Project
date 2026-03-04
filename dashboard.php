<?php
session_start();
$studentCount = count(file("data/students.csv")) - 1;
$activityCount = count(file("data/activities.csv")) - 1;
$feedbackCount = count(file("data/feedback.csv")) - 1;

if (!isset($_SESSION["admin"])) {
header("Location: login.html");
exit();
}

$message = "";

if(isset($_GET['success'])){

if($_GET['success'] == "student"){
$message = "Student added successfully!";
}

if($_GET['success'] == "activity"){
$message = "Activity added successfully!";
}

if($_GET['success'] == "feedback"){
$message = "Feedback submitted successfully!";
}

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
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

<section class="dashboard-section">
    <div class="dashboard-container">
        
        <h1 class="dashboard-title"> 
            Welcome, <?php echo $_SESSION["admin"]; ?>
        </h1>

        <?php
        if (isset($_COOKIE["last_login"])) {
            echo "<p style='text-align:center;margin-bottom:30px;'>
                    Last Login: " . $_COOKIE["last_login"] . "
                  </p>";
        }
        ?>
<h2 class="dashboard-titl">Manage</h2>
        <div class="dashboard-grid">

            <a href="add_student.html" class="dashboard-card">
                <h3>Add Student</h3>
                <p>Register new student details.</p>
            </a>

           

            <a href="add_activity.html" class="dashboard-card">
                <h3>Add Activity</h3>
                <p>Record student activities.</p>
            </a>

            <a href="feedback.html" class="dashboard-card">
                <h3>Add Feedback</h3>
                <p>Collect student feedback.</p>
            </a>
</div>
<div>
             <center>
<?php if($message != ""){ ?>

<div class="success-msg">
<?php echo $message; ?>
</div>

<?php } ?>
<center>
</div>
<!-- VIEW SECTION -->

<h2 class="dashboard-titl">View Records</h2>

<div class="dashboard-grid">

<a href="view_students.php" class="dashboard-card">
<h3>📄 View Students</h3>
<p>Display all student records</p>
</a>

<a href="view_activities.php" class="dashboard-card">
<h3>📋 View Activities</h3>
<p>See all activity records</p>
</a>

<a href="view_feedback.php" class="dashboard-card">
<h3>📝 View Feedback</h3>
<p>See all feedback entries</p>
</a>

</div>


<!-- STATISTICS SECTION -->

<h2 class="dashboard-titl">Statistics</h2>
<div class="stats-grid">

            <div class="dashboard-card">
            <h3>Total Students</h3>
            <p><?php echo $studentCount; ?></p>
            </div>

            <div class="dashboard-card">
            <h3>Total Activities</h3>
            <p><?php echo $activityCount; ?></p>
            </div>

            <div class="dashboard-card">
            <h3>Total Feedback</h3>
            <p><?php echo $feedbackCount; ?></p>
            </div>


</div>

    </div>
</section>

</main>

<footer>
    <p>© 2026 Student Activity Management System | Developed by Vino</p>
</footer>

</body>
</html>