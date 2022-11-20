<?php
session_start();
require 'database.php';

if (isset($_GET['auctId'])) {

    $stmt = $pdo->prepare('DELETE FROM auction WHERE auctId = :auctId');

    $values = [
        'auctId' => $_GET['auctId']
    ];

    $stmt->execute($values);
    header('Location: index.php');
  }
?>