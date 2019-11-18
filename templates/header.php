<!DOCTYPE html>
<html lang="de" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Loginscript</title>
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
  </head>
  <body>
        <!-- <?php if(!is_checked_in()): ?> -->
          <div class="loginPage">

            <div class="navbar-collapse collapse">
              <form class="navbar-form navbar-right" action="login.php" method="post">
                <table class="login" role="presentation">
                  <tbody>
                    <tr>
                      <td>							
                        <div class="input-group">
                          <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                          <input class="form-control" placeholder="E-Mail" name="email" type="email" required>								
                        </div>
                      </td>
						<td><input class="form-control" placeholder="Passwort" name="passwort" type="password" value="" required></td>
						<td><button type="submit" class="btn btn-success">Login</button></td>
					</tr>
					<tr>
            <td><label><input type="checkbox" name="angemeldet_bleiben" value="remember-me" title="Angemeldet bleiben"  checked="checked" style="margin: 0; vertical-align: middle;" /> <small>Angemeldet bleiben</small></label></td>
						<td><small><a href="passwortvergessen.php">Passwort vergessen</a></small></td>
						<td></td>
					</tr>					
				</tbody>
			</table>		
      
      
    </form>         
  </div><!--/.navbar-collapse -->
  <!-- <?php else: ?> -->
   
    <header>
      <ul class="ulNavbarRechts">     
        <li><a href="overview.php">Übersicht</a></li> 
        <li><a href="internal.php">Interner Bereich</a></li>      
        <li><a href="settings.php">Einstellungen</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>   
    </header>
    
    <!-- <?php endif; ?> -->
  </div>
</div>