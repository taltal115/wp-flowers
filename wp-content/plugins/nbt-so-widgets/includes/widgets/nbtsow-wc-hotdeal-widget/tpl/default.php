
<div class="countdown-content">
	<?php if(!empty($title)): ?>
		<h2 class="widget-title nbt-widget-title"><?php echo esc_html($title,'nbtsow'); ?></h2>
	<?php endif;?>

	<?php if(!empty($sub_title)): ?>
		<div class="widget_sp_image-description">
			<p><?php echo  esc_html($sub_title,'ntsow');?></p>
		</div>
	<?php endif;?>

	<?php if($image): ?>
	<?php echo wp_get_attachment_image($image,'full'); ?>
	<?php endif; ?>

	<div id="countdown">
		<div class="time-wapper">
			<span class="days"></span>days
		</div>
		<div class="time-wapper">
			<span class="hours"></span>hours
		</div>
		<div class="time-wapper">
			<span class="mins"></span>mins
		</div>
		<div class="time-wapper">
			<span class="secs"></span>secs
		</div>
	</div>
	<?php if(!empty($url)) : ?>
	<a href="<?php echo esc_url($url) ?>" <?php if($new_window) echo 'target="_blank"' ?>> Shop Now</a>
	<?php endif; ?>
</div>

<script type="text/javascript">
  	jQuery(function ($) {
		"use strict";
		var jsdata = <?php echo json_encode($countdown); ?>;
		$('#countdown').countdown({date: jsdata}, function() { });
  	});
</script>