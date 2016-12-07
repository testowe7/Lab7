<?php 
session_start();
$main_directory = "/aplikacje_sieciowe/Lab7/uploads/";

if (is_uploaded_file($_FILES['plik']['tmp_name'])) 
{ 
$uploaddir = "".$_SESSION['current_dir']."/".$_FILES['plik']['name']."";

echo 'Odebrano plik.<br/><a href="wyslij.php">Wróć do chmury</a>'; 
move_uploaded_file($_FILES['plik']['tmp_name'], $uploaddir);
 
} else 
{
	echo 'Błąd przy przesyłaniu danych!';
} 
?>