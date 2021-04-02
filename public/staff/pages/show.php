<?php include("../../../private/initialize.php"); ?>
<?php $page_title = "Show Page" ?>

<?php

$id = $_GET['id'] ?? "1";
$page = query_find_value_by_id("pages", $id);
echo $page;

?>
<?php require_once(SHARED_PATH . "/staff_header.php"); ?>


<!-- MAIN -->
<main>
    <div id=content>
        <h2>Page: <?php echo htmlspecialchars($page["id"]) ?></h2></br>
        <a href="<?php echo url_for("/staff/pages/index.php") ?>">&laquo; Go back to the previous page</a>
        <div class="attributes">
            <dl>
                <dt>Menu Name</dt>
                <dd><?php echo htmlspecialchars($page['menu_name']); ?></dd>
            </dl>
            <dl>
                <dt>Subject Name</dt>
                <dd><?php
                    $subject = query_find_value_by_id("subjects", $page["subject_id"]);
                    $subject_name = $subject["menu_name"];
                    echo secure_http($subject_name);
                    ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo secure_http($page['position']); ?></dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo $page['visible'] == '1' ? 'true' : 'false'; ?></dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dd><?php echo htmlspecialchars($page['content']); ?></dd>
            </dl>
        </div>
    </div>
</main>


<?php require_once(SHARED_PATH . "/staff_footer.php"); ?>