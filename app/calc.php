<?php

require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';





function getParams(&$x, &$y, &$z) {
    $x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
    $y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$z = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;
}

function validate(&$x, &$y, &$z, &$messages){
    if ( ! (isset($x) && isset($y) && isset($z))) {

        return false;
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
    
   
	if (count ( $messages ) != 0) return false;
	
	
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;


}

function process(&$x, &$y, &$z, &$result, &$oproc, &$miesiace, &$doplata, &$messages){
    global $role;

     $x = intval($x);
     $y = floatval($y);
     $z = intval($z);
 
     $oproc = $y/100;
     $miesiace = $z * 12;
     $doplata = $x*$oproc;
     $result = ($x + $doplata)/$miesiace;
     $result = floatval($result);
    
}
$x = null;
$y = null;
$z = null;
$result = null;
$messages = array();
$oproc = null;
$miesiace = null;
$doplata = null;

getParams($x, $y, $z);
if(validate($x, $y, $z, $messages)){
    process($x, $y, $z, $result, $oproc, $miesiace, $doplata, $messages);
}

include 'calc_view.php';