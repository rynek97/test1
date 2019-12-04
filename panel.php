<?php
if ($_COOKIE['user']=='')
{
	exit();}	
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<title>Rynek</title>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
input[type=text] {
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password] {
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 25%;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  margin: 8px 0;
  border: 2px solid #ccc;;
  border-radius: 4px;
  cursor: pointer;
}
input[type=button] {
  width: 4%;
  background-color: Azure;
  color: black;
  padding: 10px 20px;
  margin: 8px 0;
  border: 2px solid #ccc;;
  border-radius: 4px;
  cursor: pointer;
}
input[type=button2] {
  width: 6%;
  background-color: Azure;
  color: black;
  padding: 10px 20px;
  margin: 8px 0;
  border: 2px solid #ccc;;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 10px;
  background-color: #f2f2f2;
  padding: 20px;
}
<BODY>
<div>
User's panel
<a href="logowanie.php">Logout</a></br>

<form method="POST" action="panel.php">
<br>
File name: <br>
<input type="text" name="nazwa_folderu" maxlength="20" size="10"><br>
<input type="submit" value="Utwórz"/>
</form>
<?php
$nazwa= $_POST['nazwa_folderu'];
$przegladarka=$dane['name'];
$system=$dane['platform'];
$ip_odwiedzajacego = $_SERVER["REMOTE_ADDR"];
$czas_obecny = date("y:m:d:H:i:s", time());
$user=$_COOKIE['user'];

	$dbhost="hosting1951002.online.pro"; $dbuser="00260676_zad7"; $dbpassword="Merol190#"; $dbname="00260676_zad7";
	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$polaczenie) {
	echo "Błąd połączenia z MySQL." . PHP_EOL;
	echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}
		mysqli_query($polaczenie, "SET NAMES 'utf8'");
		
		if ( isset ( $_POST['nazwa_folderu'] ) )
		{
			$katalog = $nazwa;
			if(!file_exists("./$user/$katalog"))
			{
				mkdir("./$user/$katalog", 0777);
				echo "<br>File created $nazwa</br>";
				mysqli_query($polaczenie, "INSERT INTO dirs (nazwa,user) values ('$katalog','$user')"); 
				
			}else
			{
				echo "<br>Directory already exist</br>";
			}					
		}


$result = mysqli_query($polaczenie, "SELECT nazwa FROM dirs where user='$user'");

echo"Select dir";
echo"<form action='odbierz.php' method='POST'ENCTYPE='multipart/form-data'>";
echo"<select name='problem'>";
echo"<option  selected='selected' value=''>Existing</option>";
echo"<br></br>";

while ($wiersz = mysqli_fetch_array ($result)) 	
			{ 	
				echo $id=$wiersz[0];
				echo"<option  value='$id'>$id</option>";
			}
			
echo"<input type='file' name='plik'/>";
echo"<input type='submit' value='Wyślij plik'/>";
echo"</form>";
echo"<form method='POST' action='pobieranie.php'>";
echo"<select name='pobieranie'>";
echo"<option  selected='selected' value=''>Main</option>";

$result = mysqli_query($polaczenie, "SELECT nazwa FROM dirs where user='$user'");
while ($wiersz = mysqli_fetch_array ($result)) 	
			{ 	
				echo $id=$wiersz[0];
				echo"<option  value='$id'>$id</option>";
			}
echo"<input type='submit' value='Go to your dir'/>";
echo"</form>";

echo 'Logged as: '.$_COOKIE['user'];
?>
</div>
</BODY>
</HTML>