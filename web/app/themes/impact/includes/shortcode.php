<?php
add_shortcode('cta_button', 'dd_cta_button');

function dd_cta_button($atts) {

    $attributes = shortcode_atts(
        array(
            'text'   => 'Click Here',
            'link'   => '#',
            'target' => '_self',
            'size'   => 'medium',
            'name'   => 'primary'
        ),
        $atts
    );

    // Sanitize
    $text   = esc_html($attributes['text']);
    $link   = esc_url($attributes['link']);
    $target = esc_attr($attributes['target']);
    $size   = esc_attr($attributes['size']);
    $name   = esc_attr($attributes['name']);

    // Button Classes
    $classes = array(
        'button',
        'button--' . $size,
        'button--' . $name,
    );

    ob_start();
    ?>

    <a href="<?php echo $link; ?>"
       target="<?php echo $target; ?>"
       class="<?php echo implode(' ', $classes); ?>">

        <span><?php echo $text; ?></span>

    </a>

    <?php
    return ob_get_clean();
}

function hero_slider_shortcode($atts) {

    $atts = shortcode_atts([
        'title' => '',
        'btn_text' => 'Click Here'
    ], $atts);

    ob_start();

    $title = $atts['title'];

    include get_template_directory() . '/partials/hero-slider.php';

    return ob_get_clean();
}

// add_shortcode('hero_slider', 'hero_slider_shortcode');
// ?>