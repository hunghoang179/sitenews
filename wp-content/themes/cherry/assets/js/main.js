jQuery(document).ready(function($) {
	
	//tooltip();
    jQuery('.ttip , .tooltip-n').tipsy({fade: true, gravity: 's'});
    jQuery('.tooldown, .tooltip-s').tipsy({fade: true, gravity: 'n'});	
    jQuery('.tooltip-nw').tipsy({fade: true, gravity: 'nw'});
    jQuery('.tooltip-ne').tipsy({fade: true, gravity: 'ne'});	
    jQuery('.tooltip-w').tipsy({fade: true, gravity: 'w'});
    jQuery('.tooltip-e').tipsy({fade: true, gravity: 'e'});
    jQuery('.tooltip-sw').tipsy({fade: true, gravity: 'w'});
    jQuery('.tooltip-se').tipsy({fade: true, gravity: 'e'});

	// Menu
	jQuery('.top-menu ul, .top-menu ul li ul, .top-menu ul li ul li ul,  .main-menu ul, .main-menu ul li ul, .main-menu ul li ul li ul').parent('li').addClass('parent-list');
	jQuery('.parent-list').find("a:first").append(' <span class="sub-indicator">&raquo;</span>');
	jQuery(".top-menu li, .main-menu li").each(function(){	
		var $sublist = jQuery(this).find('ul:first');		
		jQuery(this).hover(function(){	
			$sublist.stop().css({overflow:"hidden", height:"auto", display:"none"}).slideDown(100, function(){
				jQuery(this).css({overflow:"visible", height:"auto"});
			});	
		},
		function(){	
			$sublist.stop().slideUp(100, function()	{	
				jQuery(this).css({overflow:"hidden", display:"none"});
			});
		});	
	});
	
	/* Top Navigation Select */
    jQuery("<select />").appendTo("#top-nav-menu");jQuery("<option />",{selected:"selected",value:"",text:js_local_vars.dropdown_goto}).appendTo("#top-nav-menu select");jQuery("#top-nav-menu li").each(function(){var e=jQuery(this).parents("ul").length-1;var t="";if(e>0){t=" - "}if(e>1){t=" - - "}if(e>2){t=" - - -"}if(e>3){t=" - - - -"}var n=jQuery(this).children("a");jQuery("<option />",{value:n.attr("href"),text:t+n.text()}).appendTo("#top-nav-menu select")});jQuery("#top-nav-menu select").change(function(){window.location=jQuery(this).find("option:selected").val()});
	
	/* Navigation Select */
    jQuery("<select />").appendTo("#header-nav");jQuery("<option />",{selected:"selected",value:"",text:js_local_vars.dropdown_goto}).appendTo("#header-nav select");jQuery("#header-nav li").each(function(){var e=jQuery(this).parents("ul").length-1;var t="";if(e>0){t=" - "}if(e>1){t=" - - "}if(e>2){t=" - - -"}if(e>3){t=" - - - -"}var n=jQuery(this).children("a");jQuery("<option />",{value:n.attr("href"),text:t+n.text()}).appendTo("#header-nav select")});jQuery("#header-nav select").change(function(){window.location=jQuery(this).find("option:selected").val()});
	
	jQuery('input, textarea').placeholder();
});


// tipsy, version 1.0.0a
// (c) 2008-2010 jason frame [jason@onehackoranother.com]
// released under the MIT license
(function(a){function b(a,b){return typeof a=="function"?a.call(b):a}function c(a){while(a=a.parentNode){if(a==document)return true}return false}function d(b,c){this.$element=a(b);this.options=c;this.enabled=true;this.fixTitle()}d.prototype={show:function(){var c=this.getTitle();if(c&&this.enabled){var d=this.tip();d.find(".tipsy-inner")[this.options.html?"html":"text"](c);d[0].className="tipsy";d.remove().css({top:0,left:0,visibility:"hidden",display:"block"}).prependTo(document.body);var e=a.extend({},this.$element.offset(),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight});var f=d[0].offsetWidth,g=d[0].offsetHeight,h=b(this.options.gravity,this.$element[0]);var i;switch(h.charAt(0)){case"n":i={top:e.top+e.height+this.options.offset,left:e.left+e.width/2-f/2};break;case"s":i={top:e.top-g-this.options.offset,left:e.left+e.width/2-f/2};break;case"e":i={top:e.top+e.height/2-g/2,left:e.left-f-this.options.offset};break;case"w":i={top:e.top+e.height/2-g/2,left:e.left+e.width+this.options.offset};break}if(h.length==2){if(h.charAt(1)=="w"){i.left=e.left+e.width/2-15}else{i.left=e.left+e.width/2-f+15}}d.css(i).addClass("tipsy-"+h);d.find(".tipsy-arrow")[0].className="tipsy-arrow tipsy-arrow-"+h.charAt(0);if(this.options.className){d.addClass(b(this.options.className,this.$element[0]))}if(this.options.fade){d.stop().css({opacity:0,display:"block",visibility:"visible"}).animate({opacity:this.options.opacity})}else{d.css({visibility:"visible",opacity:this.options.opacity})}}},hide:function(){if(this.options.fade){this.tip().stop().fadeOut(function(){a(this).remove()})}else{this.tip().remove()}},fixTitle:function(){var a=this.$element;if(a.attr("title")||typeof a.attr("original-title")!="string"){a.attr("original-title",a.attr("title")||"").removeAttr("title")}},getTitle:function(){var a,b=this.$element,c=this.options;this.fixTitle();var a,c=this.options;if(typeof c.title=="string"){a=b.attr(c.title=="title"?"original-title":c.title)}else if(typeof c.title=="function"){a=c.title.call(b[0])}a=(""+a).replace(/(^\s*|\s*$)/,"");return a||c.fallback},tip:function(){if(!this.$tip){this.$tip=a('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>');this.$tip.data("tipsy-pointee",this.$element[0])}return this.$tip},validate:function(){if(!this.$element[0].parentNode){this.hide();this.$element=null;this.options=null}},enable:function(){this.enabled=true},disable:function(){this.enabled=false},toggleEnabled:function(){this.enabled=!this.enabled}};a.fn.tipsy=function(b){function e(c){var e=a.data(c,"tipsy");if(!e){e=new d(c,a.fn.tipsy.elementOptions(c,b));a.data(c,"tipsy",e)}return e}function f(){var a=e(this);a.hoverState="in";if(b.delayIn==0){a.show()}else{a.fixTitle();setTimeout(function(){if(a.hoverState=="in")a.show()},b.delayIn)}}function g(){var a=e(this);a.hoverState="out";if(b.delayOut==0){a.hide()}else{setTimeout(function(){if(a.hoverState=="out")a.hide()},b.delayOut)}}if(b===true){return this.data("tipsy")}else if(typeof b=="string"){var c=this.data("tipsy");if(c)c[b]();return this}b=a.extend({},a.fn.tipsy.defaults,b);if(!b.live)this.each(function(){e(this)});if(b.trigger!="manual"){var h=b.live?"live":"bind",i=b.trigger=="hover"?"mouseenter":"focus",j=b.trigger=="hover"?"mouseleave":"blur";this[h](i,f)[h](j,g)}return this};a.fn.tipsy.defaults={className:null,delayIn:0,delayOut:0,fade:false,fallback:"",gravity:"n",html:false,live:false,offset:0,opacity:.8,title:"title",trigger:"hover"};a.fn.tipsy.revalidate=function(){a(".tipsy").each(function(){var b=a.data(this,"tipsy-pointee");if(!b||!c(b)){a(this).remove()}})};a.fn.tipsy.elementOptions=function(b,c){return a.metadata?a.extend({},c,a(b).metadata()):c};a.fn.tipsy.autoNS=function(){return a(this).offset().top>a(document).scrollTop()+a(window).height()/2?"s":"n"};a.fn.tipsy.autoWE=function(){return a(this).offset().left>a(document).scrollLeft()+a(window).width()/2?"e":"w"};a.fn.tipsy.autoBounds=function(b,c){return function(){var d={ns:c[0],ew:c.length>1?c[1]:false},e=a(document).scrollTop()+b,f=a(document).scrollLeft()+b,g=a(this);if(g.offset().top<e)d.ns="n";if(g.offset().left<f)d.ew="w";if(a(window).width()+a(document).scrollLeft()-g.offset().left<b)d.ew="e";if(a(window).height()+a(document).scrollTop()-g.offset().top<b)d.ns="s";return d.ns+(d.ew?d.ew:"")}}})(jQuery);
