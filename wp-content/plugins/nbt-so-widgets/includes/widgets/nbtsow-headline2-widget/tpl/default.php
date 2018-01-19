<div class="nbtsow-headline-wrap">
  <?php
  foreach( $order as $item ) {
    switch($item) {
      case 'headline':
        if( !empty($headline_text) ) {
          echo '<' . $headline_tag . ' class="nbtsow-headline">' . wp_kses_post( $headline_text ) . '</' . $headline_tag . '>';
        }
        break;
      case 'first_sub':
        if( !empty($first_sub_text) ) {
          echo '<' . $first_sub_tag . ' class="nbtsow-firstsub">' . wp_kses_post( $first_sub_text ) . '</' . $first_sub_tag . '>';
        }
        break;
      case 'second_sub':
        if( !empty($second_sub_text) ) {
          echo '<' . $second_sub_tag . ' class="nbtsow-secondsub">' . wp_kses_post( $second_sub_text ) . '</' . $second_sub_tag . '>';
        }
        break;
    }
  }
  ?>
</div>
