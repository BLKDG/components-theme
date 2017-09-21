<?php 
// init process for registering our button
 add_action('init', 'components_theme_shortcode_button_init');
 function components_theme_shortcode_button_init() {

      //Abort early if the user will never see TinyMCE
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;

      //Add a callback to regiser our tinymce plugin   
      add_filter("mce_external_plugins", "components_theme_register_tinymce_plugin"); 

      // Add a callback to add our button to the TinyMCE toolbar
      add_filter('mce_buttons', 'components_theme_add_tinymce_button');
}


//This callback registers our plug-in
function components_theme_register_tinymce_plugin($plugin_array) {
    $plugin_array['components_theme_button'] = get_template_directory_uri().'/assets/admin/admin.js';
    return $plugin_array;
}

function components_theme_add_tinymce_button($buttons) {
            //Add the button ID to the $button array
    $buttons[] = "components_theme_button";
    return $buttons;
}

function components_theme_button_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'url'    => '',
        'text'   => '',
        'target' => ''
    ), $atts );

    return '<a href="'.$a['url'].'" target="'.$a['target'].'" class="btn">'.$a['text'].'</a>';
}
add_shortcode( 'button', 'components_theme_button_shortcode' );