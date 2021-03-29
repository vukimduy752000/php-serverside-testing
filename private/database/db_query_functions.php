<?php

/** QUERY ALL VALUES*/
function query_all_values_order_by($table, $orderby)
{
    global $db;
    $query = "SELECT * FROM $table ORDER BY $orderby desc";
    $returnedValues = mysqli_query($db, $query);
    return $returnedValues;
}