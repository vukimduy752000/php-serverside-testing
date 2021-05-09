<?php require_once("../../../private/initialize.php"); ?>
<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<?php
$id = $_GET["id"] ?? "";

// POST information into the database
if (is_request("post")) {
    $subject["id"]        = $id;
    $subject["menu_name"] = $_POST['menu_name'] ?? '';
    $subject["position"]  = $_POST['position'] ?? '';
    $subject["visible"]   = $_POST['visible'] ?? '';

    if (query_update_value_where_id("subjects", $subject)) {
        redirect_page_to(url_for("/staff/subjects/show.php?id=" . secure_http($subject["id"])));
    }
} else {
    $subject = query_find_value_by_id("subjects", $id);
}
?>

<!-- HTMl -->
<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Edit Subject</h1>
        <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . secure_http($id)); ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type=" text" name="menu_name" value=<?= $subject["menu_name"]; ?> />
                </dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <?php
                        for ($i = 1; $i <= query_quantity_row_count_condition("subjects", "position"); $i++) {
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
                    <input type="checkbox" name="visible" value="1" <?php if ($subject["visible"] == 1) {
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