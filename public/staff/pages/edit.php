<?php
require_once("../../../private/initialize.php");

$id = $_GET["id"] ?? "1";

if (is_request("post")) {
    $page["id"] = $id;
    $page["subject_id"]  = $_POST["subject_id"] ?? "";
    $page["menu_name"]   = $_POST["menu_name"] ?? "";
    $page["position"]    = $_POST["position"] ?? "";
    $page["visible"]     = $_POST["visible"] ?? "";
    $page["content"]     = $_POST["content"] ?? "";

    // Insert record into the table
    if (query_update_value_where_id("pages", $page)) {
        redirect_page_to(url_for("/staff/pages/show.php?id=" . $page["id"]));
    }
} else {
    $page = query_find_value_by_id("pages", $id);
}

?>
<?php $page_title = "Create New Page"; ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<!-- HTMl -->
<div id="content">
    <a class="back-link" href="<?php echo url_for("/staff/pages/index.php") ?>">&#171 Back to Staff Area</a>

    <div class="subject new">
        <h1>Edit page</h1>
        <form action="<?php echo url_for("/staff/pages/edit.php?id=" . secure_http($page["id"])); ?>" method="post">
            <dl>
                <dt>Page Name</dt>
                <dd><input type="text" name="menu_name" value="<?php echo secure_http($page["menu_name"]); ?>" /></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <?php
                        for ($i = 1; $i <= query_quantity_row_count_condition("pages", "position"); $i++) {
                            echo "<option value=\"{$i}\" ";
                            if ($i == $page["position"]) {
                                echo "selected";
                            }
                            echo ">{$i}</option>";
                        }
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0">
                    <input type="checkbox" name="visible" value="1" <?php if ($page["visible"] == "1") {
                                                                        echo " checked";
                                                                    } ?>>
                </dd>
            </dl>
            <dl>
                <dt>Subject</dt>
                <dd>
                    <select name="subject_id">
                        <?php
                        $result_set = query_all_values_order_by("subjects", "menu_name");

                        while ($subject = mysqli_fetch_assoc($result_set)) {
                            echo "<option value=\"{$subject["id"]}\" ";
                            if ($page["subject_id"] == $subject["id"]) {
                                echo "selected";
                            }
                            echo ">{$subject["menu_name"]}</option>";
                        }
                        ?>
                    </select>
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