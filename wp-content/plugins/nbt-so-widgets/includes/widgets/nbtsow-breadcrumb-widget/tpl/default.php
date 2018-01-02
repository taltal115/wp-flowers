<?php
if(!is_home() && !is_front_page()){
    if(function_exists('bcn_display')){
        echo '<div class="show_breadcrumb">';
        bcn_display();
        echo '</div>';
    }
}