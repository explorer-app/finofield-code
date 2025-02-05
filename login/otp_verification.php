<?php      
session_start();
if(!isset($_SESSION['otp'])) {
    header("location: index.php");
}
?>

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
        <h2>Confirm OTP, Admin!</h2>
        <p>Enter an OTP which you get on your email</p>
        <div class="message">

<!-- Error message -->
<?php if(isset($_GET['otp_error'])){ ?>
<p><?= $_GET['otp_error']; ?></p>
<?php unset($_GET['otp_error']); } ?>


</div>

        <form action="../controllers/AppController.php?action=otp_verify" class="box" method="POST">
            <div class="input">
                <input type="otp" name="otp" placeholder="Enter Your OTP" style="font-size: large;"/>
            </div>
            <button type="submit" class="input">Submit</button>
        </form>
    </div>
</body>
</html>