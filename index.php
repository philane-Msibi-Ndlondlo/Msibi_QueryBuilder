<?php

require_once './models/DBConnection.php';
require_once './models/SQLBuilder.php';
require_once './models/User.php';

$User = new User();

//$users = $User->getAll();
$user = $User->getById(12);
print_r($user);

echo 'End';
