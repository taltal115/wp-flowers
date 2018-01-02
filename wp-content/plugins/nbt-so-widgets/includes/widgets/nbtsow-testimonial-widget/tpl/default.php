<?php
if(function_exists('wp_get_attachment_image_src')){
    $image_attr = wp_get_attachment_image_src($image);
    $src = $image_attr[0];
}

?>
<section class="testimonial">
    <div class="testimonial-thumb">
        <img src="<?php echo $src; ?>" alt="image_thumbnail" />
    </div>
    <ul class="testimonial-content">
        <?php $i = 0; ?>
        <?php foreach ($testimonials as $testimonial): ?>
            <?php if($i%2 == 0): ?>
                <li class="t-wapper">
                    <ul>
            <?php endif; ?>
                        <li>
                                <?php
                                    if(function_exists('wp_get_attachment_image_src')){
                                        $t_image_attr = wp_get_attachment_image_src($testimonial['t_image']);
                                    }
                                ?>
                                <div class="user_avatar">
                                    <img src="<?php echo $t_image_attr[0]; ?>" alt="user_avatar" />
                                </div>
                            <div class="user-meta">
                                <?php if($testimonial['t_comment'] !== ""): ?>
                                    <p><?php echo $testimonial['t_comment'] ?></p>
                                <?php endif; ?>
                                <?php if($testimonial['t_name'] !== ""): ?>
                                    <h2><?php echo $testimonial['t_name'] ?></h2>
                                <?php endif; ?>
                            </div>
                        </li>
            <?php $i++; ?>
            <?php if($i%2 == 0): ?>
                    </ul>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</section>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.testimonial-content').each(function(){
            jQuery(this).addClass('owl-carousel');
            jQuery(this).owlCarousel({
                items:1,
                nav:false,
                dots:true,
                startPosition: 1,
                responsive:{
                    0:{
                        items:1,
                    },
                    480:{
                        items:1,
                    },
                    768:{
                        items:1,
                    },
                    1200:{
                        items:1,
                    }
                }
            });
        });
    });
</script>
