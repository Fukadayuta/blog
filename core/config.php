<?php

$host="localhost";
$username="root";
$password="root";
$dbname="blog";

$dsn = 'mysql:dbname='.$dbname.';host='.$host;
$dbh = new PDO($dsn, $username, $password);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>