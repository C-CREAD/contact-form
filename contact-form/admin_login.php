<?php
    session_start();
    include_once("config/DB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

    <!-- Login Form -->
    <div class="container">
        <hr>
        <h2>Admin Login</h2>
        <form action="admin_login.php" method="post">
            <label>Username:</label><br><input type="text" name="username" required><br><br>
            <label>Password:</label><br><input type="password" name="password" required><br><br>
            <input type="submit" value="Log in" class="btn btn-primary">
        </form>
        <hr>
    </div>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // Sanitize admin credentials
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    
        if (empty($username)){
            echo '<script>alert("Username is empty! Please try again. ⚠️");</script>';
        }
        elseif (empty($password)){
            echo '<script>alert("Password is empty! Please try again. ⚠️");</script>';
        }

        // Verify admin credentials
        if ($verify = $connection->prepare("SELECT name, email FROM users WHERE name=? AND password=? AND is_admin=1 LIMIT 1")){
            
            $verify->bind_param("ss", $username, $password);
            $verify->execute();
            $verify->bind_result($name, $email);
            $verify->fetch();

            // Close connection after executing statement
            $verify->close();
            $connection->close();
            
            if (empty($name) && empty($email)){
                echo '<script>alert("Invalid Credentials. Please try again. ❌");</script>';
            }
            else{
                echo '<script>alert("Login Successfull. ✅");</script>';
                $_SESSION["admin_login"] = true;
                header("Location: admin.php");  # Redirect to admin panel
                exit();
            }
        }
    }
?>