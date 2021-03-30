<?php require_once('../../../private/initialize.php'); ?>

<?php
$subjects_set = query_all_values_order_by("subjects", "position");
?>

<?php $page_title = "Staff Subject" ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<!-- MAIN -->
<main>
    <div id=content>
        <div class="subjects listing">
            <h1>Subjects</h1>
            <div class="actions">
                <a href="<?php echo url_for("/staff/subjects/create_subject.php"); ?>">Create New Subject</a>
            </div>

            <table class="list">
                <tr>
                    <th>ID</th>
                    <th>Position</th>
                    <th>Visible</th>
                    <th>Name</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <?php while ($subject = mysqli_fetch_assoc($subjects_set)) { ?>
                <tr>
                    <td><?php echo $subject['id']; ?></td>
                    <td><?php echo $subject['position']; ?></td>
                    <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
                    <td><?php echo $subject['menu_name']; ?></td>
                    <td><a class=" action"
                            href="<?php echo url_for("staff/subjects/show.php?id=" . $subject['id']); ?>">View</a></td>
                    <td><a class="action"
                            href="<?php echo url_for("staff/subjects/edit.php?id=" . $subject["id"]); ?>">Edit</a>
                    </td>
                    <td><a class="action" href="">Delete</a></td>
                </tr>
                <?php } ?>
                <?php mysqli_free_result($subjects_set); ?>
            </table>
        </div>
    </div>
</main>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>