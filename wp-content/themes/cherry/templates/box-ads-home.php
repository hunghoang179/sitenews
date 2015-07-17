
	<?php if($v['ad_type'] == 'code') { ?>
		<div class="clear"></div>
			<div class="home_ads">
				<?php echo stripslashes($v['ad_code']); ?>
			</div>
		<div class="clear"></div>
	<?php } else { ?>
		<div class="clear"></div>
			<div class="home_ads">
				<a href="<?php echo $v['ad_link']; ?>" title="<?php echo $v['ad_alt']; ?>" target="_blank"><img src="<?php echo $v['ad_img']; ?>" alt="<?php echo $v['ad_alt']; ?>" /></a>
			</div>
		<div class="clear"></div>
	<?php } ?>
