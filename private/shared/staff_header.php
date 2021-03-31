<?php
if (!isset($page_title)) {
    $page_title = "Staff Area";
};
?>

<!-- HTML -->
<!doctype html>

<html lang="en">

    <head>
        <title>
            <?php echo htmlspecialchars($page_title); ?>
        </title>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="<?php echo url_for("/stylesheets/staff.css") ?>">
        <script type="text/javascript" src="<?php echo url_for("/js/index.js") ?>"></script>

    <body>
        <header>
            <h1>GBI Staff Area</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo url_for("/staff/index.php"); ?>">Menu</a></li>
                </ul>
            </nav>
        </header>