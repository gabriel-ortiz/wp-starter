"use strict";jQuery(document).foundation(),function(t,e){(function(){var i=t.localStorage,n={};return n.hasData=function(t){return!!i[t]&&!!i[t].length},n.get=function(t){if(!this.hasData(t))return!1;var e=i[t];try{return JSON.parse(e)}catch(n){return e}},n.set=function(t,e){try{i.setItem(t,JSON.stringify(e))}catch(n){i.setItem(t,e)}},n.extend=function(t,i){if(this.hasData(t)){var n=this.get(t);e.extend(n,JSON.parse(JSON.stringify(i))),this.set(t,n)}else this.set(t,i)},n.remove=function(t){i.removeItem(t)},n})()}(void 0,jQuery),function(t,e){var i=function(t){this.$el=e(t),this.init()};i.prototype.init=function(){this.$el.on("click",function(){e(this).toggleClass("transform-active")})},e(document).ready(function(){e(".has-transform").each(function(){new i(this)})})}(void 0,jQuery),jQuery(document).ready(function(){jQuery(".accordion p:empty, .orbit p:empty").remove(),jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function(){jQuery(this).innerWidth()/jQuery(this).innerHeight()>1.5?jQuery(this).wrap("<div class='widescreen responsive-embed'/>"):jQuery(this).wrap("<div class='responsive-embed'/>")})});
//# sourceMappingURL=theme-scripts.js.map
