<?php
	$dbhost="hosting1951002.online.pro"; $dbuser="00260676_zad7"; $dbpassword="Merol190#"; $dbname="00260676_zad7";
	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$polaczenie) {
	echo "Błąd połączenia z MySQL." . PHP_EOL;
	echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}
$port = '80';
$file = $_POST['pobieranie'];
$user=$_COOKIE['user'];
$sciezka ="/".$user."/".$file;
$cookie='sciezka';
$cookie_wartosc=$sciezka;
setcookie($cookie, $cookie_wartosc, time() + (86400*30), "/");
$_COOKIE['sciezka'];

if($file=='')
{
	echo "Main dir ";
}
else
{
	echo "Dir: ".$file;
}
echo"<style>
input[type=text], select {
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
</style>";

echo"<div>";
echo"<form method='POST' action='przerzut.php'>";
echo"<select name='pobieranie'>";

$result = mysqli_query($polaczenie, "SELECT nazwa_pliku FROM files WHERE sciezka='$sciezka'");

while ($wiersz = mysqli_fetch_array ($result)) 	
			{ 	
				 $id=$wiersz[0];
				 echo"<option value='$id'>$id</option>";
			}

echo"<input type='submit' name='nadus' value='Download'/>";
echo"</form>";
echo"</div>";
?>
