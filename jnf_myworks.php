<?php

/**
 * Plugin Name: My Works
 * Autor: jnfDev
 * Version: 1.0.0
 * Text Domain: jnf_myworks
 */

function jnf_register_cpt() {
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

add_action('init', 'jnf_register_cpt');