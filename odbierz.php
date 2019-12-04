
<?php
$file = $_POST['problem'];
$user = $_COOKIE['user'];
$sciezka ="/".$user."/".$file;

	$dbhost="hosting1951002.online.pro"; $dbuser="00260676_zad7"; $dbpassword="Merol190#"; $dbname="00260676_zad7";
	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$polaczenie) {
	echo "Błąd połączenia z MySQL." . PHP_EOL;
	echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}

$max_rozmiar = 1000;

if (is_uploaded_file($_FILES['plik']['tmp_name']))
{
	if ($_FILES['plik']['size'] > $max_rozmiar) {echo "File oversized: $max_rozmiar"; }
	else
		{
			echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>';
			$nazwa_pliku = $_FILES['plik']['name'];

			if (file_exists("./$user/$file/".$nazwa_pliku)){echo "File exist in directory!";exit();
		}

		mysqli_query($polaczenie, "INSERT INTO files (nazwa_pliku,sciezka,user) values ('$nazwa_pliku','$sciezka','$user')");
		if (isset($_FILES['plik']['type'])) {echo 'Typ: '.$_FILES['plik']['type'].'<br/>'; 
	}

move_uploaded_file($_FILES['plik']['tmp_name'],"./$user/$file/".$_FILES['plik']['name']);
}
}
else {echo 'Transfer failed!';}
?>