<?php

class scrollbarCreation{
    
    function __construct() {
        add_action('admin_menu', array($this,'adminPage'));
        add_action('admin_init', array($this, 'settings'));
    }
    
    function settings(){
        add_settings_section('nt_first_section','Scrollbar Colors',null,'scrollbar-settings-page'); // id, title, display cb, page
        add_settings_section('nt_second_section','Scrollbar Width & Radius',null,'scrollbar-settings-page'); // id, title, display cb, page
        
        add_settings_field('nt_scrollbar_track_color', 'Scrollbar Track', array($this, 'scrollbar_track_color_HTML'), 'scrollbar-settings-page', 'nt_first_section'); // id, title, display cb, page, section
        register_setting('scrollbaroptions', 'nt_scrollbar_track_color'); // option group, option name, sanitize cb
        
        add_settings_field('nt_scrollbar_track_opacity', 'Scrollbar Track Opacity', array($this, 'nt_scrollbar_track_opacity_HTML'), 'scrollbar-settings-page', 'nt_first_section'); // id, title, display cb, page, section
        register_setting('scrollbaroptions', 'nt_scrollbar_track_opacity'); // option group, option name, sanitize cb
        
        add_settings_field('nt_scrollbar_thumb_color', 'Scrollbar Thumb', array($this, 'scrollbar_thumb_color_HTML'), 'scrollbar-settings-page', 'nt_first_section'); // id, title, display cb, page, section
        register_setting('scrollbaroptions', 'nt_scrollbar_thumb_color'); // option group, option name, sanitize cb
        
        add_settings_field('nt_scrollbar_thumb_hover_color', 'Scrollbar Thumb Hover', array($this, 'scroll_bar_hover_color_HTML'), 'scrollbar-settings-page', 'nt_first_section'); // id, title, display cb, page, section
        register_setting('scrollbaroptions', 'nt_scrollbar_thumb_hover_color'); // option group, option name, sanitize cb
        
        add_settings_field('nt_scrollbar_width', 'Scrollbar Width', array($this, 'scroll_width_HTML'), 'scrollbar-settings-page', 'nt_second_section'); // id, title, display cb, page, section
        register_setting('scrollbaroptions', 'nt_scrollbar_width'); // option group, option name, sanitize cb
        
        add_settings_field('nt_scroll_border_radius', 'Scrollbar Radius', array($this, 'scroll_border_radius_HTML'), 'scrollbar-settings-page', 'nt_second_section'); // id, title, display cb, page, section
        register_setting('scrollbaroptions', 'nt_scroll_border_radius'); // option group, option name, sanitize cb
    }
    
    function scrollbar_track_color_HTML(){
        ?>
        <label for="nt_scrollbar_track_color">Choose Any Color:</label>
        <input type="color" name="nt_scrollbar_track_color"  id="nt_scrollbar_track_color" value="<?php echo get_option('nt_scrollbar_track_color','#101010') ?>">
        <?php
    }
    
    function nt_scrollbar_track_opacity_HTML(){
        ?>
        <label for="nt_scrollbar_track_opacity">Choose Any Number:</label>
        <input type="number" name="nt_scrollbar_track_opacity"  id="nt_scrollbar_track_opacity" min="0" step="0.1" max="1" value="<?php echo get_option('nt_scrollbar_track_opacity','1') ?>"><span> (min=0, max=1)</span>
        <?php
    }
    
    function scrollbar_thumb_color_HTML(){
        ?>
        <label for="nt_scrollbar_thumb_color">Choose Any Color:</label>
        <input type="color" name="nt_scrollbar_thumb_color"  id="nt_scrollbar_thumb_color" value="<?php echo get_option('nt_scrollbar_thumb_color','black') ?>">
        <?php
    }
    
    function scroll_bar_hover_color_HTML(){
        ?>
        <label for="nt_scrollbar_thumb_hover_color">Choose Any Color:</label>
        <input type="color" name="nt_scrollbar_thumb_hover_color"  id="nt_scrollbar_thumb_hover_color" value="<?php echo get_option('nt_scrollbar_thumb_hover_color','#5a5a5a') ?>">
        <?php
    }
    
    function scroll_width_HTML(){
        ?>
        <label for="nt_scrollbar_width">Choose Width:</label>
        <input type="number" id="nt_scrollbar_width" name="nt_scrollbar_width" min="10" max="25" value="<?php echo get_option('nt_scrollbar_width','15') ?>"><span> (min=10, max=25)</span>
        <?php
    }
    
    function scroll_border_radius_HTML(){
        ?>
        <label for="nt_scroll_border_radius">Choose Radius:</label>
        <input type="number" id="nt_scroll_border_radius" name="nt_scroll_border_radius" min="0" max="10" value="<?php echo get_option('nt_scroll_border_radius','5') ?>"><span> (min=0, max=10)</span>
        <?php
    }
    
    
    function adminPage(){
        add_options_page('Scroll Bar Settings', 'Scroll Bar Settings', 'manage_options','scrollbar-settings-page',array($this,'ourHTML'));
    }
    
    function ourHTML(){
        ?> 
        <div class="wrap">
            <div class="ntTopBar">
                <div class="ntTopBar_left">
                    <h3 class="nt_plugin_name">Ntamas Plugins</h3>
                </div>
                <div class="ntTopBar_right">
                    <div><a href="https://www.facebook.com/ntamas.manolis"><i class="fa-brands fa-facebook-f"></i></a></div>
                    <div><a href="https://github.com/ntamasM"><i class="fa-brands fa-github"></i></a></div>
                </div>
            </div>
            <div class="ntBody">
                <h1></h1>
                <form action="options.php" method="POST">
                    <?php
                        settings_fields('scrollbaroptions');
                        do_settings_sections('scrollbar-settings-page');
                        submit_button();
                    ?>
                </form>
            </div>
        </div>
        
        <?php
    }
}

