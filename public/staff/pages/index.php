<?php require_once("../../../private/initialize.php"); ?>

<?php $page_title = "Staff Pages" ?>
<?php include(SHARED_PATH . "/staff_header.php"); ?>

<?php
$pages = [
    ["id" => 1, "page_name" => "NSW", "isActive" => 1],
    ["id" => 2, "page_name" => "ANZ", "isActive" => 0],
    ["id" => 3, "page_name" => "CommonwealthBank", "isActive" => 1],
    ["id" => 4, "page_name" => "GeogreBank", "isActive" => 0],
]
?>

<!-- MAIN -->
<main>
    <div id=content>
        <div id="main-menu">
            <h1>Pages</h1>
            <table class="list">
                <tr>
                    <th>ID</th>
                    <th>Page name</th>
                    <th>isActive</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

                <?php foreach ($pages as $page) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($page['id']); ?></td>
                    <td><?php echo htmlspecialchars($page['page_name']); ?></td>
                    <td><?php echo $page['isActive'] == 1 ? 'active' : 'inactive'; ?></td>
                    <td><a class="action"
                            href=" <?php echo url_for("/staff/pages/show.php?id=" . htmlspecialchars(urlencode($page["id"]))); ?>">View
                            Page</a>
                    </td>
                    <td><a class="action" href="">Edit</a></td>
                    <td><a class="action" href="">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</main>


<?php include(SHARED_PATH . "/staff_footer.php"); ?>