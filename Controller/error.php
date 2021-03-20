<?php
    $source_url = 'http'.((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page non trouvé</title>
</head>
<body>
    <h1>Vous ne pouvez pas accéder à <?php print($source_url); ?></h1>
</body>
</html>