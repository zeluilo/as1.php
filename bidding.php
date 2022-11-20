<?php
session_start();
require 'database.php';
$stmt = $pdo->prepare('INSERT INTO bidding (bid_amount, auctId, userId) VALUES (:bid_amount, :auctId, :userId)');

$values = [
'bid_amount' => $_POST['bid'],
'auctId' => $_POST ['auctId'],
'userId' => $_SESSION['userDetails']["userId"]
];

$stmt->execute($values);
header ('Location: categoryDetails.php?auctId=' . $_POST['auctId'] . '');
?>