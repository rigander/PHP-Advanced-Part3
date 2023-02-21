<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Labs</title>
</head>
<body style="background-color: #3c3f41; padding: 10px; color: #bd6f31; font-size: 25px;">

</body>
</html>
<?php
// todo Обработка исключений

function test($var = false){
    try {
        echo "Start\n";
        if(!$var)
        throw new Exception('$var is false!');
        echo "Continue\n";
}catch(Exception $e){
        echo "Exception: " . $e->getMessage() . "\n";
        echo "in file: " . $e->getFile() . "\n";
        echo "on line: " . $e->getLine() . "\n";
    }
    echo "The end\n";
}

test();

