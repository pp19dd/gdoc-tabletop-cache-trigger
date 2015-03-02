<?php
require( "config.php" );

if( !isset( $_GET['key']) ) {
    die( "Key not specified" );
}

$key = basename(trim(strip_tags($_GET['key'])));
$key = realpath($config["main"]["folder_data"] . $key);

if( $key === false ) {
    die( "Key not found" );
}

header( "Content-type: application/json" );
readfile($key);
