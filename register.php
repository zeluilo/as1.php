<?php
// connecting to database
require 'database.php';

if (isset($_POST['submit'])) {

    $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo -> prepare('INSERT INTO user (name, email, password, checkadmin) 
                            VALUES (:name, :email, :password, :checkadmin)');
  
  $values = [
    'name' => $_POST['name'],
    'email' => $_POST['email'], 
    'password' => $pw,
    'checkadmin' => 'USER'
    ];
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

<main>
    <div class="form">
        <h1>Register!</h1>
        <form action="register.php" method="POST">
            <label>Fullname</label>
            <input type="text" name="name" placeholder="Enter your Fullname" autocomplete="off"/>

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your Email" autocomplete="off"/>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your Password" autocomplete="off"/>

            <input class='btn' type="submit" name='submit' value="Register Now"></a>
        </form>
        <p>already have an account? <a href="login.php">Login now!</a> </p>
    </div>
</main> 


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
            width: 20%;
            border: 0;
            border-radius: 5px;
            background-color: green;
        }
    </style>

