<div class="postmeta_share">
<?php if(bdayh_get_option('twitter_button_boxy') == 1){ ?>
  <div class="share_button_boxy">
    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="<?php echo stripslashes(bdayh_get_option('article_twitter_sername')); ?>" data-lang="en" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </div>
  <!--//twiiter-->
  <?php } ?>
  
  <?php if(bdayh_get_option('facebook_button_boxy') == 1){ ?>
  <div class="share_button_boxy">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=246168878785275";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="box_count" data-width="450" data-show-faces="false"></div>
  </div>
  <!--//fb-->
  <?php } ?>
  
  <?php if(bdayh_get_option('googlep_button_boxy') == 1){ ?>
  <div class="share_button_boxy">
    <!-- Place this tag in your head or just before your close body tag. -->
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
    <!-- Place this tag where you want the +1 button to render. -->
    <div class="g-plusone" data-size="tall"></div>
  </div>
  <!--//google-->
  <?php } ?>
  
  <?php if(bdayh_get_option('linkedin_button_boxy') == 1){ ?>
  <div class="share_button_boxy">
    <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
    <script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="top"></script>
  </div>
  <!--//linkedin-->
  <?php } ?>
  
  <?php if(bdayh_get_option('stumbleupon_button_boxy') == 1){ ?>
  <div class="share_button_boxy">
    <!-- Place this tag where you want the su badge to render -->
    <su:badge layout="5" location="<?php the_permalink(); ?>"></su:badge>
    
    <!-- Place this snippet wherever appropriate -->
    <script type="text/javascript">
  (function() {
    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
</script>
  </div>
  
  <!--//stumbleupon-->
  
  <?php } ?>
</div>
