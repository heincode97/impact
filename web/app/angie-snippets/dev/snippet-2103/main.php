<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

const INTERACTIVE_ACCORDION_ASSETS_VERSION_a1080bc6 = '1.0.1';

function register_interactive_accordion_widget_a1080bc6( $widgets_manager ) {
    require_once __DIR__ . '/widget-interactive-accordion.php';
    $widgets_manager->register( new \AngieSnippets\Interactive_Accordion_a1080bc6() );
}
add_action( 'elementor/widgets/register', 'register_interactive_accordion_widget_a1080bc6' );

function register_interactive_accordion_assets_a1080bc6() {
    wp_register_script( 'interactive-accordion-script-a1080bc6', angie_cs_get_snippet_asset_url( __FILE__, 'script.js' ), [ 'elementor-frontend' ], INTERACTIVE_ACCORDION_ASSETS_VERSION_a1080bc6, true );
    wp_register_style( 'interactive-accordion-style-a1080bc6', angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), [], INTERACTIVE_ACCORDION_ASSETS_VERSION_a1080bc6 );
}
add_action( 'wp_enqueue_scripts', 'register_interactive_accordion_assets_a1080bc6' );
