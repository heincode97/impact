<?php global $THEME_OPTIONS; ?>
<!doctype html>
<!--[if lt IE 7 ]>	<html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>		<html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>		<html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>		<html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en" class="no-js">
<!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <title>
    <?php wp_title(''); ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <?php if (file_exists(TEMPLATEPATH . '/favicon.png')): ?>
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
  <?php endif; ?>
  <!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
  <?php wp_head(); ?>
</head>
<?php $body_classes = join(' ', get_body_class()); ?>

<body class="<?php if (!is_search())
    echo $body_classes; ?>">
 <?php
$info = get_fields('option');
$logo = $info['general_setting']['logo'] ?? '';
$logo_title  = $info['general_setting']['logo_title'] ?? '';
?>


<header class="site-header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">

            <!-- Logo + Text -->
            <div class="site-brand d-flex align-items-center">
                <a href="<?php echo home_url('/'); ?>" class="logo-link d-flex align-items-center">

                    <?php if (!empty($logo)) : ?>
                        <img src="<?php echo esc_url($logo); ?>" class="site-logo" alt="Logo">
                    <?php endif; ?>

                    <div class="site-text">
                        <p class="mb-0"><?php echo esc_html($logo_title); ?></p>
                    </div>

                </a>
            </div>

            <!-- Menu -->
            <div class="primary-menu">
                <div class="stellarnav" id="main-nav">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'main',
                        'container'      => false,
                        'menu_class'     => 'nav-menu',
                    ]);
                    ?>
                </div>
            </div>

        </div>
    </div>
</header>
  

  <?php if (!is_404() && !is_search() && !is_page(16) && !is_front_page()) { ?>
    <?php get_template_part("templates/global/breadcrumb"); ?> 
  <?php } ?>