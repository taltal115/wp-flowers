<div class="nbt-testimonial-home5 owl-carousel">
<?php foreach ($instance['columns'] as $key => $value) {
	$getimg[$key] = wp_get_attachment_image_src($value['testimonials_avatar'], "large");
	$img[$key] = $getimg[$key][0];
?>
	<div class="owl-item"> 
		<img src="<?php echo $img[$key]; ?>" class="nbt-img-test-home5" alt="<?php echo $value['testimonials_avatar_alt']; ?>" />
		<h3 class="nbt-name-test-home5"><?php echo $value['testimonials_name']; ?></h3>
		<p class="nbt-title-test-home5"><?php echo $value['testimonials_avatar_title']; ?></p>
		<p class="nbt-content-test-home5"><?php echo $value['testimonials_content']; ?></p>
	</div>
<?php } ?>
</div>
<script type="text/javascript">
	jQuery(document).ready(function () {
	    jQuery(".owl-carousel").owlCarousel({
	        loop: true,
	        autoplay: true,
	        slideSpeed: 3000,
	        nav: true,
	        navText: ["",""],
	        dots: true,
	        responsive:{
				0:{
					items:1,        
				},
				480: {
                    items: 1, margin: 10,
                },
				768:{
					items:1, margin: 10,       
				}
			},
	    });
	});
</script>