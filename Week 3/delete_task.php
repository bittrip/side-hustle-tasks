<?php
    include("CONST.php");

    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        require_once "config.php";

        $sql = "DELETE FROM tasks WHERE ID=?";

        if($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("i", $param_id);

            $param_id = trim($_POST["id"]);

            if($stmt->execute()) {
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
        $stmt->close();

        $mysqli->close();
    } else {
        if(empty(trim($_GET["id"]))) {
            header("location: error.php");
            exit();
        }
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
    <!-- <link rel="stylesheet" href="staticfiles/css/main.css"> -->
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!--INSERT YOUR CODE HERE-->
    <a href="index.php">Return Home</a>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" class="update-form">
        <div class="form-title">
            Edit Task
        </div>
        <div class="form-element">
            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"><br>
        </div>
        <p>Are you sure you want to delete this task?</p>
        <input type="submit" value="Yes">
        <a href="index.php">No</a>
    </form>
    <script src="" async defer></script>
</body>

</html>