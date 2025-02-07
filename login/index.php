<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- It is an Awesome Font Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/admin_login_css/login.css">
    <link rel="icon" href="../assets/images/icon.png">
    <title>Admin-Login</title>
</head>

<body>
    <div class="container">
        <h2>Welcome Back, Admin!</h2>
        <p>Log in to access your account</p>
        <div class="message">

            <!-- Error message -->
        <?php if(isset($_GET['error'])){ ?>
    <p><?php echo $_GET['error']; ?> </p>
    <?php }?>

        </div>

        <div class="success">

            <!-- Success message -->
        <?php if(isset($_GET['cnf_success'])){ ?>
    <p><?php echo $_GET['cnf_success'];  ?></p>
    <?php }?>



        </div>
        <form class="box" id="loginForm" action="../controllers/AdminController.php?action=admin-login" method="post">
            <div class="input">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="input password">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Enter Your Password" required>
            </div>
            <button type="submit" class="input">Login</button>
            <a href="forgot-password.php">Forgot Password?</a>
        </form>
    </div>
</body>

</html>

<script>

const password = document.querySelectorAll('.password');

for (let i = 0; i < password.length; i++) {
    let l = password[i].querySelector('.fa');
    let val = password[i].querySelector('input');
    l.addEventListener('click', () => {
        if (l.classList.contains('fa-eye')) {
            l.classList.remove('fa-eye');
            l.classList.add('fa-eye-slash');
            val.type = 'text';
        } else if (l.classList.contains('fa-eye-slash')) {
            l.classList.remove('fa-eye-slash');
            l.classList.add('fa-eye');
            val.type = 'password';
        }
    });
    val.addEventListener('input', () => {
        if (val.value != '') {
            l.classList.remove('fa-lock');
            l.classList.add('fa-eye');
        } else {
            l.classList.remove('fa-eye');
            l.classList.add('fa-lock');
        }
    })
}

document.getElementById('loginForm').addEventListener('submit', function (event) {
    // Your custom submission logic here
    const formData = new FormData(this);
    if (check(formData)) {
        console.log('Custom login submission');
    } else {
        event.preventDefault();
        document.getElementById('login').querySelector('.message').innerHTML = '<p>Insert Data Properly</p>'
    }
});

function check(formData) {
        if (formData.get('email') == '' || formData.get('password') == '')
            return false;
        return true;
}
</script>














