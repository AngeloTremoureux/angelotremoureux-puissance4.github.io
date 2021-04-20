<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=puissance4', 'root', '');
}
catch (PDOException $e) {
    print "Une erreur est survenue.";
    die();
}
?>