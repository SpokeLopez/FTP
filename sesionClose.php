<?php
session_start();
session_name('ftp');
session_destroy();
header("Location:index.php");
?>