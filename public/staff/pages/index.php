<?php require_once("../../../private/initialize.php"); ?>

<?php $page_title = "Staff Pages" ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<?php
$pages = query_all_values_order_by("pages", "position");
?>

<!-- MAIN -->
<main>
    <div id=content>
        <div id="main-menu">
            <h1>Pages</h1>
            <div class="actions">
                <a href="<?php echo url_for("/staff/pages/create.php"); ?>">Create New Page</a>
            </div>

            <table class="list">
                <tr>
                    <th>ID</th>
                    <th>Menu Name</th>
                    <th>Subject</th>
                    <th>Position</th>
                    <th>Content</th>
                    <th>Visible</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <?php while ($page = mysqli_fetch_assoc($pages)) {
                    $subject = query_find_value_by_id("subjects", $page["subject_id"]);
                    $subject_name = $subject["menu_name"];
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($page['id']); ?></td>
                    <td><?php echo htmlspecialchars($page['menu_name']); ?></td>
                    <td><?php echo htmlspecialchars($subject_name); ?></td>
                    <td><?php echo htmlspecialchars($page['position']); ?></td>
                    <td><?php echo htmlspecialchars($page['content']); ?></td>
                    <td><?php echo $page['visible'] == 1 ? 'active' : 'inactive'; ?></td>
                    <td><a class="action"
                            href=" <?php echo url_for("/staff/pages/show.php?id=" . htmlspecialchars(urlencode($page["id"]))); ?>">View
                            Page</a>
                    </td>
                    <td><a class="action" href="">Edit</a></td>
                    <td><a class="action" href="">Delete</a></td>
                </tr>
                <?php } ?>

                <?php mysqli_free_result($pages); ?>

            </table>
        </div>
    </div>
</main>


<?php include(SHARED_PATH . "/staff_footer.php"); ?>