<?php
session_start();
session_destroy();

header("Location:../Anasayfa.php");
exit();
?>