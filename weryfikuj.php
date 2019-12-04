<?php
$user=$_POST['user'];
$pass=$_POST['pass'];
$cookie='user';
$cookie_wartosc=$user;
setcookie($cookie, $cookie_wartosc, time() + (86400*30), "/");
$czas_obecny = date("y:m:d:H:i:s", time());

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<title>Rynek</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
	$dbhost="hosting1951002.online.pro"; $dbuser="00260676_zad7"; $dbpassword="Merol190#"; $dbname="00260676_zad7";
	$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$polaczenie) {
	echo "Błąd połączenia z MySQL." . PHP_EOL;
	echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}
mysqli_query($polaczenie, "SET NAMES 'utf8'");

$result = mysqli_query($polaczenie, "SELECT * FROM users WHERE user='$user'");
$rekord = mysqli_fetch_array($result);

if(!$rekord)
{
	mysqli_close($polaczenie);
		echo "Input is wrong!";
}
else if($rekord['stan']==1)
{
	$rezultat = mysqli_query($polaczenie, "SELECT czas FROM users where user='$user'");
	
	if ($wiersz = mysqli_fetch_array ($rezultat)) 	
		{ 	
			
			 $lock_time=$wiersz[0];
			 $ts = strtotime($lock_time);
			 $unlock= time();
		
				if($unlock > $ts + 60)
				{	
					mysqli_query($polaczenie, "UPDATE users SET stan= '0',czas='now()' WHERE user='$user'") or die ("Time exception");
					
					echo "Account locked!";
					echo "<a href='logowanie.php'>Back to Sign in</a></br>";
					exit();
				}
				else
				{
					echo"Try again later, 1 minute lock";
					exit();
				}
		}
}
if($rekord['pass']==$pass)
{	
	mysqli_query($polaczenie, "INSERT INTO logs (login,data,komunikat) values ('$user','$czas_obecny','0')") or die ("something went wrong...");
 
echo "<br> Login pass! </br>"; 

$rezultat5 = mysqli_query($polaczenie, "SELECT * FROM logs WHERE login = '$user' ORDER BY idlogi DESC LIMIT 1,1");

while ($wiersz = mysqli_fetch_array ($rezultat5)) 	
			{ 	
				 $ostrzezenie = $wiersz[3];
				 $aktywne=$aktywne+$ostrzezenie;
					
				if($aktywne==1)
				{	
					
					
					$wynik=mysqli_query($polaczenie, "SELECT data FROM logs WHERE login = '$user' and komunikat='1' ORDER BY idlogi DESC LIMIT 1") or die("something went wrong...");
					if ($wiersz = mysqli_fetch_array ($wynik)) 	
					{ 	
							$alarm = $wiersz[0];
							echo("<font color=\"#FF0000\">$user: Last Failed Sign in:$alarm</font>");
							echo"<br></br>";
					}
				}
			}

?>
<a href='panel.php'>Go to user's panel</a></br>
<?php

}
else
{
	
mysqli_query($polaczenie, "INSERT INTO logs (login,data,komunikat) values ('$user','$czas_obecny','1')");
$rezultat = mysqli_query($polaczenie, "SELECT * FROM logs ORDER BY idlogi DESC LIMIT 0,3");

while ($wiersz = mysqli_fetch_array ($rezultat)) 	
			{ 	
				 $liczba = $wiersz[3];
				 $proby=$proby+$liczba;
				
				if($proby==3)
				{	
					echo"Accoutn lock permamently, pls contact with Adam.R";
					
					mysqli_query($polaczenie, "UPDATE users SET stan= '1',czas='$czas_obecny' WHERE user='$user'") or die("something went wrong...time");
					
					exit();
				}
			}
			
			
			
			
			
			
			
mysqli_close($polaczenie);
echo "Input data is wrong";
}

?>
</BODY>
</HTML>