jQuery(document).ready(function($) {

    $('#link-options').append(`<div style="margin-top:4px"> 
    <label><span>Link Class</span>
            <select style="width:70%" name="wpse-link-class" id="wpse_link_class">
                <option value="">None</option>
                <option value="btn btn-white">White Button</option>
                <option value="btn btn-blue">Blue Button</option>
        </select>
        </label>
    </div>`);
    $('body .wp-core-ui .wp-link #link-selector #search-panel #search-results').css('top', '250px')
    $('#wp-link .query-results').css('top', '250px')
    if (typeof wpLink !== 'undefined') {
        wpLink.getAttrs = function() {
            wpLink.correctURL();        
            return {
                class:      $( '#wpse_link_class' ).val(),
                href:       $.trim( $( '#wp-link-url' ).val() ),
                target:     $( '#wp-link-target' ).prop( 'checked' ) ? '_blank' : ''
            };
        }
    }

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