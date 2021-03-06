<?php

/**
 * Initialize the custom Meta Boxes. 
 */
add_action('admin_init', 'lovely_post_options');

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in theme-options.php.
 *
 * @return    void
 * @since     2.3.0
 */
function lovely_post_options() {

    /**
     * Create a custom meta boxes array that we pass to 
     * the OptionTree Meta Box API Class.
     */
    $single_layout = array(
        array(
            'value' => '',
            'label' => esc_html__('Default', 'lovely'),
            'src' => THEME_DIR . '/assets/img/slider_ot_option.png'
        ),
        array(
            'value' => 'with-sidebar',
            'label' => esc_html__('With sidebar', 'lovely'),
            'src' => THEME_DIR . '/assets/img/content_1.png'
        ),
        array(
            'value' => 'simple',
            'label' => esc_html__('Without Sidebar', 'lovely'),
            'src' => THEME_DIR . '/assets/img/content_2.png'
        ),
        array(
            'value' => 'full-width',
            'label' => esc_html__('Full Width', 'lovely'),
            'src' => THEME_DIR . '/assets/img/content_3.png'
        )
    );
    $my_meta_box = array(
        'id' => 'page_options',
        'title' => esc_html__('Post options', 'lovely'),
        'desc' => '',
        'pages' => array('post'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => esc_html__('General', 'lovely'),
                'id' => 'general',
                'type' => 'tab'
            ),
            array(
                'id' => 'single_layout',
                'label' => esc_html__('Single post layout', 'lovely'),
                'desc' => esc_html__('Change the Single Post Layout Style. You can change all Post Layout Styles on Theme Options.', 'lovely'),
                'std' => '',
                'type' => 'radio-image',
                'choices' => $single_layout,
                'section' => 'general'
            ),
            array(
                'label' => esc_html__('Gallery', 'lovely'),
                'id' => 'gallery',
                'type' => 'tab'
            ),
            array(
                'label' => esc_html__('Gallery', 'lovely'),
                'id' => 'gallery_images',
                'type' => 'gallery',
                'desc' => esc_html__('Note: This option will work only you have chosen POST FORMAT -> GALLERY', 'lovely'),
            ),
            array(
                'label' => esc_html__('Video', 'lovely'),
                'id' => 'video',
                'type' => 'tab'
            ),
            array(
                'label' => esc_html__('Video embed code', 'lovely'),
                'id' => 'video_embed',
                'type' => 'textarea',
                'desc' => esc_html__('Note: This option will work only you have chosen POST FORMAT -> VIDEO', 'lovely')
            ),
            array(
                'label' => esc_html__('Audio', 'lovely'),
                'id' => 'audio',
                'type' => 'tab'
            ),
            array(
                'label' => esc_html__('MP3 File URL', 'lovely'),
                'id' => 'audio_mp3',
                'type' => 'text',
                'desc' => esc_html__('Insert Self Hosted .mp3, audio file URL. Note: This option will work only you have chosen POST FORMAT -> AUDIO', 'lovely' ),
            ),
            array(
                'label' => esc_html__('Embeded Code', 'lovely'),
                'id' => 'audio_embed',
                'type' => 'textarea',
                'desc' => esc_html__('Insert Youtube or Vimeo etc Embed Code only. Note: This option will work only you have chosen POST FORMAT -> AUDIO', 'lovely')
            ),
        )
    );

    /**
     * Register our meta boxes using the 
     * ot_register_meta_box() function.
     */
    if (function_exists('ot_register_meta_box'))
        ot_register_meta_box($my_meta_box);
}
