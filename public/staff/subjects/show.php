<?php
require_once("../../../private/initialize.php");
include_once(SHARED_PATH . "/staff_header.php");
?>

<?php
$id = $_GET['id'] ?? '1';
$subject = query_find_value_by_id("subjects", $id);
?>

<!-- HTMl -->
<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <h1>Subject: <?php echo secure_http($subject['menu_name']); ?></h1>

    <div class="attributes">
        <dl>
            <dt>Menu Name</dt>
            <dd><?php echo htmlspecialchars($subject['menu_name']); ?></dd>
        </dl>
        <dl>
            <dt>Position</dt>
            <dd><?php echo secure_http($subject['position']); ?></dd>
        </dl>
        <dl>
            <dt>Visible</dt>
            <dd><?php echo $subject['visible'] == '1' ? 'true' : 'false'; ?></dd>
        </dl>
    </div>
</div>