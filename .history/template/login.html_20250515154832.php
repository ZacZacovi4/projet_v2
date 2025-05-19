<?php
require $_SERVER['DOCUMENT_ROOT'] . '/../app/pages/login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>

<body>
      <form action="login.php" method="post">
            <input type="text" name="user">
            <input type="text" name="password">
      </form>
</body>

</html>