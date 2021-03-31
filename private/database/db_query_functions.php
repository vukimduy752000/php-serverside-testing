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
function query_find_value_by_id($table, $value)
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
function query_insert_subject($table, $menu_name, $position, $visible)
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

/** UPDATE SUBJECT  */
function query_update_value_where_id($table, $assoc_object)
{
    global $db;
    $query  = "UPDATE $table ";
    $query .= "SET ";

    // Using loop to iterate 
    $last_key = array_key_last($assoc_object);
    foreach ($assoc_object as $key => $value) {
        $query .= "$key='" . $value . "',";
        if ($key == $last_key) {
            $query[strlen($query) - 1] = " ";
        }
    }

    $query .= "WHERE id='" . $assoc_object["id"] . "'";
    $result = mysqli_query($db, $query);

    // RESULT form UPDATE will return true/false
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}