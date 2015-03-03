// usage:
// node tabletop.js key
// node tabletop.js key true        // simple sheet, default
// node tabletop.js key false       // simple sheet


var Tabletop = require("./tabletop.js");

if( process.argv.length < 3 || process.argv.length > 4 ) {
    console.info( "ERROR: need key\n" );
    console.info( "node tabletop-node.js [key] [true or false]" );
    process.exit();
}

// default: assume simple=true, otherwise false
var simple_sheet_option = true;
if( process.argv.length == 4 ) {
    if( process.argv[3] == "false" ) simple_sheet_option = false;
}

Tabletop.init({
    key: process.argv[2],
    callback: function(data, tabletop) {
        console.info( JSON.stringify(data) );
    },
    simpleSheet: simple_sheet_option
});
