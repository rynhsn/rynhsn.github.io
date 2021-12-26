<?php

// var_dump($_POST['lat']);
if($_POST > 0) {
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $elv = round($_POST['elv'], 2);
    echo 'Lat : ' . $lat . ' Long : ' .  $lng . ' elv : ' . $elv . 'm';
}