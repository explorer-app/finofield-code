<?php

session_start();
if(!isset($_SESSION['otp_verified'])) {
    header("location: index.php");
}
unset($_SESSION['otp']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/admin_login_css/login.css">
    <link rel="icon" href="../assets/images/logo.png">
    <title>OTP Verification</title>
</head>
<body>
    <div class="container">
        <h2>Change Password, Admin!</h2>
        <p>Re-enter your password</p>
        <div class="message">

              <!-- Error message -->
        <?php if(isset($_GET['pass_error'])){ ?>
    <p><?php echo $_GET['pass_error']; ?></p>
<?php unset($_GET['pass_error']);} ?>
<?php unset($_SESSION['otp_verified']); ?>

        </div>
        <form action="../controllers/AppController.php?action=cnf_pass" class="box" method="POST" id="update">
            <div class="input password">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Enter Your Password" required>
            </div>
            <div class="input password">
                <i class="fa fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Re-Enter Your Password" required>
            </div>
            <button type="submit" class="input">Submit</button>
        </form>
    </div>

    <script>
        const passwordInputs = document.querySelectorAll('.password');

        for (let i = 0; i < passwordInputs.length; i++) {
            let icon = passwordInputs[i].querySelector('.fa');
            let input = passwordInputs[i].querySelector('input');

            icon.addEventListener('click', () => {
                if (icon.classList.contains('fa-eye')) {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                    input.type = 'text';
                } else if (icon.classList.contains('fa-eye-slash')) {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                    input.type = 'password';
                }
            });

            input.addEventListener('input', () => {
                if (input.value !== '') {
                    icon.classList.remove('fa-lock');
                    icon.classList.add('fa-eye');
                } else {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-lock');
                }
            });
        }

        document.getElementById('update').addEventListener('submit', function (event) {
            const formData = new FormData(this);

            if (!checkPasswords(formData)) {
                event.preventDefault();
                document.querySelector('.message').innerHTML = '<p>Passwords do not match</p>';
            }
        });

        function checkPasswords(formData) {
            return formData.get('password') === formData.get('confirm_password');
        }
    </script>
</body>
</html>