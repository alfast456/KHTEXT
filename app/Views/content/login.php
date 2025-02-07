<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KH-TEXT - LOGIN</title>

    <link rel="stylesheet" href="<?= base_url('css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/feather.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('images/favicon.png') ?>">

    <style>
        body {
            background-color: #f4f7fc;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            display: flex;
            max-width: 900px;
            width: 100%;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-image {
            flex: 1;
            background: url('<?= base_url("images/login-bg.jpg") ?>') center/cover no-repeat;
        }

        .login-form {
            flex: 1;
            padding: 40px;
        }

        .login-form h2 {
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-btn {
            background: #007bff;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #0056b3;
        }

        .login-footer {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>


<body>
    <div class="preloader"></div>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Login to Your Account</h2>
            <?php if (session()->getFlashdata('error')): ?>
                <p style="color:red"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>
            <form action="<?= base_url('login-process') ?>" method="post">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Your Email Address">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                    <a href="forgot.html" class="float-right">Forgot Password?</a>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
            <div class="login-footer">
                <p>Don't have an account? <a href="register.html">Register</a></p>
            </div>
        </div>
    </div>
    <script src="<?= base_url("js/plugin.js") ?>"></script>

    <script src="<?= base_url("js/scripts.js") ?>"></script>
</body>
</html>