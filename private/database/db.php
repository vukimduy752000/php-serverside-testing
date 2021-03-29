<?php
require_once("db_credential.php");

/** Connection Database */
function db_connect()
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    db_confirm_connection();
    return $connection;
}


/** Disconnection Database */
function db_disconnect($link)
{
    if (isset($link)) {
        mysqli_close($link);
    }
}


/** Check database connectio */
function db_confirm_connection()
{
    if (mysqli_connect_errno()) {
        $msg  = "Database connection failed: ";
        $msg .= mysqli_connect_error() . ". Code: " . mysqli_connect_errno();
        exit($msg);
    }
}

/** Check the returned result from the query */
function db_confirm_query($result)
{
    if (!$result) {
        exit("Cannot retrieve back the result from database. Please check the query string or database connection again!");
    }
}