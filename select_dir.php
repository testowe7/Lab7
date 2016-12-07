<?php 
session_start();
$file_name = basename($_GET['file']);
$directory = "".$_SESSION['current_dir'].$file_name."/";
$_SESSION['current_dir'] = $directory;


echo "Jesteś zalogowany jako: ".$_SESSION['user_name']."<br>";
echo "Jesteś w: ".$directory."<br><br>";
?>
<html> 
  <head>
    <title>Cloud</title>

    <!-- Bootstrap core CSS -->
    <link href="./style.css" rel="stylesheet">

  </head>

<body> 
<form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data"> 
<input type="file" name="plik"/> 
<input type="submit" value="Wyślij plik"/> 
</form> 
<br>
<div class = "img_holder">
<?php

$path = $directory;
if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
			if(is_dir($path.$entry)){
				echo "<div style='width:148px;height:168px;border:40px;'>";
				echo "<figure>";
				echo "<a href='select_dir.php?file=".$entry."'";
				echo "><img src='Folder.png' alt='Folder' style='width:128px;height:128px;border:0;'></a>";
				echo "<figcaption>".$entry."</figcaption></figure>";
				echo "</div>";	
			}    
        }
    }
	closedir($handle);

}

if ($handle = opendir($path)) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {
			if(!is_dir($path.$entry)){
				echo "<div style='width:148px;height:168px;border:10px;'>";
				echo "<figure>";
				echo "<a href='download.php?file=".$entry."'";
				echo "><img src='File.png' alt='Folder' style='width:128px;height:128px;border:0;'></a>";
				echo "<figcaption>".$entry."</figcaption></figure>";
				echo "</div>";
			}
		}
	}
	closedir($handle);
}

?>
</div>


</body>
</html> 

