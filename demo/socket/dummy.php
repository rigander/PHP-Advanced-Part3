<?
$name = strip_tags($_POST["name"]);
$age = $_POST["age"] * 1;
print_r($GLOBALS);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Передача данных методом POST через сокет</title>
</head>

<body style="background-color: #3c3f41; color:#e78125;">
<h1>Передача данных методом POST через сокет</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	if ($name and $age) {
		echo "<h1>Привет, $name</h1>";
		echo "<h3>Тебе $age лет</h3>";
	}
	else {
		print "<h3>Нет данных для вывода!</h3>";
	}
}
?>
</body>
</html>
