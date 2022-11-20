<?php
require 'database.php';

if (isset($_POST['submit'])) {

    $stmt = $pdo->prepare('INSERT INTO category (name) VALUES (:name)');

    $values = ['name' => $_POST['name']];

    $stmt->execute($values);
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>ibuy Auctions</title>
    <link rel="stylesheet" href="ibuy.css" />
</head>

<body>

    <?php require 'head.php'; ?>
    <?php require 'navbar.php'; ?>
    <a href='index.php'> . <button class='addcat'>Home Page</button></a>
    <a href='manageAdmin.php'> . <button class='addcat'>Manage Admins</button></a>
    <a href='addCategory.php'> . <button class='addcat'>Add Category</button></a>
    <a href='adminCategories.php'> . <button class='addcat'>Manage Category</button></a>
    <main>
        <div class="addCategory">
            <h1>Add Category!</h1>
            <form action="addCategory.php" method="POST">
                <label>Category name : </label>
                <input type="text" placeholder="Enter the category name..." name="name" autocomplete="off" />
                <input class='btn' type="submit" name="submit" value="Add" />
            </form>
        </div>
    </main>

    <?php
    require 'foot.php';
    ?>















    <style>
        .addCategory {
            position: relative;

        }

        .addCategory h1 {
            font-size: 40px;
            text-transform: uppercase;
            margin-top: 30px;
            margin-bottom: 0px;
            font-weight: bold;
        }

        .addCategory label {
            font-size: 20px;
            margin: 10px;
            width: 100px
        }

        .addCategory input {
            font-size: 16px;
            padding: 15px 10px;
            width: 100%;
            border: 0;
            border-radius: 20px;
            outline: none;
            margin: 0px;
        }

        .addCategory .btn {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px 15px;
            width: 20%;
            border: 0;
            border-radius: 5px;
            background-color: green;
        }

        .category-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .category-table th {
            background-color: palegoldenrod;
            color: black;
            text-align: left;
            font-weight: bold;
            padding: 10px 0px;
        }

        .category-table td {
            padding: 10px 0px;
        }

        .category-table tbody tr {
            border-bottom: 0.02cm solid grey;
        }

        .category-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .category-table tbody tr:last-of-type {
            border-bottom: 3px solid palegoldenrod;
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