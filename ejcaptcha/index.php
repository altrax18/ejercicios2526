<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captcha_Validacion</title>
</head>
<body>
  <?php
    require 'crea.php';
    require 'validation.php';

    $captcha_img = create();

    echo '<img src="'. $captcha_img .'" alt="CAPTCHA"><br>';
    echo <<<EOD
    <form method="POST" action="validation.php">
        <input type="text" name="input">
        <input type="submit" name="submit" value="Submit">
        <input type="hidden" name="auth" value="{$AUTH}">
    </form>
    EOD;
  ?>
</body>
</html>
