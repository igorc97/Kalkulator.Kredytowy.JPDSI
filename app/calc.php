<?php

require_once dirname(__FILE__).'/../config.php';



$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$z = $_REQUEST ['z'];



if ( ! (isset($x) && isset($y) && isset($z))) {

    $messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


if ( $x == "") {
    $messages [] = 'Nie podano kwoty';
}
if ( $y == "") {
    $messages [] = 'Nie podano oprocentowania';
}
if ( $z == ""){
    $messages [] = 'Nie podano czasu';
}

if (empty( $messages )) {


    if (! is_numeric( $x )) {
        $messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
    }

    if (! is_numeric( $y )) {
        $messages [] = 'Druga wartość nie jest liczbą całkowitą';
    }

}



if (empty ( $messages )) {


    $x = intval($x);
   // $y = intval($y);
    $y = floatval($y);
    $z = intval($z);

    $oproc = $y/100;
    $miesiace = $z * 12;
    $doplata = $x*$oproc;
    $result = ($x + $doplata)/$miesiace;

}

include 'calc_view.php';