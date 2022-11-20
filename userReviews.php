<?php   
require 'database.php';

if(isset($_POST['submit'])) {

$stmt = $pdo->prepare('INSERT INTO review (reviews, auctId, userId, date_review) VALUES (:reviews, :auctId, :userId, :date_review)');
$date = date('Y-m-d H:i:s');
$values = [
    'reviews' => $_POST['review'],
    'auctId' => $_GET['auctId'],
    'userId' => $_SESSION['userDetails']["userId"],
    'date_review' => $date
];
$stmt->execute($values);
}

$stmt = $pdo->prepare("SELECT r.userId, u.name, u.userId, r.reviews, r.date_review 
FROM review r 
JOIN user u 
    ON r.userId = u.userId
WHERE auctId=:auctId");
$stmt->execute(['auctId' => $_GET['auctId']]);
$reviews = $stmt->fetchAll();
?>

<section class="reviews">
    <h2>Reviews of Users: </h2>
    <?php

    foreach ($reviews as $row) {
        echo '<ul>
            <li>' . $row['name'] . ' said ' . $row['reviews'] . ' <em>' . $row['date_review'] . '</em>' . '</li>
            </ul>';
    }
    ?>
    <form action="" method="POST">
        <label>Add your review</label> <textarea name="review"></textarea>

        <input type="submit" name="submit" value="Add Review" />
    </form>
</section>
</article>