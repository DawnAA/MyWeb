<?php

//including the Mysql connect parameters.

include("./connection/db-creds.inc");
@error_reporting(0);
@$con = mysqli_connect($host,$dbuser,$dbpass);
// Check connection
if (!$con)
{
    echo "Failed to connect to MySQL: " . mysqli_error($con);
}

@mysqli_select_db($con,$dbname) or die ( "Unable to connect to the database: $dbname");
?>