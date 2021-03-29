<?php
require_once("db_credential.php");

/** Connection Database */
function db_connect()
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    return $connection;
}


/** Disconnection Database */
function db_disconnect($link)
{
    if (isset($link)) {
        mysqli_close($link);
    }
}