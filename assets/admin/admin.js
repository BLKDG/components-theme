jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.components_theme_plugin', {
        init : function(ed, url) {
                // Register command for when button is clicked
                ed.addCommand('components_theme_insert_shortcode', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();

                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
                        content =  '[button url="" text="'+selected+'" target=""]';
                    }else{
                        content =  '[button url="" text="" target=""]';
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });

            // Register buttons - trigger above command when clicked
            ed.addButton('components_theme_button', {title : 'Insert Button', cmd : 'components_theme_insert_shortcode', image: '/wp-content/themes/pipeline/assets/images/highlight.svg' });
        },   
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('components_theme_button', tinymce.plugins.components_theme_plugin);
});