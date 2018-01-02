<?php
    $mon_sun = array(
        'Monday' => $mon,
        'Tuesday' => $tues,
        'Wednesday' => $wednes,
        'Thursday' => $thurs,
        'Friday' => $fri,
        'Sat & Sun' => $sun_sat
    );
?>
<section class="our-working">
    <?php echo '<h2>'.$title.'</h2>'; ?>
    <ul class="mon-sun">
        <?php
            foreach ($mon_sun as $key=>$value){
                echo '<li><span class="day">'.$key.'</span><span class="value">'.$value.'</span></li>';
            }
        ?>
    </ul>
</section>
