<?php
$src = wp_get_attachment_image_src($image,$size);
$attr = array();
if(isset($src)){
    $attr = array(
        'src' => $src[0]
    );
}
if(function_exists('wp_get_attachment_image_srcset')){
    $attr['srcset'] = wp_get_attachment_image_srcset($image, $size);
}
?>
<section class="our_services">
    <div class="img_services">
        <img src="<?php echo $attr['src'];  ?>" alt="img_service" />
    </div>
        <div class="detail-services">
        <h2 class="our_services_title"><?php echo $title; ?></h2>
        <p class="our_services_main_text"><?php echo $content; ?></p>
        <p class="our_services_sub_text"><a href="#"><?php echo $subtext; ?></a></p>
    </div>
</section>
