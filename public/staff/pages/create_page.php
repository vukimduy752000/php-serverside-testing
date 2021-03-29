<?php
require_once("../../../private/initialize.php");
$page_title = "Create New Page";

$page_name  = "";
$active     = "";

if (is_request("post")) {
    $page_name  = $_POST["menu_name"] ?? "";
    $position     = $_POST[""] ?? "";


    echo "Form Submitted </br>";
    echo "Page Name: " . $page_name . "</br>";
    echo "Is Active: " . $active . "</br>";
}


?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<!-- HTMl -->
<div id="content">
    <a class="back-link" href="">&#171 Back to Staff Area</a>

    <div class="subject new">
        <h1>Create page</h1>
        <form action="<?php echo url_for("/staff/pages/create_page.php"); ?>" method="post">
            <dl>
                <dt>Page Name</dt>
                <dd><input type="text" name="page_name" value="<?php echo $page_name ?>"></dd>
            </dl>
            <dl>
                <dt>is Active</dt>
                <dd>
                    <select name="is_active">
                        <option value="1">Active</option>
                        <option value="0">In-active</option>
                    </select>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Page">
            </div>
        </form>
    </div>

</div>
<?php include(SHARED_PATH . "/staff_footer.php"); ?>