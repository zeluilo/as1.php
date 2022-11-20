<?php
session_start();
require 'database.php';

if (isset($_GET['deleteId'])) {

    $stmt = $pdo->prepare('DELETE FROM category WHERE categoryId = :categoryId');

    $values = [
        'categoryId' => $_GET['deleteId']
    ];

    $stmt->execute($values);
    header('Location: adminCategories.php');
  }
?>