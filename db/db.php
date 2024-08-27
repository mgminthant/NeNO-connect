<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "genius");
define("DATABASE", "zeno_connect");

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$connection) {
    die("connection fail");
}
?>