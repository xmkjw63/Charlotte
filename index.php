<?php

/**
 * 首页模板
 * @author Xmkjw63 <xmwlws@gmail.com>
 * @license GPL-3.0 License
 * @version 2022.01.26
 */
get_header(); ?>
<div class="k-main <?php echo Charlotte_option('top_img_switch', true) ? 'banner' : 'color' ?>" style="background:<?php echo Charlotte_option('g_background', '#f5f5f5'); ?>">
    <div class="container mainpjax">
        <div class="loading-bar">
            <div class="progress"></div>
        </div>
        <div class="row">
            <div class="col-lg-8 board">
                <?php if (is_home() && Charlotte_option('g_carousel', false)) {
                    Charlotte_carousel();
                }
                if (is_search()) { ?>
                    <div class="article-panel">
                        <div class="search-title"><?php _e('搜索内容：', 'Charlotte');
                                                    the_search_query(); ?></div>
                    </div>
                <?php }
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('/pages/page-content', get_post_format());
                    }
                } else { ?>
                    <div class="article-panel">
                        <div class="nothing">
                            <img src="<?php echo Charlotte_option('g_nothing', ASSET_PATH . '/assets/img/nothing.svg'); ?>">
                            <div class="sorry"><?php _e('很抱歉，没有找到任何内容', 'Charlotte'); ?></div>
                        </div>
                    </div>
                <?php }
                pagelist();
                wp_reset_query(); ?>
            </div>
            <div class="col-lg-4 sidebar sticky-sidebar d-none d-lg-block">
                <?php dynamic_sidebar('home_sidebar'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
