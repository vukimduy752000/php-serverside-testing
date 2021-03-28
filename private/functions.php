<?php
function url_for(string $script_path)
{
    // add the leading '/' if not present
    if ($script_path[0] !== "/") {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}


function error_404()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
}

function error_500()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
}

function redirect_page_to(string $location)
{
    header("Location: " . $location);
    exit("Page has been redirect successfully");
}

function secure_http(string $string)
{
    return htmlspecialchars(urlencode($string));
}


function is_request(string $request_type)
{
    return $_SERVER["REQUEST_METHOD"] == strtoupper($request_type);
}