<?php
//NEED
    session_start();
    if(session_destroy()) {
        header("Location: Main.php");
    }
?>
