<?php
unset($_SESSION["Kullanici"]);
session_destroy();

header("Location:../Anasayfa.php");
exit();
?>