<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = "Staff Menu" ?>
<?php require_once(SHARED_PATH . '/staff_header.php'); ?>

<main>
    <div id=content>
        <div id="main-menu">
            <h1>Main Menu</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo url_for("staff/subjects/index.php") ?>">Subjects</a></li>
                    <li><a href="<?php echo url_for("staff/pages/index.php") ?>">Pages</a></li>
                </ul>
            </nav>
        </div>
    </div>
</main>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>