<?php

// In your functions.php

class Walker_ETF extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        echo '<div class="dropdown-menu" aria-labelledby="our-work">';
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = array();
        if( !empty( $item->classes ) ) {
            $classes = (array) $item->classes;
        }

        $active_class = '';
        if( in_array('current-menu-item', $classes) ) {
            $active_class = 'active';
        }

        $url = '';
        if( !empty( $item->url ) ) {
            $url = $item->url;
        }

        if($args->walker->has_children && 0 === $depth) {
            echo '<li class="nav-item btn dropdown"><a class="nav-link navigation" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" href="' . $url . '" id="our-work">' . $item->title . '</a>';
        } else if($depth > 0) {
            if(get_field('begins_new_row', $item)) {
                echo '<div class="dropdown-row">';
            } else if(get_field('ends_new_row', $item)) {
                 echo '</div>';
            } else if(get_field('is_seperator', $item)) {
                echo '<div class="dropdown-heading-line"></div>';
            } else if(get_field('is_submenu_title', $item)) {
                echo '<div class="dropdown-heading">' . $item->title . '</div>';
            } else {
                $icon = get_field('icon', $item);
                echo '<a class="dropdown-item" href="' . $url . '">';
                if($icon && $icon != 'none') {
                    echo '<span class="ic-circle"><i class="ic ic-'.$icon.'"></i></span>';
                }
                echo '<span class="label">' . $item->title . '</span></a>';
            }

        } else {
            echo '<li class="nav-item '. $active_class . '"><a class="nav-link navigation" href="' . $url . '">' . $item->title . '</a></li>';
        }
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        echo '</li>';
    }
}