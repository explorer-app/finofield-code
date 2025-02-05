<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/admin_login_css/login.css">
    <link rel="icon" href="../assets/images/logo.png">
    <title>OTP-Varification</title>
</head>
<body>
    <div class="container">
        <h2>Foget Password, Admin!</h2>
        <p>Enter your register Email</p>

        <div class="message">

<!-- Error message -->
<?php if(isset($_GET['mail_error'])){ ?>
<p><?php echo $_GET['mail_error']; ?></p>
<?php } ?>


</div>
        <form action="../controllers/AppController.php?action=forgot_password" class="box" method="POST">
            <div class="input">
                <input type="email" name="mail" placeholder="example@gmail.com" style="font-size: large;" requierd/>
            </div>
            <button type="submit" class="input">Submit</button>
        </form>
    </div>
</body>
</html>