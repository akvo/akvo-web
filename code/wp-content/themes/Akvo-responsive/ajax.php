<?php
//mimic the actuall admin-ajax
define('DOING_AJAX', true);

//define('SHORTINIT', true);

if (!isset( $_REQUEST['action']))
    die('-1');


//make sure you update this line to the relative location of the wp-load.php
require_once('../../../wp-load.php');


header('Content-Type: text/html');
send_nosniff_header();

//Disable caching
header('Cache-Control: no-cache');
header('Pragma: no-cache');




//Typical headers


$action = $_REQUEST['action'];



//A bit of security
$allowed_actions = array(
    'akvo_latest_rsr',
   
);


if(in_array($action, $allowed_actions)){
    do_action('akvo_ajax_'.$action);
}
else{
    die('-1');
} 
