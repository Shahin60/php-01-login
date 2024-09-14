<?php
session_start();
if (!empty($_SESSION['login'])) {
    echo $_SESSION['login'];
} else {
    echo ' error';
}


?>
<p><a href="logout.php">log out</a></p>