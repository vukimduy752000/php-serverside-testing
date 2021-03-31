<?php require_once('../../../private/initialize.php'); ?>

<?php

$id = $_GET["id"] ?? "";

if (is_request("post")) {
    $subject["id"] = $id;
    if (query_delete_record("subjects", $subject["id"])) {
        redirect_page_to(url_for("staff/subjects/index.php"));
    }
} else {
    $subject = query_find_value_by_id("subjects", $id);
}

?>

<?php $page_title = "Staff Subject" ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<main>
    <a class="back-link" href="<?php echo url_for("/staff/subjects/index.php"); ?>">&laquo; Back to List</a>
    <div class="subject delete">
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete this subject?</p>
        <p class="item"><?php echo secure_http($subject['menu_name']); ?></p>

        <form action="<?php echo url_for('/staff/subjects/delete.php?id=' . secure_http($subject['id'])); ?>"
            method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Subject" />
            </div>
        </form>
    </div>
</main>
<?php include(SHARED_PATH . "/staff_footer.php") ?>