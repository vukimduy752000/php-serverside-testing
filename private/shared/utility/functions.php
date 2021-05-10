<?php

//** Extract URL To the specific path */
function url_for(string $script_path)
{
    // add the leading '/' if not present
    if ($script_path[0] !== "/") {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}


//** Check Error Not Found */
function error_404()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
}


//** Check Error Not Found */
function error_500()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
}


//** Redirect page to the new location */
function redirect_page_to(string $location)
{
    header("Location: " . $location);
    exit("Page has been redirect successfully");
}


//** Checking the request's type comming from HTTP */ */
function is_request(string $request_type)
{
    return $_SERVER["REQUEST_METHOD"] == strtoupper($request_type);
}


//** Display Errors */
//** Default value is the empty array */
function display_errors($errors = array())
{
    $output = "";
    if ($errors) {
        $output  = "<ul " . "class=\"errors\"" . ">";
        foreach ($errors as $error => $value) {
            $output .= "<li>" . htmlspecialchars($value) . "</li>";
        }
        $output .= "</ul>";
    }
    return $output;
}
