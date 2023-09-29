<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/index.css">
    <title>Todolist</title>
</head>
<body>
<header class="header">
    <div class="git-btn">
        <a id="git-icon" href="https://github.com/axel-vair/super-reminder" target="_blank">
            <span><ion-icon name="logo-github"></ion-icon></span>
        </a>
    </div>
    <div class="register-btn">
        <a role="button" id='btn-register' href="register.php">
            <span><ion-icon name="person-add-outline"></ion-icon></span>
        </a>
    </div>
    <div class="login-btn">
        <a role="button" id='btn-login' href="login.php">
            <span><ion-icon name="log-in-outline"></ion-icon></span>
        </a>
    </div>
</header>
<section class="container">
    <main class="section-logo">
        <div class="home-logo">
            <span id="logo"></span>
            <span id="logo-title"><h1>to-do list</h1></span>
        </div>
    </main>
    <div class="form-btn">
        <button id="sign-up" onclick="window.location.href='register.php'">sign <span id="form-btn-clr">up</span></button>
        <button id="sign-in" onclick="window.location.href='login.php'">sign <span id="form-btn-clr">in</span></button>
    </div>
</section>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>