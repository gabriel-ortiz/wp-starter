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
	'use strict';
	var document = window.document;

    var MyClass = function(){
        this.init();
    };

    MyClass.prototype.init = function(){
        // do something
    };

    $(document).ready(function(){
        new MyClass();
    });

} )( this, jQuery );




/**
 * Every piece of UI that requires javascript should have its own
 * javascript file. Use this file as a template for structuring
 * all JS source files.
 *
 * {Title}
 * 
 * {Description}
 */
  (( window, $ ) => {

    var NewClass = ( el ) => {
      
      //Place initializer events and event handlers here
      this.init = () => {
        //load all the modules 
        this.DOM        = this.DOMObj();
        this.modelObj   = this.modelObj();
        this.CB         = this.CB_Obj();
        this.setup    = this.setupObj();
        
        //element.on('click', this._clickHandler.bind(this));
        this.DOM.$el.on( 'click', this.CB.sayHello.bind(this) );
       
        
      };
    
      //if we need to save any data
     this.modelObj = () => {
      
       return{
         
       };
       
     };
     
      //object with access to cached DOM elements
     this.DOMObj = () => {
       //return the DOM elements in an object
       return {
         that : this,
         $el : $(el),
         test : 'Hello!'
       };
     };
      
     //these are callback functions for events in the init
     this.CB_Obj = () => {
       
       function sayHello(event){
         console.log( this.DOM.test );
         console.log( event );
         console.log( this );
       }
       
       return{
          sayHello : sayHello
       };
       
     };      
     
      //helpers are useful bits for processing data
     this.setupObj = () => {
       
       return {
         
       };
       
     };
     
      //We have launch!
      this.init();
      
    };
    
    $( '.hello' ).each( () => {
        new NewClass( this );
    } );
    
  })( window, jQuery );