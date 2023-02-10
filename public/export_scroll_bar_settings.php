<?php

function scrollbarsettings () {
    
    $nt_scrollbar_thumb_color = get_option( 'nt_scrollbar_thumb_color', 'black' );
    $nt_scrollbar_thumb_hover_color = get_option( 'nt_scrollbar_thumb_hover_color', '#5a5a5a' );
    $nt_scrollbar_track_color = get_option( 'nt_scrollbar_track_color', '#101010' );
    $nt_scrollbar_width = get_option( 'nt_scrollbar_width', '15' );
    $nt_scroll_border_radius = get_option( 'nt_scroll_border_radius', '5' );
    
    return "
        /*Start Scrollbar Habit by Ntamas*/

        ::-webkit-scrollbar {
          width: ".$nt_scrollbar_width."px;
        }
        ::-webkit-scrollbar-track {
          background: $nt_scrollbar_track_color;
        }
        ::-webkit-scrollbar-thumb {
          background: $nt_scrollbar_thumb_color; 
          border-radius: ".$nt_scroll_border_radius."px;
        }
        ::-webkit-scrollbar-thumb:hover {
          background: $nt_scrollbar_thumb_hover_color;
        }
        /* End Scrollbar Habit by Ntamas*/
    ";
}

function add_my_style_to_front_end () {
    echo '<style type="text/css">';
    echo scrollbarsettings();
    echo '</style>';
}
