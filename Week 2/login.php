<?php
    // Start the session.
    session_start();
    include("CONST.php");
?>

<?php 
    $username = $password = "";
    $error_msg = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["username"] == "" || $_POST["password"] == "") {
            $error_msg = "You must fill in all credentials.";
        }else {
            $username = input_data($_POST["username"]);
            $password = input_data($_POST["password"]);
        } 
    }

    function input_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
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
    <link rel="stylesheet" href="staticfiles/css/main.css">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!--INSERT YOUR CODE HERE-->
    <a href="index.php">Return Home</a>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" class="login-form">
        <div class="form-title">
            Login Form
        </div>
        <div class="form-element">
            <label for="username">Username</label><br>
            <input type="text" name="username"><br> <span class="error">* <?php echo $error_msg; ?></span>
        </div>
        <div class="form-element">
            <label for="password">Password</label><br>
            <input type="password" name="password"><br> <span class="error">* <?php echo $error_msg; ?></span>
        </div>
        <div class="form-element">
            <input type="submit" name="login" value="Login"><br>
        </div>
    </form>
    <?php 
        error_reporting(E_ALL ^ E_WARNING);
        if (isset($_POST["login"])) {
            if ($_SESSION["username"] != null) {
                if ($_SESSION["username"] == $username && $_SESSION["password"] == $password) {
                    $_SESSION["active"] = "true";
                    echo "<script LANGUAGE='JavaScript'>window.alert(\"You have sucessfully logged in.\");
                                    window.location.href=\"index.php\";
                            </script>";
                }
            } else {
                echo "<span class=\"error\">Invalid credentials</span>";
            }
            
        }
    ?>
    <script src="" async defer></script>
</body>

</html>