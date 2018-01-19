<div class="nbtsow-headline-wrap">
  <?php
  foreach( $order as $item ) {
    switch($item) {
      case 'headline':
        if( !empty($headline_text) ) {

          if(isset($headline_color) && !empty($headline_color)) {
            $color = 'color:'.$headline_color.';';
          } else {$color = '';}

          if(!empty($headline_font) && $headline_font != 'default') {
            $font_family = 'font-family:'.$headline_font.';';
          } else {$font_family = '';}

          if(!empty($headline_fontsize)) {
            $font_size = 'font-size:'.$headline_fontsize.';';
          } else {$font_size = '';}

          if(isset($headline_align)) {
            $align = 'text-align:'.$headline_align.';';
          } else {$align = '';}

          if(!empty($headline_lineheight)) {
            $lineheight = 'line-height:'.$headline_lineheight.';';
          } else {$lineheight = '';}

          if(!empty($headline_margin)) {
            $margin = 'margin:'.$headline_margin.' 0px;';
          } else {$margin = '';}

            echo '<' . $headline_tag . ' class="nbtsow-headline" style="'.$color.$font_family.$font_size.$align.$lineheight.$margin.'">' . wp_kses_post( $headline_text ) . '</' . $headline_tag . '>'; 
        }
        break;
      case 'sub_line':
        if( !empty($sub_line_text) ) {

          if(isset($sub_line_color) && !empty($sub_line_color)) {
            $color = 'color:'.$sub_line_color.';';
          } else {$color = '';}

          if(!empty($sub_line_font) && $sub_line_font != 'default') {
            $font_family = 'font-family:'.$sub_line_font.';';
          } else {$font_family = '';}

          if(!empty($sub_line_fontsize)) {
            $font_size = 'font-size:'.$sub_line_fontsize.';';
          } else {$font_size = '';}

          if(isset($sub_line_align)) {
            $align = 'text-align:'.$sub_line_align.';';
          } else {$align = '';}

          if(!empty($sub_line_lineheight)) {
            $lineheight = 'line-height:'.$sub_line_lineheight.';';
          } else {$lineheight = '';}

          if(!empty($sub_line_margin)) {
            $margin = 'margin:'.$sub_line_margin.' 0px;';
          } else {$margin = '';}

          echo '<' . $sub_line_tag . ' class="nbtsow-subline" style="'.$color.$font_family.$font_size.$align.$lineheight.$margin.'">' . wp_kses_post( $sub_line_text ) . '</' . $sub_line_tag . '>';

        }
        break;
      case 'divider':
        if($divider) {
          echo '<div class="decoration">
                  <div class="decoration-inside"></div>
                </div>';
        }
        break;
    }
  }
  ?>
</div>
