<?php
session_start();
require 'database.php';
$stmt = $pdo->prepare("SELECT * FROM category");
$stmt->execute();
$cate = $stmt->fetchAll();

if ($_POST) {
    if (isset($_POST['submit'])) {

        $for_directory = "images/auctions/";
        $for_pic = $for_directory . basename($_FILES["auct_pic"]["name"]);
        $browse = 1;
        $picType = strtolower(pathinfo($for_pic, PATHINFO_EXTENSION));

        $stmt = $pdo->prepare('INSERT INTO auction (title, description, categoryId, endDate, userId, image)
        VALUES (:title, :description, :categoryId, :endDate, :userId, :image)');

        $endDate = date_create($_POST['endDate'])->format("Y-m-d H:i:s");

        $values = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'endDate' => $endDate,
            'categoryId' => $_POST['categoryId'],
            'image' => $_FILES["auct_pic"]["name"],
            'userId' => $_SESSION['userDetails']["userId"]
        ];

        $stmt->execute($values);
        header('Location: index.php');

        if ($_FILES["auct_pic"]["name"]!== "") {
            $validate = getimagesize($_FILES["auct_pic"]["tmp_name"]);
            if ($validate != false) {
                $browse = 1;
            } else {
                $browse = 0;
            }

            if ($browse) {
                move_uploaded_file($_FILES["auct_pic"]["tmp_name"], $for_pic);
            }
        }
        
    }
}

?>


<body>
    <?php require 'head.php'; ?>
    <?php require 'navbar.php'; 
    ?>
    <a href='index.php'> . <button class='addcat'>Home Page</button></a>
    <a href='manageAdmin.php'> . <button class='addcat'>Manage Admins</button></a>
    <a href='addCategory.php'> . <button class='addcat'>Add Category</button></a>
    <a href='adminCategories.php'> . <button class='addcat'>Manage Category</button></a>
    <div class="form">
        <h1>Add Auction!</h1>
        <form action="addAuction.php" method="POST" enctype="multipart/form-data">
            <br><label>Title</label>
            <input type="text" name="title" />
            <br><label>Description</label><br>
            <br>
            <textarea rows='2' cols='30' type="text" name="description"></textarea>
            <br><label>CategoryId</label><br>
            <br>
            <select name="categoryId">
                <?php

                foreach ($cate as $row) {
                    echo '<option value="' . $row['categoryId'] . '">' . $row['name'] . '</option>';
                }

                ?>
            </select><br>
            <br><label>EndDate</label>
            <input type="date" name="endDate" value='' />
            <input class='auct_pic' type="file" name="auct_pic" />
            <input class='btn' type="submit" name="submit" value="Add" />
        </form>
    </div>
    </main>
</body>
    <?php
    require 'foot.php';
    ?>














    <style>
        .form {
            position: relative;
            top: 0%;
            left: 20%;
            width: 60%;
            border-radius: 10px;
        }

        .form h1 {
            font-size: 40px;
            text-align: center;
            text-transform: uppercase;
            margin-top: 30px;
            margin-bottom: 0px;
            font-weight: bold;
        }

        .form label {
            font-size: 20px;
            margin: 10px;
            width: 100px
        }

        .form input {
            font-size: 16px;
            padding: 15px 10px;
            width: 100%;
            border: 0;
            border-radius: 20px;
            outline: none;
            margin: 0px;
        }

        .form .btn {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px 15px;
            width: 20%;
            border: 0;
            border-radius: 5px;
            background-color: green;
        }

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