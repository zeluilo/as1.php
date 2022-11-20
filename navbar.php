<?php
require 'database.php';
?>
<nav>
    <ul>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM category");
        $stmt->execute();
        $user = $stmt->fetchAll();

        foreach ($user as $rows) {
            echo '<li><a class="categoryLink" href="index.php?id=' . $rows['categoryId'] . '">' . $rows['name'] . '</a></li>';
        }
        ?>
    </ul>
</nav>
<img src="banners/1.jpg" alt="Banner" />

<style>
    .categoryLink {
        font-family: "Roboto", sans-serif;
        font-size: 26px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
    }
</style>