<?php

/**
 * Helpers
 *
 * @package Wordpress
 * @subpackage Tavalor
 * @since 1.0
 *
 */

/**
 * Get correct link function
 *
 * @param $link
 * @return string
 */
function get_correct_link($link = '') {
    preg_match( '/^(http|https):\\/\\//', $link, $matches);

    if ( ! $matches)
        $link = 'http://' . $link;

    if (filter_var($link, FILTER_VALIDATE_URL))
        return $link;

    return '';
}

/**
 * Get template part in variable
 *
 * @param $template_name
 * @param null $part_name
 * @return string
 */
function load_template_part($template_name, $part_name=null) {
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}

/**
 * Convert hexdec color string to rgb(a) string
 *
 * @param string      $color
 * @param bool|number $opacity
 * @return string
 */
function hex2rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity !== false){
        if (abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}

/**
 * Get svg images
 *
 * @param int $count
 * @param int $delay
 */
function repeater_svg($count = 0, $image_path, $height, $width, $class, $delay = 1) {
  if (!$count) {
    return;
  }

  $html = '';
  for ($i = 0; $i < $count; $i++) {
    $current_delay = $delay * $i;
    $html .= '<image xlink:href="' . get_template_directory_uri() . '/resources/assets/images/' . $image_path . '"
                     x="0" y="0" 
                     height="' . $height . '" 
                     width="' . $width . '" 
                     class="' . $class . '" 
                     style="animation-delay: ' . $current_delay . 's"/>';
  }

  return $html;
}
