<?php
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
    <!--INSERT YOUR CODE HERE-->
    <div>
        <h1 class="heading">Tasks</h1>
        <a href="create_task.php">Create a New Task</a>
    </div>
    <?php
    // Include config.php.
    require_once "config.php";

    // Query the database
    // This query returns all rows from the table Tasks.
    $sql = "SELECT * FROM tasks;";
    if($result = $mysqli->query($sql)) {
        if($result->num_rows > 0) {
            echo '<table class=\'table\'>';
                echo '<thead>';
                    echo '<tr>';
                        echo '<th>#</th>';
                        echo '<th>Name</th>';
                        echo '<th>Description</th>';
                        echo '<th>Created on</th>';
                        echo '<th>Modified on</th>';
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while($row = $result->fetch_array()) {
                    echo '<tr>';
                        echo '<td>' . $row['ID'] . '</td>';
                        echo '<td>' . $row['NAME'] . '</td>';
                        echo '<td>' . $row['DESCRIPTION'] . '</td>';
                        echo '<td>' . $row['CREATED_ON'] . '</td>';
                        echo '<td>' . $row['MODIFIED_ON'] . '</td>';
                        echo '<td>';
                        echo '<a href="view_task.php?id='. $row['ID']. '">View</a>';
                        echo '</td>';
                        echo '<td>';
                        echo '<a href="update_task.php?id='. $row['ID']. '">Update</a>';
                        echo '</td>';
                        echo '<td>';
                        echo '<a href="delete_task.php?id='. $row['ID']. '">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                }
                echo '</tbody>';
            echo '</table>';
            // Free result set.
            $result->free();
        } else {
            echo '<div class=\'alert\'><em>No Tasks were found.</em></div>';
        }
    } else {
        echo '<div class=\'alert\'><em>Something went wrong. Please try again later.</em></div>';
    }
    $mysqli->close();
    ?>
    <script src="" async defer></script>
</body>

</html>