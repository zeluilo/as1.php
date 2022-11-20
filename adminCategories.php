<?php
require 'database.php';
$results = $pdo->query('SELECT * FROM category')->fetchAll();
?>


<!DOCTYPE html>
<html>

<head>
    <title>ibuy Auctions</title>
    <link rel="stylesheet" href="ibuy.css" />
</head>

<body>

    <?php require 'head.php';
    ?>
    <a href='index.php'> . <button class='addcat'>Home Page</button></a>
    <a href='addAdmin.php'> . <button class='addcat'>Add Admin</button></a>
	<a href='manageAdmin.php'> . <button class='addcat'>Manage Admins</button></a>
	<a href='addCategory.php'> . <button class='addcat'>Add Category</button></a>
    <a href='addAuction.php'> . <button class='addcat'>Add Auctions</button></a>
    <table>
        <tr class="category-table">
            <th>Categories</th>
            <th>Action</th>
        </tr>
        <?php

        foreach ($results as $row) {
            echo
            "<tr>
        <td>" . $row['name'] . "</td>
        
        <td>
            <a href='editCategory.php?updateId=" . $row["categoryId"] . "'><button  class='btnedit'>EDIT</button></a>
            <a href='deleteCategory.php?deleteId=" . $row["categoryId"] . "'><button  class='btndelete'>DELETE</button></a>
        </td>
    </tr>";
        }
        ?>
        
    </table>

</body>

<?php require 'foot.php'; ?>





<style>
    table {
        width: 50%;
        border-bottom: 0.3cm solid palegoldenrod;
        margin: auto;
        margin-top: 30px;
        padding-top: 25px 0px;
        border: 2px solid #dddddd;
    }

    .category-table {
        border-collapse: collapse;
        margin: auto;
        font-size: 0.9em;
        min-width: 200px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    tr:nth-child(even) {
        border-bottom: 0.03cm solid grey;
    }

    td,
    th {
        border-bottom: 2px solid #dddddd;
    }

    .category-table th {
        background-color: palegoldenrod;
        color: black;
        text-align: left;
        font-weight: bold;
        padding: 10px 0px;
        font-size: 20px;
        text-transform: uppercase;
        text-align: center;
    }

    .category-table td {
        padding: 10px 0px;
        text-align: center;

    }

    .category-table tr {
        border-bottom: 0.02cm solid grey;
    }

    .category-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .category-table tbody tr:last-of-type {
        border-bottom: 3px solid palegoldenrod;
    }

    tr {
        text-align: center;
        border-bottom: 0.3cm solid grey;
    }

    .btnedit {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: bold;
        background: green;
        width: 70px;
        padding: 5px 0px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    }

    .btnadd {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: bold;
        background: palegoldenrod;
        width: 70px;
        padding: 5px 0px;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 10px rgb(0 0 0 / 10%);
        position: relative;
        top: 50%;
        left: 50%;
    }

    .btndelete {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: bold;
        background: red;
        width: 70px;
        padding: 5px 0px;
        text-align: center;
        text-decoration: none;
        /* color: white; */
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 10px rgb(0 0 0 / 10%);
        background-color: red;
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