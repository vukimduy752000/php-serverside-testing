<?php
require_once("../../../private/initialize.php");


if (is_request("post")) {
    $position = isset($_POST["position"]) ?? "Unknown";
    $menu_name = $_POST["menu_name"];
    $visible = $_POST["visible"];
} else {
    redirect_page_to(url_for("/staff/subjects/new.php"));
}