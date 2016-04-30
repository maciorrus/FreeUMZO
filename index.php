<?php

session_start();

require_once 'root/db.php';
require_once 'root/user.php';


if($user->isLogged())
    echo "User is logged as ".$user->getName();
else
    echo "User is not logged";

?>

