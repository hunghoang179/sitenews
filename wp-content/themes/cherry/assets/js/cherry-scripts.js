jQuery(document).ready(function()
{
    setTimeout(function()
    {
        jQuery('.bd-criteria-percent .bd-criteria-percentage').each(function()
        {
            var me = jQuery(this);
            var perc = me.attr("data-percentage");
            var current_perc = 0;
            var progress = setInterval(function()
            {
                if (current_perc>=perc)
                {
                    clearInterval(progress);
                } else {
                    current_perc +=1;
                    me.css('width', (current_perc)+'%');
                }
                me.text((current_perc)+'%');
            }, 10);
        });
    },10);


    var vids = jQuery(".postsv3 .posts-v3");
    for(var i = 0; i < vids.length; i+=2)
    {
        vids.slice(i, i+2).wrapAll('<div class="posts-v3-items"></div>');
    }
});

// Tabs
function initTabGroup(content) {
	if(typeof content == 'undefined'){
		content = document;
	}
	if (jQuery('.tabgroup', jQuery(content)).length) {
		jQuery('.tabgroup', jQuery(content)).tabs().show();
	}
}

jQuery(document).ready(function($){

    jQuery('#header-nav li.home a').html('<i class="icon-home"></i>'); //Added html - append - before - after

	/*  Fit Videos
    ------------------------------------------------------- */
	jQuery("div.bd-video-widget, .bd-video-shortcode, .pp-video").fitVids();
	
	//******** SHORT CODES  ********//
	
	// Tabs
	initTabGroup();
	
	// Toggles	
	jQuery('div.toggle h4').click(function () {	
	var text = jQuery(this).siblings('div.panel');
	if (text.is(':hidden')) {
		text.slideDown('200');
		jQuery(this).siblings('span').html('-');		
	} else {
		text.slideUp('200');
		jQuery(this).siblings('span').html('+');		
	}
	});
	
	
	
jQuery('.pp-img a img, .post_thumbnail img, .flickr_badge_image img, header .ads_468, footer img, .ads_bottom img, ul.small_thumbs li img, .post_thumbnail a, .widget_ads_125 a, .slider .top_slider .thumb img, .first-post-thumbnail img, .first-post-thumbnail-tabs img, .first-post-thumbnail-box img').hover( function() {
    jQuery(this).stop().animate({opacity:0.8},{queue:false,duration:200});  
   	}, function() {
    jQuery(this).stop().animate({opacity:1},{queue:false,duration:200});  
});

jQuery(".bdayh_theme_colors li").click(function()
{
    var link_color =  jQuery(this).find('a').attr('href').replace('#','');
    jQuery('#style_blue,#style_green,#style_rose,#style_orange,#style_gray').attr('disabled','disabled');
	jQuery('#style_'+link_color).removeAttr('disabled');
});

jQuery(".theme_p li").click(function()
{
    var pattren_num =  jQuery(this).find('a').attr('href').replace('#','');
	if(pattren_num < 17 && pattren_num >= 1)
	{
    	jQuery('body').css('background-image',"url('"+cherry_url+"/assets/images/pattern/pattern_"+ pattren_num +".png')");
 		jQuery('#stylebg_bg1,#stylebg_bg2').attr('disabled','disabled');
	}
});


jQuery(".bgfull li").click(function()
{
    var backfull =  jQuery(this).find('a').attr('href').replace('#','');
    jQuery('#stylebg_bg1,#stylebg_bg2').attr('disabled','disabled');
	jQuery('#stylebg_'+backfull).removeAttr('disabled');
});


jQuery(".bdayh_theme_wide").click(function()
{
	jQuery('#style_wide').attr('disabled','disabled');
	jQuery('#style_wide').removeAttr('disabled');
});

jQuery(".bdayh_theme_blocks").click(function()
{
	jQuery('#style_wide').attr('disabled','disabled');
});

jQuery(".bdayh_theme_leftsidebar").click(function()
{
	jQuery('#style_sidebarleft').attr('disabled','disabled');
	jQuery('#style_sidebarleft').removeAttr('disabled');
});

jQuery(".bdayh_theme_rightsidebar").click(function()
{
	jQuery('#style_sidebarleft').attr('disabled','disabled');
});


jQuery(".widget_tabs ol.tabs_nav li a, .box_tabs ol.box_tabs_nav li a, div.gotop a, ul.small_thumbs li a, .scrolling_box .nav a,.theme_switcher a").click(function(event)
{
	event.preventDefault(event);
});
// preventDefault
jQuery(".toolbar ul li, nav ul li").each(function () {
var jQuerysubmeun = jQuery(this).find('ul:first');
	jQuery(this).hover(function () {
	jQuerysubmeun.stop().css({overflow: "hidden",height: "auto",display: "none",paddingTop: 0}).slideDown(180,
	function () {
	jQuery(this).css({overflow: "visible",height: "auto"});
});
}, function () {
	jQuerysubmeun.stop().slideUp(180, function () {
	jQuery(this).css({overflow: "hidden",display: "none"});
});
});
});

/* Top Navigation Select */
    jQuery("<select />").appendTo("#top-nav-menu");jQuery("<option />",{selected:"selected",value:"",text:js_local_vars.dropdown_goto}).appendTo("#top-nav-menu select");jQuery("#top-nav-menu li").each(function(){var e=jQuery(this).parents("ul").length-1;var t="";if(e>0){t=" - "}if(e>1){t=" - - "}if(e>2){t=" - - -"}if(e>3){t=" - - - -"}var n=jQuery(this).children("a");jQuery("<option />",{value:n.attr("href"),text:t+n.text()}).appendTo("#top-nav-menu select")});jQuery("#top-nav-menu select").change(function(){window.location=jQuery(this).find("option:selected").val()});
	
	/* Navigation Select */
    jQuery("<select />").appendTo("#header-nav");jQuery("<option />",{selected:"selected",value:"",text:js_local_vars.dropdown_goto}).appendTo("#header-nav select");jQuery("#header-nav li").each(function(){var e=jQuery(this).parents("ul").length-1;var t="";if(e>0){t=" - "}if(e>1){t=" - - "}if(e>2){t=" - - -"}if(e>3){t=" - - - -"}var n=jQuery(this).children("a");jQuery("<option />",{value:n.attr("href"),text:t+n.text()}).appendTo("#header-nav select")});jQuery("#header-nav select").change(function(){window.location=jQuery(this).find("option:selected").val()});
// Responsive nav

jQuery('.theme_switcher_button').on('click', function(e){
        e.preventDefault();
        if(jQuery('.theme_switcher').hasClass('opened')){
            jQuery('.theme_switcher').animate({
                left: -192
            }, 700, function(){
                jQuery(this).removeClass('opened');
            });
        }else{
            jQuery('.theme_switcher').animate({
                left: 0
            }, 700, function(){
                jQuery(this).addClass('opened');
       });
}});
// Theme switcher


	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 1) {
			jQuery('.gotop').css({bottom:"15px"});
		} else {
			jQuery('.gotop').css({bottom:"-100px"});
		}
	});
	jQuery('.gotop').click(function(){
		jQuery('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});

    jQuery(".gallery-icon a").attr('rel' , 'prettyPhoto[gallery], ');
    jQuery("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false});
    jQuery("a[rel^='prettyPhoto']").live("click",function() {
        jQuery.prettyPhoto.open(jQuery(this).attr("href"),"","");
        return false;
    });



    jQuery(".widgetslider").hover(function(event) {{
		jQuery(this).find('a.flex-next').stop(true, true).animate({opacity: 1, right: "20px"}, {duration: 400});
		jQuery(this).find('a.flex-prev').stop(true, true).animate({opacity: 1, left: "20px"}, {duration: 400});
	}},
	function(){
		jQuery(this).find('a.flex-next').stop(true, true).animate({opacity: 0, right: "-50px"}, {duration: 400});
		jQuery(this).find('a.flex-prev').stop(true, true).animate({opacity: 0, left: "-50px"}, {duration: 400});
	}); 




jQuery(".footer_bottom ul.widget_social li, .toolbar ul.widget_social li").each(function () {

	jQuery("a strong", this).css("opacity", "0");});
	jQuery(".footer_bottom ul.widget_social li, .toolbar ul.widget_social li").hover(function () {
	jQuery(this).stop().fadeTo(500, 1).siblings().stop().fadeTo(500, 0.1);
	jQuery("a strong", this).stop().animate({opacity: 0.4,}, 300);},
function () {
	jQuery(this).stop().fadeTo(500, 0.4).siblings().stop().fadeTo(500, 0.4);
	jQuery("a strong", this).stop().animate({opacity: 0,}, 300);
});
jQuery
// social

// links
jQuery(".m").addClass('end_row');
// footer


jQuery(".first-post-thumbnail ").hover(function(event) {
{
	jQuery(this).find('span.article-icon').stop(true, true).animate({opacity: 1, left: "50%"}, {duration: 500 /*,easing: 'easeOutElastic'*/});
}},
function(){
	jQuery(this).find('span.article-icon').stop(true, true).animate({opacity: 0, left: "-50px"},{duration: 200 /*,easing: 'easeOutElastic'*/});
});



jQuery(".widget .widget_container ul li").hover(function(event) {
{
jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 1, left: 17}, {duration: 'slow'/*,easing: 'easeOutElastic'*/});
}},
function(){
jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 0, left: 0},400);
});


jQuery(".scrolling_box .items .item").hover(function(event) {
{
jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 1, left: 55}, {duration: 'slow'/*,easing: 'easeOutElastic'*/});
}},
function(){
jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 0, left: 0},400);
});

jQuery(".news_pic_home .post_thumbnail, .cat_box ul li .post_thumbnail, .pp-post-thumbnail-blog").hover(function(event) {

{
	jQuery(this).find('span.bd_over_post').stop(true, true).animate({opacity: 1, right: '0'}, {duration: 'slow'});


jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 1, left: '45%'}, {duration: 300,easing: 'easeOutBounce'});
}},
function(){
jQuery(this).find('span.bd_over_post').stop(true, true).animate({opacity: 0, right: '-350px'},{duration: 'slow'});

jQuery(this).find('span.post_comment_counter').stop(true, true).animate({opacity: 0, left: 0},400);


});
// post_thumbnail



jQuery('.news_pic a, .recent_news a, .widget_ads_125 a, .widget .tagcloud a, .widget_social a, .footer_social a, .author_social a, .news_pic_home li a, .ads_bottom a, .ads_468 a, .scrolling_box_content .items .item div.post_thumbnail a, .flickr_badge_image img , #calendar_wrap a, .home_ads a , .article_above_ads a, .recent_bd ul li a, .inner_post .bdayh_tip,.ads_250x250 img, .tip').tipsy({
fade: true,
gravity: 's'
});
//tooltip

jQuery(".tab_container").hide();
jQuery("ol.tabs_nav li:first").addClass("active").show();
jQuery(".tab_container:first").show();
jQuery("ol.tabs_nav li").click(function() {
	jQuery("ol.tabs_nav li").removeClass("active");
	jQuery(this).addClass("active");
	jQuery(".tab_container").hide();
	var activeTab = jQuery(this).find("a").attr("href");
	jQuery(activeTab).fadeIn();
	return false;
});

jQuery('.alert_home_close img').click(function() {
jQuery('.alert_home').fadeOut(500).fadeIn(500).fadeOut(500);
});
// End alert home
});

jQuery(window).load(function(){
		var hedaerHeight = jQuery('#cherry-nav').offset().top ;
		var main = jQuery('.fixed-enabled');
		jQuery(window).scroll(function(){
			HeaderScroll();
		});
		jQuery(window).load(function(){
			HeaderScroll();
		});
		function HeaderScroll(){
			var scrollY=jQuery(window).scrollTop();
			if(main.length>0){
				if(scrollY > hedaerHeight){
					main.stop().addClass('fixed-nav');
				}else if(scrollY < hedaerHeight){
					main.removeClass('fixed-nav');
				}
			}
		}
});

/**
 * Rate
 */
(function(jQuery){
    function user_rating(){
        if (jQuery('.bd-user-review-rating').length)
        {
            // Get elements
            this.el = this.build_el();

            if (!this.is_rated())
            {
                // Interface fixes
                this.el.stars.top.css('background-position-y', 'top');
                this.el.stars.under.css('width', '98px');
                // Bind Events
                this.bind_events();
            }
            else
            {
                this.display_user_rating();
            }
        }
    }

    user_rating.prototype.is_rated = function ()
    {
        if (this.readCookie('bd_rating_' + bd_script.post_id) === 'rated')
        {
            return true;
        }
        else
        {
            return false;
        }
    };

    user_rating.prototype.display_user_rating = function ()
    {
        var score = this.readCookie('bd_rating_score_' + bd_script.post_id),
            position = this.readCookie('bd_rating_position_'+ bd_script.post_id);
        this.el.rating.score.html(score);
        this.el.stars.top.css('width', position + '%');
        this.el.rating.label.your_rating.show();
        this.el.rating.label.user_rating.hide();
    };

    user_rating.prototype.build_el = function ()
    {
        var el =
        {
            rating:
            {
                score:jQuery('SPAN.score', '.bd-user-review-description'),
                count:jQuery('SPAN.count', '.bd-user-review-description'),
                label:
                {
                    your_rating:jQuery('SPAN.your_rating', '.bd-user-review-description'),
                    user_rating:jQuery('SPAN.user_rating', '.bd-user-review-description')
                }
            },
            stars:
            {
                under:jQuery('.bd-criteria-star-under', '.bd-user-review-rating'),
                top:jQuery('.bd-criteria-star-top', '.bd-user-review-rating')
            }
        };

        // Plain JS style retrieval
        el.stars.old_position = parseInt(el.stars.top[0].style.width, 10);
        el.rating.old_score = el.rating.score.html();

        return el;
    };

    user_rating.prototype.bind_events = function ()
    {
        var me = this;

        // Hover effect
        me.el.stars.under.on('mouseover', function ()
        {
            // changes the sprite
            me.el.stars.top.css('background-position-y', 'bottom');

            // Changes the cursor
            jQuery(this).css('cursor', 'pointer');

            // changes the text
            me.el.rating.label.your_rating.show();
            me.el.rating.label.user_rating.hide();

        });

        me.el.stars.under.on('mouseout', function ()
        {
            // Returns the sprite
            me.el.stars.top.css('background-position-y', 'top');

            // Returns the initial position
            me.el.stars.top.css('width', me.el.stars.old_position + '%');

            // Returns the text and initial rating
            me.el.rating.label.user_rating.show();
            me.el.rating.label.your_rating.hide();
            me.el.rating.score.html(me.el.rating.old_score);

        });

        me.el.stars.under.on('mousemove', function (e)
        {
            if (!e.offsetX)
            {
                e.offsetX = e.clientX - jQuery(e.target).offset().left;
            }

            // Moves the width
            var offset = e.offsetX + 4;
            if (offset > 100)
            {
                offset = 100;
            }
            me.el.stars.top.css('width', offset + '%');

            // Update the real-time score
            var score = Math.floor(((offset / 10) * 5)) / 10;
            if (score > 5)
            {
                score = 5;
            }
            me.el.rating.score.html(score);

        });

        // Click effect
        me.el.stars.under.on('click', function (e)
        {
            if (!e.offsetX)
            {
                e.offsetX = e.clientX - jQuery(e.target).offset().left;
            }
            var count = parseInt(me.el.rating.count.html(), 10) + 1,
                score = (Math.floor(((e.offsetX + 4) / 10) * 5) / 10),
                position = e.offsetX + 4;
            if (score > 5)
            {
                score = 5;
            }

            if (position > 100)
            {
                position = 100;
            }
            // Unbind events
            me.el.stars.under.off();
            me.el.stars.under.css('cursor', 'default');

            // Stars animation
            me.el.stars.top.fadeOut(function ()
            {
                me.el.stars.top.css('background-position-y', 'top');
                me.el.stars.top.fadeIn();
            });

            // Count increment
            me.el.rating.count.html(count);

            // AJAX call to wordpress
            var req =
            {
                action:'bd_rating',
                rating_position:position,
                rating_score:score,
                post_id:bd_script.post_id
            };

            jQuery.post(bd_script.ajaxurl, req, function ()
            {
                // Save cookie
                me.createCookie('bd_rating_' + bd_script.post_id, 'rated', 900);
                me.createCookie('bd_rating_score_' + bd_script.post_id, score, 900);
                me.createCookie('bd_rating_position_' + bd_script.post_id, position, 900);
            })
        });
    };

    user_rating.prototype.createCookie = function (name, value, days)
    {
        if (days)
        {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        }
        else var expires = "";
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    user_rating.prototype.readCookie = function (name)
    {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++)
        {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    user_rating.prototype.eraseCookie = function (name)
    {
        createCookie(name, "", -1);
    }

    jQuery(document).ready(function ()
    {
        new user_rating();
    });
})(jQuery);


(function(c){function p(e,b,a){var d=this,l=e.add(this),h=e.find(a.tabs),i=b.jquery?b:e.children(b),j;h.length||(h=e.children());i.length||(i=e.parent().find(b));i.length||(i=c(b));c.extend(this,{click:function(f,g){var k=h.eq(f);if(typeof f=="string"&&f.replace("#","")){k=h.filter("[href*="+f.replace("#","")+"]");f=Math.max(h.index(k),0)}if(a.rotate){var n=h.length-1;if(f<0)return d.click(n,g);if(f>n)return d.click(0,g)}if(!k.length){if(j>=0)return d;f=a.initialIndex;k=h.eq(f)}if(f===j)return d;
g=g||c.Event();g.type="onBeforeClick";l.trigger(g,[f]);if(!g.isDefaultPrevented()){o[a.effect].call(d,f,function(){g.type="onClick";l.trigger(g,[f])});j=f;h.removeClass(a.current);k.addClass(a.current);return d}},getConf:function(){return a},getTabs:function(){return h},getPanes:function(){return i},getCurrentPane:function(){return i.eq(j)},getCurrentTab:function(){return h.eq(j)},getIndex:function(){return j},next:function(){return d.click(j+1)},prev:function(){return d.click(j-1)},destroy:function(){h.unbind(a.event).removeClass(a.current);
i.find("a[href^=#]").unbind("click.T");return d}});c.each("onBeforeClick,onClick".split(","),function(f,g){c.isFunction(a[g])&&c(d).bind(g,a[g]);d[g]=function(k){c(d).bind(g,k);return d}});if(a.history&&c.fn.history){c.tools.history.init(h);a.event="history"}h.each(function(f){c(this).bind(a.event,function(g){d.click(f,g);return g.preventDefault()})});i.find("a[href^=#]").bind("click.T",function(f){d.click(c(this).attr("href"),f)});if(location.hash)d.click(location.hash);else if(a.initialIndex===
0||a.initialIndex>0)d.click(a.initialIndex)}c.tools=c.tools||{version:"1.2.3"};c.tools.tabs={conf:{tabs:"a",current:"current",onBeforeClick:null,onClick:null,effect:"default",initialIndex:0,event:"click",rotate:false,history:false},addEffect:function(e,b){o[e]=b}};var o={"default":function(e,b){this.getPanes().hide().eq(e).show();b.call()},fade:function(e,b){var a=this.getConf(),d=a.fadeOutSpeed,l=this.getPanes();d?l.fadeOut(d):l.hide();l.eq(e).fadeIn(a.fadeInSpeed,b)},slide:function(e,b){this.getPanes().slideUp(200);
this.getPanes().eq(e).slideDown(400,b)},ajax:function(e,b){this.getPanes().eq(0).load(this.getTabs().eq(e).attr("href"),b)}},m;c.tools.tabs.addEffect("horizontal",function(e,b){m||(m=this.getPanes().eq(0).width());this.getCurrentPane().animate({width:0},function(){c(this).hide()});this.getPanes().eq(e).animate({width:m},function(){c(this).show();b.call()})});c.fn.tabs=function(e,b){var a=this.data("tabs");if(a){a.destroy();this.removeData("tabs")}if(c.isFunction(b))b={onBeforeClick:b};b=c.extend({},
c.tools.tabs.conf,b);this.each(function(){a=new p(c(this),e,b);c(this).data("tabs",a)});return b.api?a:this}})(jQuery);
(function(b){function h(c){if(c){var a=d.contentWindow.document;a.open().close();a.location.hash=c}}var g,d,f,i;b.tools=b.tools||{version:"1.2.3"};b.tools.history={init:function(c){if(!i){if(b.browser.msie&&b.browser.version<"8"){if(!d){d=b("<iframe/>").attr("src","javascript:false;").hide().get(0);b("body").append(d);setInterval(function(){var a=d.contentWindow.document;a=a.location.hash;g!==a&&b.event.trigger("hash",a)},100);h(location.hash||"#")}}else setInterval(function(){var a=location.hash;
a!==g&&b.event.trigger("hash",a)},100);f=!f?c:f.add(c);c.click(function(a){var e=b(this).attr("href");d&&h(e);if(e.slice(0,1)!="#"){location.href="#"+e;return a.preventDefault()}});i=true}}};b(window).bind("hash",function(c,a){a?f.filter(function(){var e=b(this).attr("href");return e==a||e==a.replace("#","")}).trigger("history",[a]):f.eq(0).trigger("history",[a]);g=a;window.location.hash=g});b.fn.history=function(c){b.tools.history.init(this);return this.bind("history",c)}})(jQuery);


