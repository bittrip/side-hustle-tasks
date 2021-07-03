<?php
    // Start the session.
    session_start();
    include("CONST.php");
?>

<?php 
    $first_name = $last_name = $email = $username = $password = $confirm_password = "";
    $first_name_err = $last_name_err = $email_err = $username_err = $password_err = $confirm_password_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["first_name"])) {
            $first_name_err = "This field is required.";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["first_name"])) {
            $first_name_err = "This field only allows letters and whitespace.";
        } else {
            $first_name = input_data($_POST["first_name"]);
        }
        if (empty($_POST["last_name"])) {
            $last_name_err = "This field is required.";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST["last_name"])) {
            $last_name_err = "This field only allows letters and whitespace.";
        } else {
            $last_name = input_data($_POST["last_name"]);
        }
        if (empty($_POST["email"])) {
            $email_err = "This field is required.";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format.";
        } else {
            $email = input_data($_POST["email"]);
        }
        if (empty($_POST["username"])) {
            $username_err = "This field is required.";
        } elseif (!preg_match("/^[0-9a-zA-Z-'_]*$/", $_POST["username"])) {
            $username_err = "This field only allows letters no whitespace is allowed.";
        } else {
            $username = input_data($_POST["username"]);
        }
        if (empty($_POST["password"])) {
            $password_err = "This field is required.";
        } elseif (!preg_match("/.{6,}/", $_POST["password"])) {
            $password_err = "Your password must have atleast six characters.";
        } else {
            $password = input_data($_POST["password"]);
        }
        if (empty($_POST["confirm_password"])) {
            $confirm_password_err = "This field is required.";
        } elseif ($_POST["confirm_password"] !== $_POST["password"]) {
            $confirm_password_err = "Passwords do not match.";
        } else {
            $confirm_password = input_data($_POST["confirm_password"]);
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
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" class="registration-form">
        <div class="form-title">
            Registration Form
        </div>
        <div class="form-element">
            <label for="first_name">First Name</label><br>
            <input type="text" name="first_name" value="<?php echo $first_name ?>"><br> <span class="error">* <?php echo $first_name_err; ?></span>
        </div>
        <div class="form-element">
            <label for="last_name">Last Name</label><br>
            <input type="text" name="last_name" value="<?php echo $last_name ?>"><br> <span class="error">* <?php echo $last_name_err; ?></span> 
        </div>
        <div class="form-element">
            <label for="email">Email</label><br>
            <input type="text" name="email" value="<?php echo $email ?>"><br> <span class="error">* <?php echo $email_err; ?></span>
        </div>
        <div class="form-element">
            <label for="username">Username</label><br>
            <input type="text" name="username" value="<?php echo $username ?>"><br> <span class="error">* <?php echo $username_err; ?></span>
        </div>
        <div class="form-element">
            <label for="password">Password</label><br>
            <input type="password" name="password"><br> <span class="error">* <?php echo $password_err; ?></span>
        </div>
        <div class="form-element">
            <label for="confirm_password">Confirm Password</label><br>
            <input type="password" name="confirm_password"><br> <span class="error">* <?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-element">
            <input type="submit" name="register" value="Register"><br>
        </div>
    </form>
<?php
    if (isset($_POST["register"])) {
        if ($first_name_err == "" && $last_name_err == "" && $email_err == "" && $username_err == "" && $password_err == "" && $confirm_password_err == "") {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["email"] = $email;
            $_SESSION["first_name"] = $first_name;
            $_SESSION["last_name"] = $last_name;
            $_SESSION["active"] = TRUE;
            $_SESSION["error"] = FALSE;
            echo "<script LANGUAGE='JavaScript'>window.alert(\"You have sucessfully registered.\");
                         window.location.href=\"index.php\";
                 </script>";
        } else {
            $_SESSION["error"] = TRUE;
            $_SESSION["active"] = FALSE;
        }
    }
?>
    <script src="" async defer></script>
</body>

</html>