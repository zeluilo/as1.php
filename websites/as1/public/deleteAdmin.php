<?php
session_start();
require 'database.php';

if (isset($_GET['delId'])) {

    $stmt = $pdo->prepare('DELETE FROM user WHERE userId = :userId');

    $values = [
        'userId' => $_GET['delId']
    ];

    $stmt->execute($values);
    header('Location: manageAdmin.php');
  }
?>