<?php

require_once dirname(__FILE__).'/../config.php';

function getParams(&$x,&$y,&$z){
$x = isset( $_REQUEST ['x']) ? $_REQUEST['x']:null;
$y = isset( $_REQUEST ['y']) ? $_REQUEST['y']:null;
$z = isset( $_REQUEST ['z']) ? $_REQUEST['z']:null;
}

function validate(&$x,&$y,&$z,&$massages,&$hide_intro){
    if ( ! (isset($x) && isset($y) && isset($z))) {return false;}
    $hide_intro = true;
    //$infos []='Przekazano parametry';
    if ( $x == "") {$messages [] = 'Nie podano kwoty kredytu';}
    if ( $y == "") {$messages [] = 'Nie podano na ile lat';}
    if ( $z == "") {$messages [] = 'Nie podano oprocentowania';}
    if (count($massages)!=0){return false;}
    if (! is_numeric( $x )) {$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';}
    if (! is_numeric( $y )) {$messages [] = 'Druga wartość nie jest liczbą całkowitą';}	
    if (! is_numeric( $z )) {$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';}
    else return true;
}

function process(&$x,&$y,&$z,&$massages,&$wynik){
    
    
    $x=intval($x);
    $y=intval($y);
    $z=intval($z);
    $wynik = $x*$y*$z*0.01;
}
	
$x = null;
$y = null;
$z = null;	
$wynik= null;
$hide_intro = false;
$infos = array(); //dla błędów
$massages = array ();

getParams($x, $y, $z);
if (validate($x, $y, $z, $massages,$hide_intro)) {
    process($x, $y, $z, $massages, $wynik,$infos);
}

$page_title = 'KALKULATOR KREDYTOWY';
$page_description = 'szablony ';
$page_header = 'zadanie 3';
$page_footer = 'strona do zadania 3';

include 'calc_view.php';
	
