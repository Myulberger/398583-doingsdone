<?php


require "functions.php";


$mainContent=renderTemplate("./templates/index.php", $tasks);
$layoutFinal=renderTemplate("./templates/layout.php", $projects);

print $layoutFinal;
?>
