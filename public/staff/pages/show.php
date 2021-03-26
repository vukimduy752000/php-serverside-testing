<?php

$id = $_GET['id'] ?? 1;

?>

<?php include("../../../private/initialize.php"); ?>

<?php $page_title = "Show Page" ?>
<?php require_once(SHARED_PATH . "/staff_header.php"); ?>


<!-- MAIN -->
<main>
    <div id=content>
        <h2>Page: <?php echo htmlspecialchars($id) ?></h2></br>
        <a href="<?php echo url_for("/staff/pages/index.php") ?>">&laquo; Go back to the previous page</a>
    </div>
</main>


<?php require_once(SHARED_PATH . "/staff_footer.php"); ?>