<?php
session_start();
require 'database.php';


$stmt = $pdo->prepare("SELECT a.auctId, a.image, a.userId, a.title, a.description, a.categoryId, a.endDate, c.categoryId, c.name
AS category_name, u.name, u.userId , MAX(b.bid_amount)
AS bid_amount
FROM auction a 
JOIN category c 
    ON a.categoryId = c.categoryId
JOIN user u
    ON u.userId = a.userId
LEFT JOIN bidding b
    ON a.userId = u.userId
WHERE a.auctId = :auctId
");
$stmt->execute(['auctId' => $_GET['auctId']]);
$auct = $stmt->fetch();

$date = strtotime($auct['endDate']);
$left_time = $date - time();

$day = floor($left_time / (60 * 60 * 24));
$left_time %=  (60 * 60 * 24);

$hour = floor($left_time / (60 * 60 * 24));
$left_time %=  (60 * 60);

$minute = floor($left_time / (60 * 60 * 24));
$left_time %=  60;

if($minute > 0 ) {
    $showTime = "$day days and $hour hours and $minute mins";
} else {
    $showTime = 'Auction Expired';
}




?>




<body>

    <?php
    require 'head.php';
    require 'navbar.php';
    ?>
    <main>
        <?php
        $imagePath = ($auct['image']) ? "images/auctions/" . $auct['image'] : "product.png";
        echo
        '<h1>Category Page</h1>  
        <article class="product">
        <img src="'. $imagePath . '">
                <section class="details">

                    <h2>Auction: ' . $auct["title"] . '</h2>
                    <h3>' . 'Category: ' . $auct["category_name"] . '</h3>
                    <p>Auction created by ' . $auct['name'] . '</p>
                    <p class="price">Current bid: £' . $auct['bid_amount'] . '</p>
                    <time>Time left: '. $showTime . '</time>

                    <form action="" class="bid" method="POST">
                        <input type="text" name="bid" placeholder="Enter bid amount" />
                        <input type="submit" class="bid_btn" value="Place bid" />
                        <input hidden name="auctId" value="' . $auct['auctId'] . '"/>
                    </form>

                </section>
            <section class="description">
                <p>' . 'Description: ' . $auct["description"] . '</p>'
        ?>
        <a href="editAuction.php"> <button class="bid_btn">EDIT AUCTION</button></a>
        </section>
        <?php require "userReviews.php"; ?>
        <?php require "foot.php"; ?>
    </main>



    <style>
        .addcat {
            font-family: "Roboto", sans-serif;
            font-size: 16px;
            font-weight: bold;
            background: blue;
            width: 190px;
            color: white;
            padding: 10px 0px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 0 10px rgb(0 0 0 / 10%);
            position: relative;
            margin-top: 15px;
        }
    </style>
</body>

</html>