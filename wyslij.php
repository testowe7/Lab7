<?php 
session_start();
$main_directory = './uploads/';
$path = "".$main_directory.$_SESSION['user_name']."/";
$_SESSION['current_dir'] = $path;


echo "Jesteś zalogowany jako: ".$_SESSION['user_name']."<br>";
echo "Jesteś w: ".$path."<br><br>";
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
<form action="make_dir.php" method="POST" ENCTYPE="multipart/form-data"> 
<input type="text" name="nazwa_podkatalogu"/> 
<input type="submit" value="Stwórz podkatalog"/> 
</form> 
<br>
<div class = "img_holder">
<?php



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