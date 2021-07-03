<?php
    // Start the session.
    session_start();
    include("CONST.php");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $week ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="staticfiles/css/main.css"> -->
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <h1><?php echo $week; ?></h1>
    <h3>Question</h3>
    <p>Write a basic authentication program 
    that uses session to store user's data
        <ul>
            <li>User should be able to register.</li>
            <li>User should be able to login</li>
        </ul>
    </p>
    <h3>Solution</h3>
    <ul>
        <li><a href="register.php">REGISTRATION</a></li>
        <li><a href="login.php">LOGIN</a></li>
    </ul>
    <?php
    // Checks if session variables have been set.
    // error_reporting(E_ALL ^ E_WARNING);
    if (!empty($_SESSION)) {
        if (!empty($_SESSION["username"]) && $_SESSION["active"] == TRUE) {
            echo "You are logged in as ", $_SESSION["username"] ,".<br>";
            echo "<a href=\"logout.php\">Logout</a><br>";
        } elseif ($_SESSION["active"] == FALSE) {
            echo "You are not logged in.";
        }
    } else {
        echo "You are not logged in.";
    }
    ?>
    <script src="" async defer></script>
</body>

</html>