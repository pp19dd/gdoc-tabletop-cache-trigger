var Tabletop = require("./tabletop.js");

if( process.argv.length != 3 ) {
    console.info( "ERROR: need 3 parameters\n" );
    console.info( "node tabletop-node.js [key] [callback]" );
    process.exit();
}

Tabletop.init({
    key: argv[2],
    callback: function(data, tabletop) {
        console.info( argv[3] + "(" + JSON.stringify(data) + ")" );
    },
    simpleSheet: true
});
