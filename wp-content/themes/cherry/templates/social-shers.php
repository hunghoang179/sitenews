	<div class="pp-article-shares-links-blog">

		<?php if(bdayh_get_option('blog_home_fb') == 1){ ?>
			<div class="pp-facebook">
			<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=105&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:105px; height:21px;" allowTransparency="true"></iframe>
			</div><!--//fb-->
		<?php } ?>

		<?php if(bdayh_get_option('blog_home_gp') == 1){ ?>
		  <div class="pp-google">
			<div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>
			<script type='text/javascript'>
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
		  </div><!--//google-->
	  	<?php } ?>

		<?php if(bdayh_get_option('blog_home_tweet') == 1){ ?>
		  <div class="pp-twitter">
		  <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="<?php echo stripslashes(bdayh_get_option('article_twitter_sername')); ?>" data-lang="en">tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		  </div><!--//twitter-->
		<?php } ?>

		<?php if(bdayh_get_option('blog_home_in') == 1){ ?>
		  <div class="pp-linkedin">
		  	<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script>
		  </div><!--//linkedin-->
    	<?php } ?>

		<?php if(bdayh_get_option('blog_home_pin') == 1){ ?>
		  <div class="pp-pinterest">
	      	<script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js">
	      	</script>
	      	<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo bd_pin_image('', 660 ,330); ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="http://assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
		  </div><!--//pinterest-->
    	<?php } ?>

		<?php if(bdayh_get_option('blog_home_su') == 1){ ?>
		  <div class="pp-stumble">
			<su:badge layout="2"></su:badge>
			<script type="text/javascript">
				(function() {
					var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
					li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
				})();
			</script>
		  </div><!--//stumble-->
	  	<?php } ?>

	</div><!--//article-shares-links-blog-->