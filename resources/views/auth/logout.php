<?php
include("../../../config/init.php");
?>

<?php

$session->logout();
header("Location: /login");

?>