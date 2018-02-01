<?php
    $mon_sun = array(
        'ראשון' => $sun_sat,
        'שני' => $mon,
        'שלישי' => $tues,
        'רביעי' => $wednes,
        'חמישי' => $thurs,
        'שישי' => $fri,
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
