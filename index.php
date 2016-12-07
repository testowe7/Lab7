<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cloud LOGIN</title>
<link href="./lib/css/bootstrap.min.css" rel="stylesheet">
<!--Pulling Awesome Font -->
<link href="./lib/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>
  
<a href="./register.php">Register now</a><br>

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <form class="form-login" method="POST" action="weryfikuj_haslo.php">
            <h4>Zaloguj się</h4>
            <input type="text" id="userName" name="user" class="form-control input-sm chat-input" placeholder="username" />
            </br>
            <input type="password" id="userPassword" name="pass" class="form-control input-sm chat-input" placeholder="password" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
				<button class="btn btn-lg btn-primary btn-md" type="submit" value="send">Sign in</button>
            </span>
            </div>
            </form>
        
        </div>
    </div>
</div>
  </body>
</html>
