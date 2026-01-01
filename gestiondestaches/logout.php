<?php
session_start();
$_SESSION = [];
session_destroy();
header("Location: c:\L2GL\htdocs\G3\gestiosdestaches\login.php");
exit();
?>