<?php
session_start();
session_destroy(); //buang session
header("location:login.php");
?>