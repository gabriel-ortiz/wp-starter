/**
 *
 * Transformer
 * 
 * Toggles the transform-active class for elements that have
 * transform animation events
 */

( function( window, $ ) {

    var Transformer = function(el){
        //cache variables
        this.$el = $(el);

        this.init();
    };

    Transformer.prototype.init = function(){
        //add event handlers
        this.$el.on( 'click', function(){
            $(this).toggleClass( 'transform-active' );
        } );
    
    };

    $(document).ready(function(){
        $('.has-transform').each( function(){
            new Transformer(this);
        } );
        
    });

} )( this, jQuery );
