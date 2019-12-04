<head>
<title>Rynek</title>
</head>
<body>
<?php
	$dbhost="hosting1951002.online.pro"; $dbuser="00260676_zad7"; $dbpassword="Merol190#"; $dbname="00260676_zad7";
	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$polaczenie) {
	echo "Błąd połączenia z MySQL." . PHP_EOL;
	echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}
		$czas_obecny = date("y:m:d:H:i:s", time());
		$user = $_POST['uzytkownik'];
		$pass = $_POST['haslo'];
		$pass_again=$_POST['haslo_again'];
		
			if(!empty($user) && !empty($pass))
				{	
					$wynik=mysqli_query($polaczenie, "SELECT user FROM users WHERE user='$user'");
					$rekord = mysqli_fetch_array($wynik);
					
					if($rekord)
					{
						mysqli_close($polaczenie); 
						echo "User doesn't exist";
					}
					else
					{	if($pass==$pass_again)
						{
							mysqli_query($polaczenie, "INSERT INTO users (user,pass,stan) values ('$user','$pass','0')"); 
							echo "<br>New user created!</br>";
							echo "Registration pass - go to <a href='logowanie.php'>Logowania</a>";
							$katalog = $user;
								mkdir("./$katalog", 0777);
								echo "Folder uzytkownika został utworzony";
							mysqli_close($polaczenie);
						}
						else
						{
							echo "Password doesn't match!!!";
						}
					}
				}
				else
				{
					echo "Failed";
				}	
?>
</body>
</html>