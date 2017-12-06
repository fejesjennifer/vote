<?php

require("../model/listmodel.php");

$m = new listmodel();

if (isset($_GET['up'])) {
    $m->up($_GET['up']);
}
if (isset($_GET['down'])) {
    $m->down($_GET['down']);
}

$kerdesek = $m->getQuestions();

require('../view/list.php');
//git
?>