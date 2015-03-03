var Tabletop = require("./tabletop.js");

if( process.argv.length != 3 ) {
    console.info( "ERROR: need key\n" );
    console.info( "node tabletop-node.js [key]" );
    process.exit();
}

Tabletop.init({
    key: argv[2],
    callback: function(data, tabletop) {
        console.info( JSON.stringify(data) );
    },
    simpleSheet: true
});
