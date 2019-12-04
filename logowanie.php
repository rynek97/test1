<?php
$cookie='user';
$cookie_wartosc='';
setcookie($cookie, $cookie_wartosc, time() + (86400*30), "/");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<title>Rynek</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
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
</style>
<BODY>
<div>
Cloud Sign up
<form method="post" action="weryfikuj.php">
Login
<br><input type="text" name="user" maxlength="20" size="20"><br>
Password
<br><input type="password" name="pass" maxlength="20" size="20"><br>
<input type="submit" value="Send"/>
</form>
<a href="rejestracja.php">Registration</a></br>
<a href='index.php'>Back</a></br>
</div>
</BODY>
</HTML>