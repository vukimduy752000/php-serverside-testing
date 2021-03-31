<?php

require_once("../../../private/initialize.php");

if (is_request("post")) {
    $menu_name = $_POST["menu_name"] ?? "";
    $position = $_POST["position"] ?? "";
    $visible = $_POST["visible"] ?? "";

    //! EXPERIMENT 
    // if (query_insert_record("subjects", $subject)) {
    //     $new_id = mysqli_insert_id($db);
    //     redirect_page_to(url_for("/staff/subjects/show.php?id=" . secure_http($new_id)));
    // } else {
    //     redirect_page_to(url_for("/staff/subjects/index.php"));
    // }
} else {
}

?>
<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


<!-- HTMl -->
<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Create Subject</h1>

        <form action=" <?php echo url_for("/staff/subjects/create_subject.php") ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" value="" /></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
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