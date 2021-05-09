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
    $query  =  "SELECT * FROM $table ";
    $query .=  "WHERE id='" .  db_escape($db, $value) . "' " . "LIMIT 1";
    $result_set = mysqli_query($db, $query);
    db_confirm_query($result_set);
    $result_array = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);
    return $result_array;
}



/** INSERT NEW SUBJECT */
function query_insert_record($table, $assoc_object)
{
    global $db;
    $query_into  = "INSERT INTO $table (";
    $query_value = "VALUES (";

    $last_key = array_key_last($assoc_object);
    foreach ($assoc_object as $key => $value) {
        $query_into  .= db_escape($db, $key) . ",";
        $query_value .= "'" . db_escape($db, $value) . "',";

        if ($key == $last_key) {
            $query_into[strlen($query_into) - 1] = ")";
            $query_value[strlen($query_value) - 1] = ")";
        }
    }
    $query = $query_into . " " . $query_value;

    // INSERT statement will return true/false
    $response = mysqli_query($db, $query);

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
        $query .= "$key='" . db_escape($db, $value) . "',";
        if ($key == $last_key) {
            $query[strlen($query) - 1] = " ";
        }
    }

    $query .= "WHERE id='" . db_escape($db, $assoc_object["id"])  . "' LIMIT 1";
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

/** QUERY QUANTITY OF ROW COUNT BY SPECIFIC CONDITION */
function query_quantity_row_count_condition($table, $condition)
{
    global $db;
    $query = "SELECT COUNT($condition) FROM $table";
    $result_set = mysqli_query($db, $query);
    $result = mysqli_fetch_row($result_set);

    db_confirm_query($result_set);
    mysqli_free_result($result_set);

    return $result[0];
}


/** DELETE RECORD BASED ON ID */
function query_delete_record($table, $value)
{
    global $db;
    $query  = "DELETE FROM $table ";
    $query .= "WHERE id='" . db_escape($db, $value) . "' ";
    $query .= "LIMIT 1";

    $result = mysqli_query($db, $query);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

/** JOIN FOREIGN KEY TO PRIMARY KEY */
function query_all_value_join_child_table(array $parent, array $child)
{
    global $db;
    $parentGet  = $parent["table"] . "." . $parent["valueToGet"];
    $childGet   = $child["table"]  . "." . $child["valueToGet"];
    $parentJoin = $parent["table"] . "." . $parent["valueToJoin"];
    $childJoin  = $child["table"]  . "." . $child["valueToJoin"];

    $query  = "SELECT $parentGet, $childGet FROM {$parent['table']} ";
    $query .= "JOIN {$child['table']} ON $parentJoin = $childJoin";

    $result_set = mysqli_query($db, $query);

    db_confirm_query($result_set);
    return $result_set;
}
