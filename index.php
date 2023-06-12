<?php
session_start();

// print_r($_SESSION);

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database-connection.php";

    $sql = "SELECT * FROM user
    WHERE id = {$_SESSION["user_id"]}
    ";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
</head>

<body>
    <?php if (isset($_SESSION["user_id"])): ?>
        <p>Hello
            <?= htmlspecialchars($user["name"]) ?>
        </p>

        <p><a href="logout.php">Logout</a></p>
    <?php else: ?>
        <p><a href="login.php">Login</a> or <a href="signup.html">Signup</a></p>
    <?php endif; ?>

    <h1>Home</h1>
</body>

</html>