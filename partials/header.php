<!-- le style içi c'est ./assets/index.css -->

<?php
session_start();
if($_SESSION) {
    echo `<header class="header">
    <div class="git-btn">
        <a id="git-icon" href="https://github.com/axel-vair/super-reminder" target="_blank">
            <span><ion-icon name="logo-github"></ion-icon></span>
        </a>
    </div>
</header>`;
}else{
    echo`
<header class="header">
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
</header>`;
}
