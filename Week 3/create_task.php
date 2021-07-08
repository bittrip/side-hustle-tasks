<?php
    include("CONST.php");
?>

<?php
    // Include config.php.
    require_once "config.php";

    // Initializing variables.
    $name = $description = "";
    $name_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name.
        $input_name = trim($_POST["name"]);
        $input_description = trim($_POST["description"]);
        if(empty($input_name)) {
            $name_err = "This field is required.";
        } else {
            $name = $input_name;
            $description = $input_description;
        }

        // Check for errors before inserting into database.
        if(empty($name_err)) {
            // SQL insert statement.
            $sql = "INSERT INTO tasks(name, description) VALUES(?, ?)";
            if($stmt = $mysqli->prepare($sql)) {
                // Bind variables to prepared statement as parameters.
                $stmt->bind_param("ss", $param_name, $param_description);
                // Set parameters.
                $param_name = $name;
                $param_description = $description;

                // Execute the prepared statement.
                if($stmt->execute()) {
                    // Commit Successful redirect to landing page.
                    header("location: index.php");
                    exit();
                } else {
                    echo "Something has gone wrong. Please try again later.";
                }

                // Close statement.
                $stmt->close();
            }

            // Close connection.
            $mysqli = close();
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
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" class="create-form">
        <div class="form-title">
            Create Task
        </div>
        <div class="form-element">
            <label for="name">Name</label><br>
            <input type="text" name="name" value="<?php echo $name ?>"><br> <span class="error">* <?php echo $name_err; ?></span>
        </div>
        <div class="form-element">
            <label for="description">Description</label><br>
            <input type="text-area" name="description" value="<?php echo $description ?>"><br>
        </div>
        <div class="form-element">
            <input type="submit" name="create_task" value="Create Task"><br>
            <a href="index.php">Cancel</a>
        </div>
    </form>
</body>

</html>