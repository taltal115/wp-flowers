<?php
$src = wp_get_attachment_image_src($image, $size);
$attr = array();
if(!empty($src)){
    $attr['src'] = $src[0];
}
if(!empty($src[1])){
    $attr['width'] = $src[1];
}
if(!empty($src[2])){
    $attr['height'] = $src[2];
}

if(function_exists('wp_get_attachment_image_srcset')){
    $atrr['srcset'] = wp_get_attachment_image_srcset($image, $src);
}
?>
<section class="about-our-team">
    <div>
        <?php if(!empty($attr)): ?>
            <img <?php foreach ($attr as $key => $value) echo $key.' = '.'"'.$value.'"'.' ' ?> size=<?php echo $size ?>  alt="image" />
        <?php endif; ?>
    </div>
    <div class="about-our-team-info">
        <div class="name-job">
            <?php if(!empty($name)): ?>
                <h2><?php echo $name; ?></h2>
            <?php endif; ?>

            <?php if(!empty($job)): ?>
                <p><?php echo $job; ?></p>
            <?php endif; ?>
        </div>

        <div class="about-social">
            <?php
                if(!empty($facebook_url)){
                    echo '<a class="social_face" href="'.$facebook_url.'"><i class="icon-facebook"></i></a>';

                }
                if(!empty($twiter_url)){
                    echo '<a class="twiter_face" href="'.$twiter_url.'"><i class="icon-twitter"></i></a>';
                }

                if(!empty($google_url)){
                    echo '<a class="google_url" href="'.$google_url.'"><i class="icon-gplus"></i></a>';
                }

                if(!empty($in_url)){
                    echo '<a class="in_url" href="'.$in_url.'"><i class="icon-linkedin"></i></a>';
                }
             ?>
        </div>
    </div>
</section>
