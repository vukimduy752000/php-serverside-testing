<?php
require_once("../../../private/initialize.php");
$page_title = 'Create Subject';
include_once(SHARED_PATH . "/staff_header.php");

$id = $_GET['id'] ?? '1';
$subject = query_find_value_by_id(TABLE_SUBJECT, $id);
?>

<!-- HTMl -->
<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
    <h1>Subject: <?php echo secure_http($subject[SUBJECT_MENU_NAME]); ?></h1>

    <div class="attributes">
        <dl>
            <dt>Menu Name</dt>
            <dd><?php echo htmlspecialchars($subject[SUBJECT_MENU_NAME]); ?></dd>
        </dl>
        <dl>
            <dt>Position</dt>
            <dd><?php echo secure_http($subject[SUBJECT_POSITION]); ?></dd>
        </dl>
        <dl>
            <dt>Visible</dt>
            <dd><?php echo $subject[SUBJECT_VISIBLE] == '1' ? 'true' : 'false'; ?></dd>
        </dl>
    </div>
</div>