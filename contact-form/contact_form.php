<?php
    session_start();
    include_once("config/DB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

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
                <?php 
                    if ($_SESSION["admin_login"]){
                        echo'<a class="nav-link" href="contact_form.php">Contact Form</a>';
                        echo'<a class="nav-link" href="admin.php">Panel</a>';
                        echo'<a class="nav-link" href="logout.php">Logout</a>';
                    } 
                    else{
                        echo'<a class="nav-link" href="contact_form.php">Contact Form</a>';
                        echo'<a class="nav-link" href="admin_login.php">Admin Login</a>';
                    }
                ?>
            </div>
        </div>
    </nav>

    <!-- Contact Form -->
    <div class="container">
        <?php
            // Placeholders to display error messages
            if (isset($_GET["status"]) && $_GET["status"] == 'success'){
                echo"<div class='alert alert-success'>Thanks for your feedback! Your form has been submitted successfully. ✅</div>"; 
            }
            elseif (isset($_GET["status"]) && $_GET["status"] == 'email_invalid'){
                echo"<div class='alert alert-warning'>Email is not valid. ⚠️<br> Please try again. </div>";
            }
            elseif (isset($_GET["status"]) && $_GET["status"] == 'error'){
                echo"<div class='alert alert-danger'>Something went wrong during submission! ❌<br> Please try again. </div>";
            }
        ?>
        <hr>
        <h2>Contact Form</h2>
        <form action="contact_form.php" method="post">
            <label for="name">Name: </label><br><input type="text" name="name" required><br>
            <label for="email">Email: </label><br><input type="text" name="email" required><br>
            <label for="message">Message: </label><br><textarea type="text" name="message" rows="9" required></textarea><br><br>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>  
        <br><hr>
    </div>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] === 'POST'){

        // Santize user input
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);

        // Verify email
        if (empty($email)){
            header("Location: contact_form.php?status=email_invalid");
        }
        else{
            // Preparing, binding, and executing insert statement 
            $insert_form = $connection->prepare("INSERT INTO contact_forms (name, email, message) VALUES (?, ?, ?)");
            $insert_form->bind_param("sss", $name, $email, $message);
            
            // Reload form page with error/success messages
            if ($insert_form->execute()){
                header("Location: contact_form.php?status=success");
            }
            else{
                header("Location: contact_form.php?status=error");
            }
        
            // Close connection after executing statement
            $insert_form->close();
            $connection->close();
        }
    }
?>