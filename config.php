<?php

define('DBHOST', 'localhost');
define('DBUSER', 'founder');
define('DBPASS', '123456');
define('DB', 'catalog');

$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB) or die("No connection to server!");
mysqli_set_charset($connection, "utf8") or die("No initialize charset of connection!");