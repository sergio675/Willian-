<?php 
    session_start();
    session_destroy();
        echo "<script> location.href='../Views/interfaces/login.html'</script>";
?>