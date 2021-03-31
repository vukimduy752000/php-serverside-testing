<?php
require_once("../../../private/initialize.php");

$menu_name  = "";
$position   = "";
$visible    = "";
$content    = "";

if (is_request("post")) {
    $menu_name    = $_POST["menu_name"] ?? "";
    $position     = $_POST["position"] ?? "";
    $visible      = $_POST["visible"] ?? "";

    echo "Form parameters<br />";
    echo "Menu name: " . $menu_name . "<br />";
    echo "Position: " . $position . "<br />";
    echo "Visible: " . $visible . "<br />";
}

?>
<?php $page_title = "Create New Page"; ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<!-- HTMl -->
<div id="content">
    <a class="back-link" href="<?php echo url_for("/staff/pages/index.php") ?>">&#171 Back to Staff Area</a>

    <div class="subject new">
        <h1>Create page</h1>
        <form action="<?php echo url_for("/staff/pages/create.php"); ?>" method="post">
            <dl>
                <dt>Page Name</dt>
                <dd><input type="text" name="menu_name" value="<?php echo secure_http($menu_name); ?>" /></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <option value="1" <?php if ($position == 1) {
                                                echo "selected";
                                            } ?>>1</option>
                        <option value="2" <?php if ($position == 2) {
                                                echo "selected";
                                            } ?>>2</option>
                        <option value="3" <?php if ($position == 3) {
                                                echo "selected";
                                            } ?>>3</option>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0">
                    <input type="checkbox" name="visible" value="1" <?php if ($visible == "1") {
                                                                        echo " checked";
                                                                    } ?>>
                </dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dd>
                    <textarea name="content" rows="4" cols="13" placeholder="Type the content in here..."
                        maxlength="100" required></textarea>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Page">
            </div>
        </form>
    </div>

</div>
<?php include(SHARED_PATH . "/staff_footer.php"); ?>