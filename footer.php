<?php /** * 主题页脚 * @author Xmkjw63 <xmwlws@gmail.com>* @license GPL-3.0 License * @version 2022.05.27 */ ?>
  <div class="k-footer">
    <div class="f-toolbox">
      <div class="gotop <?php echo Charlotte_option('g_wechat_fieldset')['g_wechat'] ? 'gotop-haswechat' : ''; ?>">
        <div class="gotop-btn">
          <span class="kicon i-up"></span>
        </div>
      </div>
      <?php if (!empty(Charlotte_option( 'g_wechat_fieldset')[ 'g_wechat'])) { ?>
        <div class="wechat">
          <span class="kicon i-wechat">
          </span>
          <div class="wechat-pic">
            <img src="<?php echo Charlotte_option('g_wechat_fieldset')['g_wechat_img']; ?>">
          </div>
        </div>
        <?php } ?>
          <div class="search">
            <span class="kicon i-find">
            </span>
            <form class="search-form" role="search" method="get" action="<?php echo home_url('/'); ?>">
              <input type="text" name="s" id="search-footer" placeholder="<?php _e('搜点什么呢?', 'Charlotte'); ?>" style="display:none" />
            </form>
          </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <p class="social">
            <?php if (!empty(Charlotte_option( 's_social_fieldset'))) { foreach (Charlotte_option( 's_social_fieldset') as $key=>$value) { if (Charlotte_option('s_social_fieldset')[$key]) { echo '
              <a target="_blank" rel="nofollow" href="' . Charlotte_option('s_social_fieldset')[$key] . '">
                <i class="kicon i-' . str_replace(array(" s_ ", "_url "), array('', ''), $key) . '"></i>
              </a>'; } } } ?></p>
          <?php echo '<p>' . Charlotte_option( 's_copyright', 'COPYRIGHT © ' . wp_date( 'Y') . ' ' . get_bloginfo( 'name') . '. ALL RIGHTS RESERVED.') . '</p>'; echo '<p>Theme <a href="https://github.com/seatonjiang/Charlotte" target="_blank" rel="nofollow">Charlotte</a> Made By <a href="https://seatonjiang.com" target="_blank" rel="nofollow">Xmkjw63</a></p>'; if (Charlotte_option( 's_icp')) { echo '<p><a href="https://beian.miit.gov.cn/" target="_blank" rel="nofollow">' . Charlotte_option( 's_icp') . '</a></p>'; } if (Charlotte_option( 's_gov')) { echo '<p><a href="' . Charlotte_option( 's_gov_link') . '" target="_blank" rel="nofollow" ><i class="police-ico"></i>' . Charlotte_option( 's_gov') . '</a></p>'; } ?>
        </div>
      </div>
    </div>
  </div>
  <?php wp_footer(); ?>
    <script>$(document).pjax('a[target!=_blank]', '.mainpjax', {
        fragment: '.mainpjax',
        timeout: 8000
      });
      $("script[data-pjax], .pjax-reload script").each(function() {
        $(this).parent().append($(this).remove());
      });
      $(document).on('pjax:start',
      function(event) {
        NProgress.start();
      });
      $(document).on('pjax:end',
      function(event) {
        NProgress.done();
      });</script>
    </body>
    
    </html>