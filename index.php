<?php
require( "config.php" );

if( !isset( $_GET['key']) ) {
    die( "Key not specified" );
}

if( !isset( $_GET['callback'] ) ) {
    die( "Callback not specified" );
}

$key = basename(trim(strip_tags($_GET['key'])));
$key_file = sprintf(
    "%s/%s.json",
    $config["main"]["folder_data"],
    $key
);

// convert key to a real file, if it works
$key = realpath($key);

if( $key === false ) {
    die( "Key file not found" );
}

header( "Content-type: text/javascript" );
printf( "%s(%s);", $_GET['callback'], file_get_contents($key) );
