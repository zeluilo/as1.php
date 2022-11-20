<?php
session_start();
require 'database.php';
$show_message='';

if (isset($_POST['submit'])) {

    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email LIMIT 1');

    $values = ['email' => $_POST['email']];
    $stmt->execute($values);
    $person = $stmt->fetch();
    if ($person) {
        $verify_pw = password_verify($_POST['password'], $person["password"]);
        if ($verify_pw) {
            $_SESSION['loggedin'] = $person['userId'];
            $_SESSION['userDetails'] = $person;

            header("Location: index.php");
        } else {
            $show_message = 'Wrong Information'; // for your password
        }
    } else {
        $show_message = 'Wrong Information'; // for your email
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>ibuy Auctions</title>
    <link rel="stylesheet" href="ibuy.css" />
</head>

<body>

    <main>
        <?php echo $show_message; ?>
        <div class="form">
            <h1>Login!</h1>
            <form action="login.php" method="POST">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your Email" />

                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your Password" />

                <input class='btn' type="submit" name='submit' value="Login">
            </form>
            <p>Do you need to Register? <a href="register.php">Register now!</a> </p>
        </div>
    </main>
</body>

<?php
require 'foot.php';
?>

















<style>
    .form {
        /* position: absolute;
    display: flex; */
        position: relative;
        top: 50%;
        left: 17%;
        width: 400px;
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
        width: 50%;
        border: 0;
        border-radius: 5px;
        background-color: green;
    }
</style>