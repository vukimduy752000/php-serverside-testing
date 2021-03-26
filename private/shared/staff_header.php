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
            <?php echo $page_title; ?>
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo url_for("/stylesheets/staff.css") ?>">
    </head>

    <body>
        <header>
            <h1>GBI Staff Area</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo url_for("/staff/index.php"); ?>">Menu</a></li>
                </ul>
            </nav>
        </header>