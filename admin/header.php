<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Loginscript</title>
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<?php if (!is_checked_in()): ?>
    <div class="mainContainer">

        <div id="login-box">
            <form action="login.php" method="post">
                <h2 class="form-signin-heading">Login</h2>
                <?php
                if (isset($error_msg) && !empty($error_msg)) {
                    echo $error_msg;
                }
                ?>
                <label for="inputEmail" class="sr-only">E-Mail</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-Mail" required
                       autofocus>
                <label for="inputPassword" class="sr-only">Passwort</label>
                <input type="password" name="passwort" id="inputPassword" class="form-control" placeholder="Passwort"
                       required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me" name="angemeldet_bleiben" value="1" checked>
                        Angemeldet
                        bleiben
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <br>
                <a href="passwortvergessen.php">Passwort vergessen</a>
            </form>

        </div>
    </div>
<?php else: ?>

    <header>
        <nav>
            <ul class="ulNavbarRechts">
                <li><a href="overview.php">Übersicht</a></li>
                <li><a href="gaesteueberblick.php">Gäste</a></li>
                <li><a href="reservierungsueberblick.php">Reservierungen</a></li>
                <li><a href="internal.php">Intern</a></li>
                <li><a href="settings.php">Einstellungen</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

<?php endif; ?>
</div>
</div>