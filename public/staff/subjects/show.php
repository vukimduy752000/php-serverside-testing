<?php

$id = $_GET['id'] ?? '1';
echo htmlspecialchars($id);
?>

<a href="show.php?name=<?php echo urlencode("John Doe"); ?>">John Doe</a><br>
<a href="show.php?company=<?php echo urlencode("Widget&More"); ?>">Widget&More</a><br>
<a href="show.php?q=<?php echo urlencode("!#*?"); ?>">!#*?</a><br>