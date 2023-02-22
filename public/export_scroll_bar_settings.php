<?php

function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}

function scrollbarsettings () {
    
    $nt_scrollbar_thumb_color = get_option( 'nt_scrollbar_thumb_color', 'black' );
    $nt_scrollbar_thumb_hover_color = get_option( 'nt_scrollbar_thumb_hover_color', '#5a5a5a' );
    $nt_scrollbar_width = get_option( 'nt_scrollbar_width', '15' );
    $nt_scroll_border_radius = get_option( 'nt_scroll_border_radius', '5' );
    $nt_scrollbar_track_background = hex2RGB(get_option( 'nt_scrollbar_track_color', '#101010' ), 'true');
    $nt_scrollbar_track_opacity=get_option( 'nt_scrollbar_track_opacity', '1' );
    
    return "
        html,body
        {
        	overflow:overlay;
        }
    
        /*Start Scrollbar Habit by Ntamas*/
        
        ::-webkit-scrollbar {
          width: ".$nt_scrollbar_width."px;
        }
        ::-webkit-scrollbar-track {
          background: rgba($nt_scrollbar_track_background,".$nt_scrollbar_track_opacity.");
        }
        ::-webkit-scrollbar-thumb {
          background: $nt_scrollbar_thumb_color; 
          border-radius: ".$nt_scroll_border_radius."px;
        }
        ::-webkit-scrollbar-thumb:hover {
          background: $nt_scrollbar_thumb_hover_color;
        }
        /* End Scrollbar Habit by Ntamas*/
        
        #wpadminbar {
            padding-right: ".$nt_scrollbar_width."px;
        }
    ";
}

function add_my_style_to_front_end () {
    echo '<style type="text/css">';
    echo scrollbarsettings();
    echo '</style>';
}
