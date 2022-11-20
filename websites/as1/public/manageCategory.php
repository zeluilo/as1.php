<?php
require 'head.php';
?>
<main>
    <?php

    require 'database.php';

    if (isset($_POST['submit'])) {

        $stmt = $pdo->prepare('INSERT INTO category (name) VALUES (:name)');

        $values = [
            'name' => $_POST['name'],
        ];

        if ($stmt->execute($values)) {
            echo 'Categories added';
        }

    ?>

        <table class="category-table">
            <th>Name</th>
            <th>Action</th>
            <?php
            $results = $pdo->query('SELECT * FROM category');
            foreach ($results as $row) {
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <a href="editCategory.php?updateId=<?php echo $row['categoryId'] ?>" class="btnedit">EDIT</a>

                        <a href="deleteCategory.php?deleteId=<?php echo $row['categoryId'] ?>" class="btndelete"> DELETE</a>
                    </td>
                    <td></td>
                </tr>
            <?php } ?>
        </table>

    <?php
    } else {
    ?>
        <div class="addCategory">
            <h1>Add Category!</h1>
            <form action="manageCategory.php" method="POST">
                <label>Category name : </label>
                <input type="text" placeholder="Enter the category name..." name="name" autocomplete="off" />
                <input class='btn' type="submit" name="submit" value="Add" />
            </form>
        </div>
    <?php
    }
    ?>

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
        text-align: center;
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
        margin: auto;
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

    .btnedit {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: bold;
        background: green;
        width: 10px;
        padding: 5px;
        text-align: center;
        text-decoration: none;
        /* color: white; */
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    }

    .btndelete {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: bold;
        background: red;
        width: 10px;
        padding: 5px;
        text-align: center;
        text-decoration: none;
        /* color: white; */
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    }
</style>