<?php
require_once "./models/Connect.php";
require_once "./models/User.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $user = new User(false, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
       $conn = new Connect;

       $errorMessages = array(
              'empty_fields' => "Veuillez remplir tous les champs.",
              'password_length' => "Le mot de passe est trop court. Veuillez en choisir un plus long.",
              'password_case' => "Le mot de passe doit contenir au moins une lettre majuscule et une minuscule.",
              'password_digit' => "Le mot de passe doit contenir au moins un chiffre.",
              'password_special_char' => "Le mot de passe doit contenir au moins un caractère spécial.",
              'email_invalid' => "L'adresse e-mail doit être au format example@example.com.",
              'email_exists' => "Cette adresse e-mail est déjà associée à un compte. Veuillez en choisir une autre."
       );

       $errors = [];

       // || verify if fields are empty
       if (empty($user->getFirstname()) || empty($user->getLastname()) || empty($user->getEmail()) || empty($user->getPassword())) {
              $errors[] = $errorMessages['empty_fields'];
       }


       // || verify if password lenght is long enough
       if (strlen($user->getPassword()) < 8) {
              $errors[] = $errorMessages['password_length'];
       }

       // || verify if password got 1 lowercase and upercase
       if (!preg_match('/[A-Z]/', $user->getPassword()) || !preg_match('/[a-z]/', $user->getPassword())) {
              $errors[] = $errorMessages['password_case'];
       }

       // || verify if password has at least one digit
       if (!preg_match('/[0-9]/', $user->getPassword())) {
              $errors[] = $errorMessages['password_digit'];
       }

       // || verify if password has at least one special characters
       if (!preg_match('/[^A-Za-z0-9]/', $user->getPassword())) {
              $errors[] = $errorMessages['password_special_char'];
       }

       if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
              $errors[] = $errorMessages['email_invalid'];
       } else {
              if ($conn->emailExist($user->getEmail()) > 0) {
                     $errors[] = $errorMessages['email_exists'];
              }
              $conn->closeStmt();
       }
       // || checkout every error possible and Insert ser information into database
       if (empty($errors)) {
              if ($conn->insertUser($user)) {
                     $success = "Inscription résussie !";
              } else {
                     $errors[] = "Erreur lors de l'inscription : " . $stmt->errorInfo()[2];
              }
       }
       $conn->closeDb();

}
?>

<!doctype html>
<html lang="fr">

<head>
       <meta charset="UTF-8">
       <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="icon" href="./assets/list-outline.svg" type="image/png">
       <title>To-do List</title>
       <link rel="stylesheet" href="./assets/register.css">
       <link rel="stylesheet" href="./assets/index.css">
       <script src="src/register.js" defer></script>
       <script src="src/jquery.min.js"></script>
       <script>
              $(document).ready(function () {
                     $('#password').on('input', function () {
                            var password = $('#password').val();

                            var errors = [];

                            if (password.length < 8) {
                                   errors.push("Le mot de passe doit contenir au moins 8 caractères.");
                            }

                            if (!/[A-Z]/.test(password) || !/[a-z]/.test(password)) {
                                   errors.push("Le mot de passe doit contenir au moins une lettre majuscule et une minuscule.");
                            }

                            if (!/[0-9]/.test(password)) {
                                   errors.push("Le mot de passe doit contenir au moins un chiffre.");
                            }

                            if (!/[^A-Za-z0-9]/.test(password)) {
                                   errors.push("Le mot de passe doit contenir au moins un caractère spécial.");
                            }

                            if (errors.length > 0) {
                                   $('#password-error').html(errors.join("<br>"));
                            } else {
                                   $('#password-error').html("");
                            }
                     });

                     $('#email').on('input', function () {
                            var email = $('#email').val();

                            $.ajax({
                                   url: 'Check_email.php',
                                   type: 'POST',
                                   data: { email: email },
                                   success: function (response) {
                                          if (response === 'exists') {
                                                 $('#email-error-ajax').text("Cette adresse e-mail est déjà associée à un compte. Veuillez en choisir une autre.");
                                          } else {
                                                 $('#email-error-ajax').text("");
                                          }
                                   }
                            });
                            // Vérification de l'adresse e-mail
                            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                                   $('#email-error').text("L'adresse e-mail doit être au format example@example.com.");
                            } else {
                                   $('#email-error').text("");
                            }

                     });

                     function checkErrors() {
                            var errors = 0;

                            if ($('#email-error').text() !== "") {
                                   errors++;
                            }
                            if ($('#email_checkout_error').text() !== "") {
                                   errors++;
                            }
                            if ($('#password-error').text() !== "") {
                                   errors++;
                            }
                            if ($('#password_checkout_error').text() !== "") {
                                   errors++;
                            }

                            if (errors > 0) {
                                   $('#inscription_button').prop('disabled', true);
                            } else {
                                   $('#inscription_button').prop('disabled', false);
                            }
                     }

                     $('#email').on('input', checkErrors);
                     $('#password').on('input', checkErrors);

              });
       </script>
</head>

<body>
       <?php require './partials/header.php'; ?>
       <div class="main-form">
              <div class="signup">
                     <form id="form-register" method="post">
                            <h1>Inscription</h1>
                            <span id="error-container"></span>
                            <label for="email">Email</label>
                            <span id="email-error" style="color: #E7002A;"></span>
                            <span id="email-error-ajax" style="color: #E7002A;"></span>
                            <input id="email" name="email" type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" minlength="4"
                                   maxlength="60" required>

                            <label for="lastname">Nom</label>
                            <span id="lastname-error" style="color: #E7002A;"></span>
                            <input id="lastname" name="lastname" minlength="1" maxlength="40" type="text" required>

                            <label for="firstname">Prénom</label>
                            <span id="firstname-error" style="color: #E7002A;"></span>
                            <input id="firstname" name="firstname" minlength="1" maxlength="40" type="text" required>

                            <label for="password">Mot de passe</label>
                            <span id="password-error" style="color: #E7002A;"></span>
                            <input id="password" name="password" minlength="8" maxlength="100" type="password" required>
                            <div class="button-pos">
                                   <button type="submit" id="envoie" name="envoie">S'inscrire</button>
                            </div>
                     </form>
                     <?php if (!empty($errors)): ?>
                    <ul style="color: #E7002A;">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if (isset($success)): ?>
                    <p style="color: green;"><?php
                     echo $success;
                     ob_start();
                     header("Location: login.php");
                     ob_end_flush();
                     ?></p>
                <?php endif; ?>
              </div>
              
       </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>