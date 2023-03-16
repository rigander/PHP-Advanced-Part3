<?php

?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <title>Registration</title>
  <link rel="stylesheet" href="styles-gd.css">
</head>

<body>
  <h2>Captcha</h2>
  <br>
  <form action="" method="post">
    <div>
      <img src="noise-picture.php">
    </div>
    <br>
    <div>
      <label>Enter String</label>
      <input class="input-field" type="text" name="answer" size="6">
    </div>
    <br>
    <input class="submit" type="submit" value="Send">
  </form>
  <br>
  <?php
  var_dump($_POST);
  var_dump($_SESSION);

  if(!$_POST["answer"]){
     echo "Please fill up captcha";
  }
  elseif ($_POST["answer"] === $_SESSION["captchaString"]){
      echo "All if fine";
  }else{
      echo "Mistake. Please try again.";
  }

  ?>
</body>

</html>