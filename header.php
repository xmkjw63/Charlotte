<?php /** * 主题页眉 * @author Xmkjw63 <xmwlws@gmail.com>* @license GPL-3.0 License * @version 2022.05.27 */ ?>
  <!DOCTYPE html>
  <html lang="zh-cn">
    
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>
        <?php wp_title( '-', true, 'right'); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="format-detection" content="telphone=no, email=no">
      <meta name="keywords" content="<?php echo keywords(); ?>">
      <meta name="description" itemprop="description" content="<?php echo description(); ?>">
      <meta name="theme-color" content="<?php echo Charlotte_option('g_chrome', '#282a2c'); ?>">
      <meta itemprop="image" content="<?php echo share_thumbnail_url(); ?>" />
      <?php if (Charlotte_option( 'g_icon')) { echo '<link rel="shortcut icon" href="' . Charlotte_option( "g_icon") . '">'; } wp_head(); wp_print_scripts( 'jquery'); mourning(); if (Charlotte_option( 'seo_statistical')) { echo Charlotte_option( 'seo_statistical'); } ?>
        <script src="https://cdn.bootcdn.net/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/smooth-scrolling.js@1.0.0">
        </script>
        <link href='https://cdn.bootcdn.net/ajax/libs/nprogress/0.2.0/nprogress.min.css' rel='stylesheet' />
        <script src='https://cdn.bootcdn.net/ajax/libs/nprogress/0.2.0/nprogress.min.js'>
        </script>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.5.1/build/styles/default.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pangu/4.0.7/pangu.min.js">
        </script>
        <script>pangu.spacingPage();</script>
        <?php if(Charlotte_option( 'g_live2d')){ echo( "<script src='https://fastly.jsdelivr.net/gh/stevenjoezhang/live2d-widget@latest/autoload.js'></script>"); }?>
          <div class=".pjax-reload">
            <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.5.1/build/highlight.min.js">
            </script>
          </div>
    </head>
    <?php flush(); ?>
      
      <body>
        <div class="k-header">
          <nav class="k-nav navbar navbar-expand-lg navbar-light fixed-top" <?php echo Charlotte_option( 'top_img_switch', true) ? '' : 'style="background:' . Charlotte_option( 'top_color', '#24292e') . '"'; ?>>
            <div class="container">
              <a class="navbar-brand" href="<?php echo get_option('home'); ?>">
                <?php if (Charlotte_option( 'g_logo')) { echo '<img src="' . Charlotte_option( 'g_logo') . '"><h1 style="display:none">' . get_bloginfo( 'name') . '</h1>'; } else { echo '<h1>' . get_bloginfo( 'name') . '</h1>'; } ?></a>
              <?php if (has_nav_menu( 'header_menu')) { ?>
                <button class="navbar-toggler navbar-toggler-right" id="navbutton" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="line first-line">
                  </span>
                  <span class="line second-line">
                  </span>
                  <span class="line third-line">
                  </span>
                </button>
                <?php } if (has_nav_menu( 'header_menu')) { wp_nav_menu(array( 'theme_location'=>'header_menu', 'depth' => 2, 'container' => 'div', 'container_class' => 'collapse navbar-collapse', 'container_id' => 'navbarResponsive', 'menu_class' => 'navbar-nav ml-auto', 'walker' => new WP_Bootstrap_Navwalker(), )); } ?></div>
          </nav>
          <?php if (Charlotte_option( 'top_img_switch', true)) { ?>
            <div class="banner">
              <div class="overlay">
              </div>
              <div class="content text-center" style="background-image: url(http://api.x-xh.cn/xjg/z.php);filter: background-blur(6px);">
                <div class="introduce animate__animated animate__fadeInUp">
                  <?php if (is_category() || is_tag()) { echo '<div class="title bigtitle">' . single_cat_title( '', false) . '</div>'; echo '<div class="mate">' . strip_tags(category_description()) . '</div>'; } else { echo '<div class="title bigtitle">' . Charlotte_option( 'top_title', 'Charlotte') . '</div>'; echo '<div class="mate">' . Charlotte_option( 'top_describe', __( '一款专注于用户阅读体验的响应式博客主题', 'Charlotte')) . '</div>'; } ?>
                </div>
              </div>
            </div>
            <?php } ?>
        </div>
        <script>$(document).ready(function() {
            initAutoType();

          });

          var initAutoType = function() {
            var types = ["a Blog.", "Not Just a Blog.", "Charlotte"];
            var words = $(".bigtitle");

            var stopType = false;
            var index = 0;
            var tempWords = "";
            var isNext = false;
            var time = 300;

            var startType = setInterval(function() {
              if (stopType) {
                clearInterval(startType);
              }
              if (tempWords.length === 0) {
                if (isNext) {
                  index++;
                  index = index % 3;
                  isNext = false;
                }
                tempWords = types[index].substring(0, tempWords.length + 1);
              } else if (tempWords.length === types[index].length && isNext === false) {
                // tempWords = tempWords.substring(0,tempWords.length-1);
                isNext = true;
                time = 5000;
              } else {
                if (isNext) {
                  tempWords = tempWords.substring(0, tempWords.length - 1);
                  time = 150;
                } else {
                  time = 200;
                  tempWords = types[index].substring(0, tempWords.length + 1);
                }
              }
              words.html("&nbsp;" + tempWords);
            },
            time);
          };</script>