<?php

include("../../../config/init.php");


$session->logout();
header("Location: /login");