<?php 
session_start();

$dir_name = $_POST['nazwa_podkatalogu'];
$path = "".$_SESSION['current_dir'].$dir_name."";
if (!file_exists($path)) {
    mkdir($path, 0777, true);
	
}

?>
<script>location.href="./wyslij.php"</script>;