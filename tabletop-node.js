var Tabletop = require("./tabletop.js");

if( process.argv.length != 3 ) {
    console.info( "ERROR: need 3 parameters" );
    process.exit();
}

Tabletop.init({
    key: argv[2],
    callback: function(data, tabletop) {
        //data_loaded(data);
        console.info( "var " + argv[3] + " = " JSON.stringify(data) );
    },
    simpleSheet: true
});
