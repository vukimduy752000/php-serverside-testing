<?php

/** QUERY ALL VALUES*/
function query_all_values_order_by($table, $orderby)
{
    global $db;
    $query = "SELECT * FROM $table ORDER BY $orderby desc";
    $result = mysqli_query($db, $query);
    db_confirm_query($result);
    return $result;
}