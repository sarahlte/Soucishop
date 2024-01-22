<?php

require 'bdd.php';

$_SESSION = array();

session_destroy();

header("Location: ?page=homepage");

exit();