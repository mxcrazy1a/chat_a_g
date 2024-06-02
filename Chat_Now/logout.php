<?php

setcookie("gmail","/",strtotime("-1 month"));
unset($_COOKIE["gmail"]);

header("location: login.php");

?>