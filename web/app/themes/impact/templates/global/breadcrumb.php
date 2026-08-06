<div class="banner-section pd-xl">

    <?php
    $banner_image  = get_field('banner_image', get_the_ID());
    $default_image = ASSET_URL . 'images/banner-image.png';

    $object = get_queried_object();

    if (is_single() && get_post_type() === 'post') {

        $title = 'Insights';

    } elseif (is_page()) {

        global $post;

        if ($post->post_parent) {
            $title = get_the_title($post->post_parent); // Parent Page Title
        } else {
            $title = get_the_title();
        }

    } elseif (is_singular()) {

        $title = get_the_title();

    } elseif (is_home()) {

        $title = 'Insights';

    } elseif (is_post_type_archive()) {

        $title = $object->label ?? '';

    } elseif (is_tax() || is_category() || is_tag()) {

        $title = $object->name ?? '';

    } else {

        $title = get_bloginfo('name');

    }

    $image_url = !empty($banner_image) ? $banner_image : $default_image;
    ?>

    <div class="banner-image">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
    </div>

    <div class="container">
        <div class="banner-content">

            <h2><?php echo esc_html($title); ?></h2>

            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb(
                    '<div id="breadcrumbs">',
                    '</div>'
                );
            }
            ?>

        </div>
    </div>

</div>