<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="./lib/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
<?php
  // połącznie z bazą danych
$servername = "serwer1648669.home.pl";
$username = "21764779_n2";
$password = "&BW-kxI3D%,s";
$dbname = "21764779_n2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
   
  ?>
  
   <div class="container" style="width:500px" >
      <div class="panel panel-default" >
         <div class="panel-heading">
            <div class="panel-title">Registration</div>
         </div>     

         <div style="padding-top:30px" class="panel-body" >
            <form class="form-signin" method="POST">
            <h2 class="form-signin-heading">Please register in</h2>
            <label for="inputNick" class="sr-only">Nick</label>
            <input type="text" name="rnick" id="inputNick" class="form-control" placeholder="Enter your future nick" >
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="ppassword" id="inputPassword" class="form-control" placeholder="Enter your futere password" >
			<label for="inputRePassword" class="sr-only">Repeat password</label>
            <input type="password" name="re_password" id="inputRePassword" class="form-control" placeholder="Repeat your future password" >
            <input type="submit" value="Confirm registration"/>
            </form>   
         </div>
		 <a href="./index.php">Back to logging in<a/>
      </div>
<?php
$nick = $_POST['rnick'];
$password = $_POST['ppassword'];
$re_password = $_POST['re_password'];

if (IsSet($_POST['rnick']) && ($password==$re_password)) {
	$sql = "INSERT INTO users1 (user_name, password) VALUES ('".$nick."', '".$password."')";
	$result = $conn->query($sql);
	if(!empty($result)){
		
$path = './uploads/';
$dir_name = basename($nick);
$path = $path.$dir_name;
if (!file_exists($path)) {
    mkdir($path, 0777, true);
	
}

			echo "<script type='text/javascript'>alert('Submitted successfully! Now you can log in!')</script>";
		?>
		<script>location.href="./index.php"</script>;
		<?php
		
		
	}else{
		echo "<script type='text/javascript'>alert('Failed! Try with different nickname')</script>";
		
	}
	


} elseif(IsSet($_POST['rnick'])){
	echo "<script type='text/javascript'>alert('Failed! Try again')</script>";
	
}
?>
   </div> <!-- /container -->
  </body>
</html>
