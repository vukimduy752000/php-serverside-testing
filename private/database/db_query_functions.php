<?php

/** QUERY ALL VALUES*/
function query_all_values_order_by($table, $orderby)
{
    global $db;
    $query = "SELECT * FROM $table ORDER BY $orderby DESC";
    $result_set = mysqli_query($db, $query);
    db_confirm_query($result_set);
    return $result_set;
}

/** QUERY VALUE DEPEND ON CONDITION */
function find_value_by_id($table, $value)
{
    global $db;
    $query  =  "SELECT * FROM $table 
                WHERE id='" . $value . "'";
    $result_set = mysqli_query($db, $query);
    db_confirm_query($result_set);
    $result_array = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);
    return $result_array;
}

/** INSERT NEW SUBJECT */
function insert_subject($table, $menu_name, $position, $visible)
{
    global $db;
    $query  = "INSERT INTO $table (menu_name, position, visible) ";
    $query .= "VALUES (";
    $query .= "'" . $menu_name . "',";
    $query .= "'" . $position  . "',";
    $query .= "'" . $visible   . "'";
    $query .= ")";

    // INSERT statement will return true/false
    $response = mysqli_query($db, $query);
    db_confirm_query($response);

    if ($response) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}