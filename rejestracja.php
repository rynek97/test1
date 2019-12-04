<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<title>Rynek</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
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
User's registration
<form method="POST" action="sprawdz.php">
<br>
Login:
<br><input type="text" name="uzytkownik" maxlength="20" size="10"><br>
Password:
<br><input type="text" name="haslo" maxlength="20" size="10"><br>
Re-type pass:
<br><input type="text" name="haslo_again" maxlength="20" size="10"><br>
<input type="submit" value="Zarejestruj"/>
</form>
<br>
</div>
</BODY>
</HTML>