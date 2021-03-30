<?php require_once("../../../private/initialize.php"); ?>
<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<?php

if (!isset($_GET["id"])) {
    redirect_page_to(url_for("/staff/subjects/index.php"));
}

$id = $_GET["id"];
$menu_name = "";
$position = "";
$visible = "";

if (is_request("post")) {
    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

   
}
?>

<!-- HTMl -->
<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Edit Subject</h1>

        <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . htmlspecialchars(urlencode($id))); ?>"
            method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type=" text" name="menu_name" value="<?php echo $menu_name ?>" />
                </dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <option value="1">1</option>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0">
                    <input type="checkbox" name="visible" value="1">
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Subject" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>