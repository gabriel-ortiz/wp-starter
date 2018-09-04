/**
 * Every piece of UI that requires javascript should have its own
 * javascript file. Use this file as a template for structuring
 * all JS source files.
 *
 * {Title}
 * 
 * {Description}
 */

( function( window, $ ) {

    var MyClass = function(){
        this.init();
    };

    MyClass.prototype.init = function(){
        // do something
        console.log( 'theme scripts working' );
    };
    
    MyClass.prototype.anotherFunction = function(){
        
    };

    $(document).ready(function(){
        $('.element').each( function(){
            new MyClass(this);

        } );
        
    });

} )( this, jQuery );