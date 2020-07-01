<?php

/**
 * Plugin Name: My Works
 * Autor: jnfDev
 * Version: 1.0.0
 * Text Domain: jnf_myworks
 */

define( 'JNF_WORKS_PATH', plugin_dir_path( __FILE__ ) );
define( 'JNF_WORKS_URL', plugin_dir_url( __FILE__ ) );

require JNF_WORKS_PATH . 'includes/utils.php';

function jnf_myworks_scripts() {
    wp_enqueue_style('jnf_main', JNF_WORKS_URL . 'public/css/main.css' );
}

add_action('wp_enqueue_scripts', 'jnf_myworks_scripts');

function jnf_myworks_cpt() {
    register_post_type('jnf_works', array(
        'labels' => array(
            'name' => __('Works', 'jnf_myworks'),
            'singular_name' => __('Work', 'jnf_myworks')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'works'
        ),
        'supports' => array('editor', 'thumbnail')
    ));
}

add_action('init', 'jnf_myworks_cpt');

function jnf_myworks_shortcode($attr = [], $content = null) {

    $args = array(
        'post_type' => 'jnf_works',
        'posts_per_page' => 10
    );

    $query = new WP_Query($args);
    $content = '';

    if (isset($query->posts) && is_array($query->posts)) {
        $content .= '<div id="my-works">';
        $content .= '<ul>';
        foreach($query->posts as $post) {
            $content .= '<li class="work">';
            $content .= jnf_get_work_img($post->ID, $post->post_title);
            $content .= '<div class="content">';
            $content .= wp_strip_all_tags($post->post_content, true);
            $content .= '</div>';
            $content .= '</li>';
        }

        $content .= '</ul>';
        $content .= '</div>';
    }

    return $content;
}

add_shortcode('jnf_myworks', 'jnf_myworks_shortcode');

