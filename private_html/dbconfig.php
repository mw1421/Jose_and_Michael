<?php
    
$dbServername= "sql305.epizy.com";
$dbUsername= "epiz_24148240";
$dbPassword= "McdE22QpJWRs";
$dbName= "epiz_24148240_Jose_and_Michael";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

echo @mysql_ping() ? 'true' : 'false';
