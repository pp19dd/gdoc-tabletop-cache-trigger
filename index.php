<?php
require( "config.php" );

if( !isset( $_GET['key']) ) {
    die( "Key not specified" );
}

if( !isset( $_GET['callback'] ) ) {
    die( "Callback not specified" );
}

$key = basename(trim(strip_tags($_GET['key'])));
$key = realpath($config["main"]["folder_data"] . $key);

if( $key === false ) {
    die( "Key not found" );
}

header( "Content-type: text/javascript" );
printf( "%s(%s);", $_GET['callback'], file_get_contents($key . "json") );
