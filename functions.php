<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 */

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/StarterSite.php';

Timber\Timber::init();

// Sets the directories (inside your theme) to find .twig files.
Timber::$dirname = [ 'templates', 'views' ];

new StarterSite();

function mytheme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'mytheme' ),
        'id'            => 'footer-column-1',
        'description'   => __( 'Widgets in this area will be shown in the first column of the footer.', 'mytheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'mytheme' ),
        'id'            => 'footer-column-2',
        'description'   => __( 'Widgets in this area will be shown in the second column of the footer.', 'mytheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 3', 'mytheme' ),
        'id'            => 'footer-column-3',
        'description'   => __( 'Widgets in this area will be shown in the third column of the footer.', 'mytheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'mytheme_widgets_init' );

add_filter('timber/context', 'add_to_context');

function add_to_context($context) {
    $context['footer_column_1'] = Timber::get_widgets('footer-column-1');
    $context['footer_column_2'] = Timber::get_widgets('footer-column-2');
    $context['footer_column_3'] = Timber::get_widgets('footer-column-3');
    return $context;
}


