<?php
// connecting to database
require 'database.php';

if (isset($_POST['submit'])) {

    $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO user (name, email, password, checkadmin) 
                            VALUES (:name, :email, :password, :checkadmin)');

    $values = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $pw,
        'checkadmin' => 'ADMIN'
    ];
    $stmt->execute($values);
}
?>



<body>
    <?php require 'head.php'; ?>
    <?php require 'navbar.php'; ?>
    <a href='index.php'> . <button class='addcat'>Home Page</button></a>
    <a href='manageAdmin.php'> . <button class='addcat'>Manage Admins</button></a>
    <a href='addCategory.php'> . <button class='addcat'>Add Category</button></a>
    <a href='adminCategories.php'> . <button class='addcat'>Manage Category</button></a>
    <main>
        <div class="form">
            <h1>Add Admin!</h1>
            <form action="addAdmin.php" method="POST">
                <label>Fullname</label>
                <input type="text" name="name" placeholder="Enter your Fullname" autocomplete="off" />

                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your Email" autocomplete="off" />

                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your Password" autocomplete="off" />

                <input class='btn' type="submit" name='submit' value="Add Admin"></a>
            </form>
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
            border-color: white;
            position: relative;
            top: 90%;
        }
    </style>