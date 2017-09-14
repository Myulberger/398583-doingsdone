<?php


require "functions.php";


$Content=renderTemplate("./templates/index.php", $tasks);

$data4secondfunction = [
    "mainContent"=>$Content,
    'projects'=>$projects
    ];

$layoutFinal=renderTemplate("./templates/layout.php", $data4secondfunction);

print $layoutFinal;
?>
