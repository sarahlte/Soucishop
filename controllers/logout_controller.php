<?php

require './controllers/bdd.php';
require dirname(__DIR__) . '/view/logout.php';

$_SESSION = array();

session_destroy();

header("Location: ?page=homepage");

exit();