<?php
// ===========================================================================
// required:
// $_GET['key'] -- google doc key
// $_POST['master_key'] -- password matching config.ini
// ===========================================================================
// if everything checks out, runs fetch.rb and fetches a local data copy
// ===========================================================================

if( !isset( $_GET['key']) ) {
    die( "ERROR: key not specified" );
}
$key = trim(strip_tags($_GET['key']));

if( !file_exists( "config.php") ) {
    die( "ERROR: config.php is missing" );
}

require( "config.php" );

// [T:F] - does the key exist in config.ini ?
function verify_key($key) {
    global $config;

    foreach( $config as $project => $data ) {
        if( !isset($data["key"]) ) continue;

        if( $key == $data["key"] ) return(true);
    }
    return(false);
}

if( !verify_key($key) ) {
    die( "ERROR: key {$key} is undefined" );
}

// ===========================================================================
// everything worked, so trust $key
// ===========================================================================


# chdir( "/home/toolsvoa/www/data/{$folder}/" );
# exec( "ruby /home/toolsvoa/www/data/fetch.rb \"https://docs.google.com/spreadsheet/pub?key={$key}&output=html\"", $out );
exec( "ruby -e \"puts 'hi'\"", $out );
print_r( $out );
