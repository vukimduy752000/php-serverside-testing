<?php
if (!isset($page_title)) {
    $page_title = "Staff Area";
};
?>

<!-- HTML -->
<!doctype html>
<html lang="en">

<head>
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta charset="utf-8">

    <!-- Style Sheet -->
    <link type="text/css" rel="stylesheet" href=<?= url_for("/stylesheet/staff.css"); ?>>
    <!-- Javascript -->
    <script type="module" src=<?= url_for("/script/index.js"); ?>></script>
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