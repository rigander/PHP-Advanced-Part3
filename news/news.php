<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>News feed</title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Latest news</h1>
  <?php

  ?>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    News headline:<br />
    <input type="text" name="title" /><br />
      <br>
    Choose category:<br />
    <select class="category" name="category">
      <option value="1">Politics</option>
      <option value="2">Culture</option>
      <option value="3">Sport</option>
    </select>
      <br>
    <br />
    News text:<br />
    <textarea name="description" cols="50" rows="5"></textarea><br />
      <br>
    Source:<br>
    <input type="text" name="source" /><br /><br>
    <br />
    <input class="add-button" type="submit" value="Add!" />
</form>
<?php

?>
</body>
</html>