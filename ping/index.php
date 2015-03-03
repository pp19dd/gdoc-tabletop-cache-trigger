<?php
// ===========================================================================
// required:
// $_GET['key'] -- google doc key
// $_POST['master_key'] -- password matching config.ini
// ===========================================================================
// if everything checks out, runs fetch.rb and fetches a local data copy
// ===========================================================================

function error_message($msg) {
    echo "<h1>ERROR</h1>\n";
    echo "<p>" . date("r") . "</p>\n";
    echo "<pre>" . $msg . "</pre>\n";
    die;
}

// config must be set
if( !file_exists( "../config.php") ) {
    error_message( "config.php is missing" );
}
require( "../config.php" );

// key must be sent via $_GET
if( !isset( $_GET['key']) ) {
    error_message( "key not specified" );
}
$key = trim(strip_tags($_GET['key']));

// key must be configured in config.php
function verify_key($key) {
    global $config;

    foreach( $config as $project => $data ) {
        if( !isset($data["key"]) ) continue;

        if( $key == $data["key"] ) return(true);
    }
    return(false);
}

if( !verify_key($key) ) {
    error_message( "key {$key} is undefined" );
}

// master key must be sent via $_POST
if( !isset( $_POST['master_key']) ) {
    error_message( "master key not provided" );
}

// master key must be set in config.php
if( !isset( $config["main"]["master_key"] ) ) {
    error_message( "master key not set" );
}

// master keys must match
if( $config["main"]["master_key"] !== $_POST["master_key"] ) {
    error_message( "provided master key doesn't match" );
}

// ===========================================================================
// everything worked, so trust $key
// ===========================================================================

// option: simple mode = false
// default is true
$simple = "true";
if( isset($_POST['simpleSheet']) ) {
    if( $_POST['simpleSheet'] == "false" ) $simple = "false";
}

$file = sprintf( "%s/%s.json", $config["main"]["folder_data"], $key );
$exec = sprintf(
    "%s %s/tabletop-node.js %s {$simple} > {$file}",
    $config["main"]["node"],
    $config["main"]["folder_home"],
    $key
);

chdir( $config["main"]["folder_data"] );
exec( $exec, $out );

#echo str_replace(" ", " <br/>", $exec);
#echo "<hr/>";
echo number_format(filesize($file)) . " bytes written, mode simpleSheet = {$simple}";
