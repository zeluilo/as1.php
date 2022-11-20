<?php
require 'database.php';

if ($_POST) {

    $stmt = $pdo->prepare('UPDATE auction SET title = :title, description = :description, endDate =:endDate 
                            WHERE auctId = :auctId');

    $endDate = date('Y-m-d H:i:s');

    $values = [
        'title' => $_POST['title'],
        'endDate' => $endDate,
        'description' => $_POST['description'],
        'auctId' => $_GET['auctId']
    ];

    $stmt->execute($values);
    header('Location: index.php');

}
$stmt = $pdo->prepare('SELECT * FROM auction WHERE auctId = :auctId');

$values = ['auctId' => $_GET['auctId']];

$stmt->execute($values);
$auct = $stmt->fetch();

?>


<body>
    <?php require 'head.php'; ?>
    <?php require 'navbar.php'; ?>
    <div class="form">
        <h1>Edit Auction!</h1>
        <form action="" method="POST">
            <br><label>Title</label>
            <input type="text" name="title" value="<?php echo $auct['title']; ?>" />
            <br><label>Description</label><br>
            <br>
            <textarea rows='2' cols='30' type="text" name="description" value="<?php echo $auct['description']; ?>"></textarea>
            <br><label>CategoryId</label><br>
            <br>
            <select name="categoryId">
                <?php
                $stmt = $pdo->prepare('SELECT * FROM category');
                $stmt -> execute();
                $cate = $stmt -> fetchAll();
                foreach ($cate as $row) {
                    if ($row['categoryId'] == $auct['categoryId']) {
                    $category = 'selected';
                } else {
                    $category = '';
                }
                echo '<option ' . $category . ' value="' . $row['category_id'] . '">' . $row['name'] . '</option>';
            }
            ?>
            </select><br>
            <br><label>EndDate</label>
            <input type="date" id='end' name="endDate" value="<?php $auct['endDate'] ?>" />
            <input class='auct_pic' type="file" name="auct_pic" />
            <input class='btn' type="submit" name="submit" value="Edit"/>
        </form>
    </div>
    </main>
</body>

<?php require 'foot.php';?>
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