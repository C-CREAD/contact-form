<?php
    
    // Check if admin is logged in before accessing panel
    session_start();
    if (!isset($_SESSION['admin_login'])){
        header("Location: admin_login.php");
    }

    // Get all submitted forms in advanced
    include_once("config/DB.php");
    $contacts = $connection->query("SELECT * from contact_forms ORDER BY submitted_at DESC;");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Property Studios</a>
            <div class="navbar-nav">
                <a class="nav-link" href="contact_form.php">Contact Form</a>
                <a class="nav-link" href="admin.php">Panel</a>
                <a class="nav-link" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Submitted Form Table -->
    <div class="container">
        <h1>Admin Panel</h1>
        <hr>
        <h3>Contact Form Submissions</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($contacts->num_rows > 0): ?> 
                    <?php while($row = $contacts->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo date("M j, Y g:i a", strtotime($row["submitted_at"])); ?></td>
                        </tr>
                    <?php endwhile ?>
                <?php else: ?>
                    <tr>
                        <td>No forms submitted.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div> 
</body>
</html>