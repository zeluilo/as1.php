<?php
require 'database.php';

if(isset($_GET['categoryId'])){
	$stmt = $pdo -> prepare("SELECT a.auctId, a.image,  a.userId, a.title, a.description, a.categoryId, c.categoryId, c.name
	AS category_name, u.name, u.userId 
	FROM auction a 
	JOIN category c 
		ON a.categoryId = c.categoryId
	JOIN user u
		ON u.userId = a.userId
	WHERE categoryId = :categoryId");

	$stmt -> execute(['categoryId' => $_GET['categoryId']]);
	$auct = $stmt -> fetchAll();
}

if (isset($_GET['search'])) {
	$search = "%" . $_GET['search'] ."%";
	$stmt = $pdo -> prepare("SELECT a.auctId, a.image, a.userId, a.title, a.description, a.categoryId, c.categoryId, c.name
	AS category_name, u.userId, u.name 
	FROM auction a 
	JOIN category c 
		ON a.categoryId = c.categoryId
	JOIN user u
		ON a.userId = u.userId 
	WHERE a.title LIKE ? OR a.description LIKE ?");

	$stmt -> execute([$search, $search]);
	$auct = $stmt -> fetchAll();

} else {
	$stmt = $pdo -> prepare("SELECT a.auctId, a.image, a.userId, a.title, a.description, a.categoryId, c.categoryId, c.name 
	AS category_name, u.name, u.userId 
	FROM auction a 
	JOIN category c 
		ON a.categoryId = c.categoryId
	JOIN user u
		ON a.userId = u.userId
	LIMIT 10");
	
	$stmt -> execute();
	$auct = $stmt -> fetchAll();
}



foreach ($auct as $row) {
	$stmt = $pdo -> prepare("SELECT MAX(bid_amount) as bid_amount FROM bidding WHERE auctId = ?");
	$stmt -> execute([$row['auctId']]);
	$bidding = $stmt -> fetch();

	$imagePath = ($row['image']) ? "images/auctions/" . $row['image'] : "product.png";

	echo 
	'<ul class="productList">
		<li>

		<img src="'. $imagePath . '">
			<article class="categoryDetails"> 
				<h2>' . $row['title'] .'</h2>
				<h3>' . 'Category: ' . $row['name'] . '</h3>
				<p>' . $row['description'] . '</p>
				<p class="price">Current bid: £'. $bidding['bid_amount'] . '</p>
				<a href="categoryDetails.php?auctId=' . $row['auctId'] . '" class="more auctionLink">More &gt;&gt;</a>
			</article>
		</li>
	</ul>';
}
