<?php require_once("../../../private/initialize.php"); ?>
<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<?php
$id = $_GET["id"] ?? "";
$errors = [];

// POST information into the database
if (is_request("post")) {
    $subject["id"]        = $id;
    $subject[SUBJECT_MENU_NAME] = $_POST[SUBJECT_MENU_NAME] ?? '';
    $subject[SUBJECT_POSITION]  = $_POST[SUBJECT_POSITION] ?? '';
    $subject[SUBJECT_VISIBLE]   = $_POST[SUBJECT_VISIBLE] ?? '';

    $result = query_update_value_where_id("subjects", $subject);
    if ($result === true) {
        redirect_page_to(url_for("/staff/subjects/show.php?id=" . secure_http($subject["id"])));
    } else {
        $errors = $result;
    }
} else {
    $subject = query_find_value_by_id(TABLE_SUBJECT, $id);
}
?>

<!-- HTMl -->
<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Edit Subject</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . secure_http($id)); ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type=" text" name=<?= SUBJECT_MENU_NAME; ?> value="<?= $subject[SUBJECT_MENU_NAME]; ?>" />
                </dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name=" position">
                        <?php
                        for ($i = 1; $i <= query_quantity_row_count_condition(TABLE_SUBJECT, SUBJECT_POSITION); $i++) {
                            $option = "";
                            $option .= "<option value=\"{$i}\"";
                            if ($i == ($subject[SUBJECT_POSITION])) {
                                $option .= " selected";
                            }
                            $option .= ">{$i}</option>";
                            echo $option;
                        }
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0">
                    <input type="checkbox" name="visible" value="1" <?php if ($subject[SUBJECT_VISIBLE] === "1") {
                                                                        echo "checked";
                                                                    } ?>>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Subject" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>