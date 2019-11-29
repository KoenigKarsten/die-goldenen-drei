<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Internatsverwaltung</title>
    <!-- Custom styles for this template -->
    <link href="./css/style.css" rel="stylesheet" type="text/css" media="screen">
    <link href="./css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome.min.css">
    <link rel="icon" href="./icon.png">


</head>
<body>
<?php

require_once('./inc/functions.php');
if (!is_checked_in()): ?>
    <div class="limiter">
        <div class="container-login">

            <div class="loginBox">
                <img src="./img/logo.svg"
                     alt="Italian Trulli" id="bfwLogo">
                <form class="loginForm" action="login.php" method="post">
                    <span class="formUeberschrift">Anmeldebereich</span>
                    <?php
                    if (isset($error_msg) && !empty($error_msg)) {
                        echo $error_msg;
                    } ?>
                    <div class="emailWrap">
                        <input type="email" name="email" id="inputEmail" class="inputEmail" placeholder="E-Mail"
                               required
                               autofocus>
                        <span class="focusEmail"></span>
                    </div>

                    <div class="passwordWrap">
                        <input type="password" name="passwort" id="inputPassword" class="inputPassword"
                               placeholder="Passwort"
                               required>
                        <span class="focusPassword"></span>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="checkBox1" value="remember-me" name="angemeldet_bleiben" value="1"
                               checked>
                        <label for="checkBox1">
                        </label>
                    </div>
                    <div class="loginBtn">
                        <button class="loginFormBtn" type="submit">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php else: ?>

    <header>
        <nav>
            <ul class="ulNavbarRechts">
                <li><a href="overview.php" class="active">Übersicht</a></li>
                <li><a href="gaesteueberblick.php">Gäste</a></li>
                <li><a href="reservierungsueberblick.php">Reservierungen</a></li>
                <?php require_once('./inc/functions.php');
                $user = check_user();
                if ($user['admin'] == TRUE) {
                    echo "<li><a href=\"internal.php\">Intern</a></li>";
                } ?>
                <li><a href="settings.php">Einstellung</a></li>

                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

<?php endif; ?>
