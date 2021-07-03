<?php
    // Start the session.
    session_start();

    $_SESSION["active"] = FALSE;
    echo "<script LANGUAGE='JavaScript'>window.alert(\"You have sucessfully logged out.\");
                                        window.location.href=\"index.php\";
         </script>";
?>