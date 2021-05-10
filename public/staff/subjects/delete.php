<?php
require_once('../../../private/initialize.php');
$page_title = "Staff Subject";
include(SHARED_PATH . '/staff_header.php');

$subject_id = $_GET["id"] ?? "";

if (!$subject_id) {
    redirect_page_to(url_for("/staff/subjects/index.php"));
}

if (is_request("post")) {
    $subject[SUBJECT_ID] = $subject_id;
    if (query_delete_record(TABLE_SUBJECT, $subject[SUBJECT_ID])) {
        redirect_page_to(url_for("staff/subjects/index.php"));
    }
} else {
    $subject = query_find_value_by_id(TABLE_SUBJECT, $subject_id);
}
?>

<main>
    <a class="back-link" href="<?php echo url_for("/staff/subjects/index.php"); ?>">&laquo; Back to List</a>
    <div class="subject delete">
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete this subject?</p>
        <p class="item"><?php echo secure_http($subject[SUBJECT_MENU_NAME]); ?></p>
        <form action="<?php
                        echo url_for('/staff/subjects/delete.php?id=' . secure_http($subject_id)); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Subject" />
            </div>
        </form>
    </div>
</main>

<?php include(SHARED_PATH . "/staff_footer.php") ?>