<?php
session_start();
require 'database.php';

if (isset($_POST['submit'])) {

    $stmt = $pdo->prepare('UPDATE user SET name = :name WHERE userId = :userId');

    $values = [
        'name' => $_POST['name'],
        'userId' => $_GET['upId']
    ];

    $stmt->execute($values);
    header('Location: manageAdmin.php');
    echo 'Category Edited!';
}
$stmt = $pdo->prepare('SELECT * FROM user WHERE userId = :userId');

$values = ['userId' => $_GET['upId']];

$stmt->execute($values);
$person = $stmt->fetch();

?>

<body>
    <?php require 'head.php'; ?>
    <?php require 'navbar.php'; ?>
    <main>
        <div class="addCategory">
            <h1>Edit Admin!</h1>
            <form action="" method="POST">
                <label>Admin name : </label>
                <input type="text" value="<?php echo $person['name']; ?>" name="name" autocomplete="off" />
                <input class='btn' type="submit" name="submit" value="Edit" />
            </form>
        </div>

        <?php require 'foot.php'; ?>
    </main>
</body>










<style>
    .addCategory {
        position: relative;

    }

    .addCategory h1 {
        font-size: 30px;
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
</style>


</main>
<?php
require 'foot.php';
?>