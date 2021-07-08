<?php
    include("CONST.php");
?>

<?php
// Check for id parameter.
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file.
    require_once "config.php";

    // Prepare a select statement.
    $sql = "SELECT * FROM tasks WHERE ID = ?;";

    if($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters.
        $stmt->bind_param("i", $param_id);
        // Set parameters.
        $param_id = trim($_GET["id"]);
        // Execute the prepared statement.
        if($stmt->execute()) {
            $result = $stmt->get_result();

            if($result->num_rows == 1) {
                // Fetch result row as an associative array, 
                // since the result should only return a single row there is no need to use a loop.
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Retrieve individual field values.
                $name = $row["NAME"];
                $description = $row["DESCRIPTION"];
                $created_on = $row["CREATED_ON"];
                $modified_on = $row["MODIFIED_ON"];
            } else {
                // An invalid id is being referenced in the URL.
                header("location: error.php");
                exit();
            }
        } else {
        echo "Something went wrong. Please try again later.";
        }
        // Close statement.
        $stmt->close();
        // Close connection.
        $mysqli->close();
    } else {
        // URL does not contain an id parameter.
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
    <a href="index.php">Return Home</a><br>
    <label for="name">NAME</label><br>
    <p><?php echo $name; ?></p><br>
    <label for="name">DESCRIPTION</label><br>
    <p><?php echo $description; ?></p><br>
    <label for="name">CREATED ON</label><br>
    <p><?php echo $created_on; ?></p><br>
    <label for="name">MODIFIED ON</label><br>
    <p><?php echo $modified_on; ?></p><br>
    <script src="" async defer></script>
</body>

</html>