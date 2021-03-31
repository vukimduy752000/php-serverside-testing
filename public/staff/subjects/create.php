<?php

require_once("../../../private/initialize.php");

if (is_request("post")) {
    $subject["menu_name"] = $_POST["menu_name"] ?? "";
    $subject["position"] = $_POST["position"] ?? "";
    $subject["visible"] = $_POST["visible"] ?? "";

    if (query_insert_record("subjects", $subject)) {
        $new_id = mysqli_insert_id($db);
        redirect_page_to(url_for("/staff/subjects/show.php?id=" . secure_http($new_id)));
    } else {
        redirect_page_to(url_for("/staff/subjects/index.php"));
    }
} else {
    $subject = [
        "menu_name" => "",
        "position"  => "",
        "visible"   => ""
    ];
}

?>
<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


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

                        for ($i = 1; $i <= query_quantity_row_count_condition("subjects", "position"); $i++) {
                            $option = "";
                            $option .= "<option value=\"{$i}\"";
                            $option .= ">{$i}</option>";
                            echo $option;
                        }


                        ?>
                        <!-- <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option> -->
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