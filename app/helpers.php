<?php

function copyright($start) {
    $year = date("Y");

    if($year === $start) {
        return $year;
    } else {
        return $start . ' – ' . $year;
    }
}
