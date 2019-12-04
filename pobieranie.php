<html>
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

echo"<form method='POST' action='przerzut.php'>";
echo"<select name='pobieranie'>";

$result = mysqli_query($polaczenie, "SELECT nazwa_pliku FROM files WHERE sciezka='$sciezka'");

while ($wiersz = mysqli_fetch_array ($result)) 	
			{ 	
				 $id=$wiersz[0];
				 echo"<option value='$id'>$id</option>";
			}

echo"<input type='submit' name='nadus' value='Pobierz Wybrany Plik'/>";
echo"</form>";
?>
</html>