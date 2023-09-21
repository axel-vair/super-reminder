<?php
session_start();
if($_SESSION){
   echo '<nav>
        <ul>
            <li><a role="button" id="btn-logout" href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>';
}else{
    echo '<header>
    <nav>
        <ul>
            <li><a role="button" id="btn-register" href="register.php">Inscription</a></li>
            <li><a role="button" id="btn-login" href="login.php">Connexion</a></li>
        </ul>
    </nav>
</header>';
}

?>
