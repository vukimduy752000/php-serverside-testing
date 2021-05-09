<?php
ob_start();


//  |===============================================/ 
//  | Assign file paths to PHP constants
//  |__FILE__ returns the current path to this file
//! | Can not import the PRIVATE_PATH . initializer.php to other file cuz this is the initial file
//  |===============================================/ 

/**
 * Private
 *  - database
 *  - shared
 *      - utility
 * Public
 *  - script
 *  - staff
 *      - pages
 *      - subjects
 *  - stylesheets
 */

define("PRIVATE_PATH", dirname(__FILE__)); // return the dir of the current file which is PRIVATE 
define("PROJECT_PATH", dirname(PRIVATE_PATH)); // Move backward 1 dir further of the directory 
define("DATABASE_PATH", PRIVATE_PATH . "/database");
define("SHARED_PATH", PRIVATE_PATH . "/shared");
define("UTILITY_PATH", SHARED_PATH . "/utility");

define("PUBLIC_PATH", PROJECT_PATH . "/public");
define("SCRIPT_PATH", PUBLIC_PATH . "/script");
define("STAFF_PATH", PUBLIC_PATH . "/staff");
define("STYLESHEET_PATH", PUBLIC_PATH . "/stylesheet");




//  |===============================================/ 
//  |Assign the root URL to a PHP constant
//  |* Do not need to include the domain
//  |* Use same document root as webserver
//  |* Can set a hardcoded value:
//  |define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
//  |define("WWW_ROOT", '');
//  |* Can dynamically find everything in URL up to "/public"
//  |===============================================/ 
// * Can dynamically find everything in URL up to "/public"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);




//  |===============================================/ 
//  | Require all private files
//  |===============================================/ 
require_once(DATABASE_PATH . "/db_connection.php");
require_once(DATABASE_PATH . "/db_query.php");
require_once(UTILITY_PATH  . "/functions.php");
require_once(UTILITY_PATH  . "/validation.php");
require_once(UTILITY_PATH  . "/constant.php");
$db = db_connect();
