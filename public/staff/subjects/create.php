<?php
require_once("../../../private/initialize.php");
$page_title = 'Create Subject';
require_once(SHARED_PATH .  '/staff_header.php');


if (is_request("post")) {
    $subject[SUBJECT_MENU_NAME] = $_POST[SUBJECT_MENU_NAME] ?? "";
    $subject[SUBJECT_POSITION]  = $_POST[SUBJECT_POSITION] ?? "";
    $subject[SUBJECT_VISIBLE]   = $_POST[SUBJECT_VISIBLE] ?? "";

    if (query_insert_record(TABLE_SUBJECT, $subject)) {
        $new_id = mysqli_insert_id($db);
        redirect_page_to(url_for("/staff/subjects/show.php?id=" . secure_http($new_id)));
    } else {
        redirect_page_to(url_for("/staff/subjects/index.php"));
    }
} else {
    // Set subject postion is the count(row) + 1 by default
    $subject = [
        "menu_name" => "",
        "position"  => query_quantity_row_count_condition(TABLE_SUBJECT, SUBJECT_POSITION) + 1,
        "visible"   => ""
    ];
}

?>


<!-- HTMl -->
<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
    <div class="subject new">
        <h1>Create Subject</h1>
        <form action=" <?php echo url_for("/staff/subjects/create.php") ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" /></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <?php
                        for ($i = 1; $i <= $subject["position"]; $i++) {
                            $option = "";
                            $option .= "<option value=\"{$i}\"";
                            if ($i == ($subject["position"])) {
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
                    <input type="checkbox" name="visible" value="1">
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Subject" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>