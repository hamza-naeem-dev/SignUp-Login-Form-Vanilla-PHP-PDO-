<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/SignUp System</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>
    <div class="form_box">
        <h3>Sign Up Form</h3>
        <form action="includes/CaptureFormData.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="pass" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>

        <?php if(isset($_SESSION['success'])): ?>

            <div class="success_msg" style= "display:block; color:green;">
                <?php
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
            </div>
            <?php endif; ?>
    </div>

    <!-- <div class="form_box">
        <h3>Login Form</h3>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="pass" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div> -->
</body>
</html>