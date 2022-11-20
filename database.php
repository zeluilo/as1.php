<?php

$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'as1';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

?>