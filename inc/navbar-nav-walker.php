<?php

class Navbar_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="navbar__sub-menu">';
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $has_children = !empty($args->walker->has_children);
        if ($depth == 0 && $has_children) {
            $output .= '<li id="menu-item-'. $item->ID . '" class="' . implode(' ', $item->classes) . ' navbar__li">';
            $output .= '<a href="' . $item->url . '"class="navbar__link parent">' . $item->title . '</a>';
            $output .= '<span id="navbar__li-arrow"class="navbar__arrow arrow"></span>';
        } else {
            $output .= '<li id="menu-item-'. $item->ID . '" class="' . implode(' ', $item->classes) . ' navbar__li">';
            $output .= '<a href="' . $item->url . '" class="navbar__link"">' . $item->title . '</a>';
        }
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}
