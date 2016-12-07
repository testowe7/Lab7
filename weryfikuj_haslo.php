<?php
session_start();

$servername = "serwer1648669.home.pl";
$username = "21764779_n2";
$password = "&BW-kxI3D%,s";
$dbname = "21764779_n2";

$user=$_POST['user']; // login z formularza
$pass=$_POST['pass']; // hasło z formularza
$link = mysqli_connect($servername, $username, $password, $dbname); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków

$result = mysqli_query($link, "SELECT * FROM users1 WHERE user_name='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
$rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD

$ip = $_SERVER["REMOTE_ADDR"];
$timestamp = date("Y-m-d H:i:s");

$blocked = 0;

$_SESSION['wrong_login'] = 0;


if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
{
	
	$success = 0;

	// $result2 = mysqli_query($link, "SELECT count(*) FROM logi WHERE user_name='admin' LIMIT 3");
	// $rekord2 = mysqli_fetch_array($result);
	// if($rekord2['count(*)'] <= 3){
		// echo "Konto zablokowane !";
	// }
	
	$result = mysqli_query($link, "INSERT INTO logi (successfull, ip, timestamp) VALUES ('".$success."', '".$ip."', '".$timestamp."')"); 

	
	mysqli_close($link); // zamknięcie połączenia z BD
echo "Nieudane logowanie!"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
}
else
{ // Jeśli $rekord istnieje
if($rekord['password']==$pass) // czy hasło zgadza się z BD
{
setcookie($user, '1');
$success = 1;
	
$_SESSION['user_id'] = $rekord['id'];
$_SESSION['user_name'] = $rekord['user_name'];

$result = mysqli_query($link, "SELECT successfull, timestamp FROM logi WHERE user_name='admin' ORDER BY id DESC LIMIT 1"); // pobranie z BD wiersza, w którym login=login z formularza
$rekord2 = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD

if($rekord2['successfull'] == 0){
	echo "<script type='text/javascript'>alert(";
	echo "'Data ostatniego błędnego logowania: ".$rekord2['timestamp']."";
	echo "')</script>";
}

// if(($rekord2['timestamp']) && ($wrong_login == 1)){
	// $wrong_login == 0;
	// echo "<script type='text/javascript'>alert(";
	// echo "'Data ostatniego błędnego logowania: ".$timestamp."";
	// echo "')</script>";
// }


// gdy typ uzytkownika jest rowny 0 to mamy do czynienia z klientem i  wtdey wysyłany jest log logowania do tabeli logów klienckich, 
// gdy jest inaczej, to wysyłamy je do logów pracowników, odsyłamy odpowiednich użytkowników do odpowiednich paneli użytkownika

	$result = mysqli_query($link, "INSERT INTO logi (successfull, user_name, ip, timestamp) VALUES ('".$success."', '".$_SESSION['user_name']."', '".$ip."', '".$timestamp."')"); // pobranie z BD wiersza, w którym login=login z formularza
		?>
		<script>location.href="./wyslij.php"</script>;
		<?php
	exit();	
}
else
{
	$_SESSION['wrong_login'] = 1;
	$counter = 0;
	if(isset($_COOKIE["".$user.""])){
			$counter = $_COOKIE["".$user.""] + 1;
			setcookie($user, $counter);	
			if($_COOKIE["".$user.""] >= 3){
				echo "Konto zablokowane !<br>";
				$blocked = 1;
			}else{
				
			}
	}else{
		setcookie($user,'1');
		$blocked = 0;
	}
	
$success = 0;

$result = mysqli_query($link, "INSERT INTO logi (successfull, user_name, ip, timestamp) VALUES ('".$success."', '".$_SESSION['user_name']."', '".$ip."', '".$timestamp."')"); // pobranie z BD wiersza, w którym login=login z formularza
mysqli_close($link);
echo "Nieudane logowanie!"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
}
}

?>
	
</BODY>
</HTML>