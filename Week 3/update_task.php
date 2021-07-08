<?php
    include("CONST.php");
?>

<?php
    // Include config.php.
    require_once "config.php";

    // Initializing variables.
    $name = $description = "";
    $name_err = "";

    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        // Get hidden input value.
        $id = $_POST["id"];
        // Validate name and get description.
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
            $sql ="UPDATE tasks SET NAME=?, DESCRIPTION=? WHERE ID=?;";
            if($stmt = $mysqli->prepare($sql)) {
                // Bind variables to prepared statement as parameters.
                $stmt->bind_param("ssi", $param_name, $param_description, $param_id);
                // Set parameters.
                $param_name = $name;
                $param_description = $description;
                $param_id = $id;

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
        } else {
            // Check for validity of id parameter.
            if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
            $id = trim($_GET["id"]);

            $sql = "SELECT * FROM tasks WHERE ID= ?;";

                if($stmt = $mysqli->prepare($sql)) {
                    // Bind variables to prepared statement as parameters.
                    $stmt->bind_param("i", $param_id);
                    // Set parameters.
                    $param_id = $id;
                    // Execute statement.
                    if($stmt->execute()) {
                        $result = $stmt->get_result();
                        if($result->num_rows == 1) {
                            // Fetch result row as an associative array, 
                            // since the result should only return a single row there is no need to use a loop.
                            $row = $result->fetch_array(MYSQLI_ASSOC);
                            // Retrieve individual field values.
                            $name = $row["NAME"];
                            $description = $row["DESCRIPTION"];
                        } else {
                            header("location: error.php");
                            exit();
                        }
                    } else {
                        echo "Something went wrong. Please try again later.";
                    }
            }
            // Close statement.
            $stmt->close();

            // Close connection.
            $mysqli->close();
        } else {
            header("location: r.php");
            exit();
        }
    }}
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
            <input type="hidden" name="id" value="<?php echo $id ?>"><br>
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
            <input type="submit" name="update_task" value="Update Task"><br>
            <a href="index.php">Cancel</a>
        </div>
    </form>
</body>

</html>