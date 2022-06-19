<?php

/**
 * 主题选项
 * @author Xmkjw63 <xmwlws@gmail.com>
 * @license GPL-3.0 License
 * @version 2022.04.30
 */

defined('ABSPATH') || exit;

$prefix = 'Charlotte_options';

if (!function_exists('Charlotte_option')) {
    function Charlotte_option($name, $default = false)
    {

        $options = get_option('Charlotte_options');

        if (isset($options[$name])) {
            return $options[$name];
        }

        return $default;
    }
}

function getrobots()
{
    $site_url = parse_url(site_url());
    $web_url = get_bloginfo('url');
    $path = (!empty($site_url['path'])) ? $site_url['path'] : '';

    $robots = "User-agent: *\n\n";
    $robots .= "Disallow: $path/wp-admin/\n";
    $robots .= "Disallow: $path/wp-includes/\n";
    $robots .= "Disallow: $path/wp-content/plugins/\n";
    $robots .= "Disallow: $path/wp-content/themes/\n\n";
    $robots .= "Sitemap: $web_url/wp-sitemap.xml\n";

    return $robots;
}

CSF::createOptions($prefix, array(
    'menu_title' => __('主题设置', 'Charlotte'),
    'menu_slug' => 'Charlotte-options',
    'show_search' => false,
    'show_all_options' => false,
    'sticky_header' => false,
    'admin_bar_menu_icon' => 'dashicons-admin-generic',
    'framework_title' => '主题设置<small style="margin-left:10px">Charlotte v' . THEME_VERSION . '</small>',
    'theme' => 'light',
    'footer_credit' => '感谢使用 <a target="_blank" href="https://github.com/seatonjiang/Charlotte">Charlotte</a> 主题开始创作，欢迎加入交流群：<a target="_blank" href="https://qm.qq.com/cgi-bin/qm/qr?k=IG7qPkDLU2cyyp4xZiNfvr3V_4_UADkh&jump_from=webapi">51880737</a>',
));

CSF::createSection($prefix, array(
    'id' => 'global_fields',
    'title' => __('全站配置', 'Charlotte'),
    'icon' => 'fas fa-rocket',
));

CSF::createSection($prefix, array(
    'parent' => 'global_fields',
    'title' => __('功能配置', 'Charlotte'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'g_adminbar',
            'type' => 'switcher',
            'title' => __('前台管理员导航', 'Charlotte'),
            'subtitle' => __('启用/禁用前台管理员导航', 'Charlotte'),
            'default' => true,
        ),
        array(
            'id' => 'g_login',
            'type' => 'switcher',
            'title' => __('侧边栏后台入口', 'Charlotte'),
            'subtitle' => __('启用/禁用个人简介头像进入后台功能', 'Charlotte'),
            'default' => true,
        ),
        array(
            'id' => 'g_sticky',
            'type' => 'switcher',
            'title' => __('侧边栏随动', 'Charlotte'),
            'subtitle' => __('启用/禁用小工具侧边栏随动功能', 'Charlotte'),
            'default' => false,
        ),
        array(
            'id' => 'g_search',
            'type' => 'switcher',
            'title' => __('搜索增强', 'Charlotte'),
            'subtitle' => __('启用/禁用仅搜索文章标题', 'Charlotte'),
            'default' => false,
        ),
        array(
            'id' => 'g_thumbnail',
            'type' => 'switcher',
            'title' => __('特色图片', 'Charlotte'),
            'subtitle' => __('启用/禁用文章特色图片', 'Charlotte'),
            'default' => true,
        ),
        array(
            'id' => 'g_rip',
            'type' => 'switcher',
            'title' => __('哀悼功能', 'Charlotte'),
            'subtitle' => __('启用/禁用站点首页黑白功能', 'Charlotte'),
            'default' => false,
        ),
        array(
            'id' => 'g_animate',
            'type' => 'switcher',
            'title' => __('CSS 动画库', 'Charlotte'),
            'subtitle' => __('启用/禁用 animate.css 效果', 'Charlotte'),
            'default' => false,
        ),
        array(
            'id' => 'g_fontawesome',
            'type' => 'switcher',
            'title' => __('Font Awesome', 'Charlotte'),
            'subtitle' => __('启用/禁用 Font Awesome Free 字体', 'Charlotte'),
            'default' => false,
        ),
        array(
            'id' => 'g_cdn',
            'type' => 'switcher',
            'title' => __('静态资源加速', 'Charlotte'),
            'subtitle' => __('启用/禁用静态资源加速', 'Charlotte'),
            'default' => true,
        ),
        array(
            'id' => 'g_renameimg',
            'type' => 'switcher',
            'title' => __('自定义图片类型的文件名', 'Charlotte'),
            'subtitle' => __('启用/禁用 图片类型的文件名改为 MD5 值', 'Charlotte'),
            'default' => false,
        ),
        array(
            'id' => 'g_removeimgsize',
            'type' => 'switcher',
            'title' => __('禁止生成缩略图', 'Charlotte'),
            'subtitle' => __('启用/禁用生成多种尺寸图片资源', 'Charlotte'),
            'default' => false,
        ),
        array(
            'id'=>"g_live2d",
            'type'=>'switcher',
            'title'=>__('Live2d看板娘功能','Charlotte'),
            'subtitle'=>__('开启/关闭Live2d看板娘功能','Charlotte'),
            'default'=>false,
            ),
        array(
            'id' => 'g_gutenberg',
            'type' => 'switcher',
            'title' => __('Gutenberg 编辑器', 'Charlotte'),
            'subtitle' => __('启用/禁用 Gutenberg 编辑器', 'Charlotte'),
            'default' => false,
        ),
        array(
            'id' => 'g_excerpt_length',
            'type' => 'text',
            'title' => __('文章简介缩略', 'Charlotte'),
            'subtitle' => __('文章简介显示的字符数量', 'Charlotte'),
            'default' => '260',
        ),
        array(
            'id' => 'g_replace_gravatar_url_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('Gravatar 加速服务', 'Charlotte'),
                ),
                array(
                    'id' => 'g_replace_gravatar_url',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Charlotte'),
                    'subtitle' => __('开启/关闭 Gravatar 加速服务功能', 'Charlotte'),
                ),
                array(
                    'id' => 'g_select_gravatar_server',
                    'type' => 'select',
                    'title' => __('Gravatar 加速服务地址', 'Charlotte'),
                    'subtitle' => __('请选择 Gravatar 加速服务地址', 'Charlotte'),
                    'options' => array(
                        'loli' => __('Loli 加速服务', 'Charlotte'),
                        'geekzu' => __('极客族加速服务', 'Charlotte'),
                        'other' => __('自定义加速服务', 'Charlotte'),
                    ),
                    'desc' => __('国内用户推荐「极客族加速服务」，海外用户推荐「Loli 加速服务」。', 'Charlotte'),
                    'dependency' => array('g_replace_gravatar_url', '==', 'true'),
                ),
                array(
                    'id' => 'g_custom_gravatar_server',
                    'type' => 'text',
                    'title' => __('自定义 Gravatar 加速服务地址', 'Charlotte'),
                    'subtitle' => __('请输入 Gravatar 加速服务地址', 'Charlotte'),
                    'desc' => __('直接输入网址即可，不需要协议头和最后的斜杠。', 'Charlotte'),
                    'placeholder' => 'secure.gravatar.com',
                    'dependency' => array('g_replace_gravatar_url|g_select_gravatar_server', '==|==', 'true|other'),
                ),
            ),
            'default' => array(
                'g_replace_gravatar_url' => 1,
                'g_select_gravatar_server' => 'geekzu',
            )
        ),
        array(
            'id' => 'g_renameother_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('附件重命名', 'Charlotte'),
                ),
                array(
                    'id' => 'g_renameother',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Charlotte'),
                    'subtitle' => __('开启/关闭附件重命名', 'Charlotte'),
                    'text_on' => __('开启', 'Charlotte'),
                    'text_off' => __('关闭', 'Charlotte'),
                ),
                array(
                    'id' => 'g_renameother_prdfix',
                    'type' => 'text',
                    'title' => __('文件前缀', 'Charlotte'),
                    'subtitle' => __('前缀与文件名之间会用 - 连接', 'Charlotte'),
                ),
                array(
                    'id' => 'g_renameother_mime',
                    'type' => 'text',
                    'title' => __('文件类型', 'Charlotte'),
                    'subtitle' => __('每个类型之间用 | 隔开', 'Charlotte'),
                ),
            ),
            'default' => array(
                'g_renameother' => false,
                'g_renameother_prdfix' => 'Charlotte',
                'g_renameother_mime' => 'tar|zip|gz|gzip|rar|7z',
            ),
        ),
        array(
            'id' => 'g_wechat_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('微信二维码', 'Charlotte'),
                ),
                array(
                    'id' => 'g_wechat',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Charlotte'),
                    'subtitle' => __('开启/关闭微信二维码', 'Charlotte'),
                    'text_on' => __('开启', 'Charlotte'),
                    'text_off' => __('关闭', 'Charlotte'),
                ),
                array(
                    'id' => 'g_wechat_img',
                    'type' => 'upload',
                    'title' =>  __('二维码图片', 'Charlotte'),
                    'library' => 'image',
                    'preview' => true,
                    'subtitle' => __('浮动显示在页面右下角', 'Charlotte'),
                ),
            ),
            'default' => array(
                'g_wechat' => false,
                'g_wechat_img' => get_template_directory_uri() . '/assets/img/200.png',
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'global_fields',
    'title' => __('颜色配置', 'Charlotte'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'g_background',
            'type' => 'color',
            'default' => '#f5f5f5',
            'title' =>  __('全站背景颜色', 'Charlotte'),
            'subtitle' => __('全站页面的背景颜色', 'Charlotte'),
        ),
        array(
            'id' => 'g_nav',
            'type' => 'color',
            'default' => '#ffffff',
            'title' =>  __('导航栏文字颜色', 'Charlotte'),
            'subtitle' => __('导航栏中站点标题以及一级导航的颜色', 'Charlotte'),
        ),
        array(
            'id' => 'g_chrome',
            'type' => 'color',
            'default' => '#282a2c',
            'title' =>  __('Chrome 导航栏颜色', 'Charlotte'),
            'subtitle' => __('移动端 Chrome 浏览器导航栏颜色', 'Charlotte'),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'global_fields',
    'title' => __('图片配置', 'Charlotte'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'g_logo',
            'type' => 'upload',
            'title' => __('站点 Logo', 'Charlotte'),
            'library' => 'image',
            'preview' => true,
            'subtitle' => __('不上传图片则显示站点标题', 'Charlotte'),
        ),
        array(
            'id' => 'g_icon',
            'type' => 'upload',
            'title' =>  __('Favicon 图标', 'Charlotte'),
            'library' => 'image',
            'preview' => true,
            'subtitle' => __('浏览器收藏夹和地址栏中显示的图标', 'Charlotte'),
        ),
        array(
            'id' => 'g_404',
            'type' => 'upload',
            'title' =>  __('404 页面图片', 'Charlotte'),
            'library' => 'image',
            'preview' => true,
            'default' => get_template_directory_uri() . '/assets/img/404.jpg',
            'subtitle' => __('图片显示出来是 404 的形状', 'Charlotte'),
        ),
        array(
            'id' => 'g_nothing',
            'type' => 'upload',
            'title' =>  __('无内容图片', 'Charlotte'),
            'library' => 'image',
            'preview' => true,
            'default' => get_template_directory_uri() . '/assets/img/nothing.svg',
            'subtitle' => __('当搜索不到文章或分类没有文章时显示', 'Charlotte'),
        ),
        array(
            'id' => 'g_postthumbnail',
            'type' => 'upload',
            'title' =>  __('默认特色图', 'Charlotte'),
            'library' => 'image',
            'preview' => true,
            'default' => get_template_directory_uri() . '/assets/img/default.jpg',
            'subtitle' => __('当文章中没有图片且没有特色图时显示', 'Charlotte'),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'global_fields',
    'title' => __('第三方配置', 'Charlotte'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'type' => 'notice',
            'style' => 'info',
            'content' => '提示：<strong>DogeCloud 云存储</strong> 与 <strong>火山引擎 ImageX</strong>请勿同时开启！',
        ),
        array(
            'id' => 'g_cos_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('DogeCloud 云存储', 'Charlotte'),
                ),
                array(
                    'type' => 'submessage',
                    'style' => 'info',
                    'content' => 'DogeCloud 云存储提供<strong> 10 GB </strong>的免费存储额度，<strong> 20 GB </strong>每月的免费 CDN 额度，<a target="_blank" href="https://console.dogecloud.com/register.html?iuid=614">立即注册</a>',
                ),
                array(
                    'id' => 'g_cos',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Charlotte'),
                    'subtitle' => __('开启/关闭 DogeCloud 云存储', 'Charlotte'),
                    'text_on' => __('开启', 'Charlotte'),
                    'text_off' => __('关闭', 'Charlotte'),
                ),
                array(
                    'id' => 'g_cos_bucketname',
                    'type' => 'text',
                    'title' => __('空间名称', 'Charlotte'),
                    'subtitle' => __('空间名称可在空间基本信息中查看', 'Charlotte'),
                    'desc' => __('<a target="_blank" href="https://console.dogecloud.com/oss/list">点击这里</a>查询空间名称', 'Charlotte'),
                ),
                array(
                    'id' => 'g_cos_url',
                    'type' => 'text',
                    'title' => __('加速域名', 'Charlotte'),
                    'subtitle' => __('域名结尾不要添加 /', 'Charlotte'),
                    'desc' => __('<a target="_blank" href="https://console.dogecloud.com/oss/list">点击这里</a>查询加速域名', 'Charlotte'),
                ),
                array(
                    'id' => 'g_cos_accesskey',
                    'type' => 'text',
                    'title' => __('AccessKey', 'Charlotte'),
                    'subtitle' => __('出于安全考虑，建议周期性地更换密钥', 'Charlotte'),
                    'desc' => __('<a target="_blank" href="https://console.dogecloud.com/user/keys">点击这里</a>查询 AccessKey', 'Charlotte'),
                ),
                array(
                    'id' => 'g_cos_secretkey',
                    'type' => 'text',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                    'title' => __('SecretKey', 'Charlotte'),
                    'subtitle' => __('出于安全考虑，建议周期性地更换密钥', 'Charlotte'),
                    'desc' => __('<a target="_blank" href="https://console.dogecloud.com/user/keys">点击这里</a>查询 SecretKey', 'Charlotte'),
                ),
            ),
            'default' => array(
                'g_cos' => false,
                'g_cos_bucketname' => '',
                'g_cos_url' => '',
                'g_cos_accesskey' => '',
                'g_cos_secretkey' => '',
            ),
        ),
        array(
            'id' => 'g_imgx_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('火山引擎 ImageX', 'Charlotte'),
                ),
                array(
                    'type' => 'submessage',
                    'style' => 'info',
                    'content' => '火山引擎 ImageX 提供<strong> 10 GB </strong>的免费存储额度，<strong> 10 GB </strong>每月的免费 CDN 额度，<strong> 20 TB </strong>每月的图像处理额度，<a target="_blank" href="https://www.volcengine.com/products/imagex?utm_content=ImageX&utm_medium=i4vj9y&utm_source=u7g4zk&utm_term=ImageX-Charlotte">立即注册</a>',
                ),
                array(
                    'id' => 'g_imgx',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Charlotte'),
                    'subtitle' => __('开启/关闭 火山引擎 ImageX', 'Charlotte'),
                    'text_on' => __('开启', 'Charlotte'),
                    'text_off' => __('关闭', 'Charlotte'),
                ),
                array(
                    'id' => 'g_imgx_region',
                    'type' => 'select',
                    'title' => __('加速地域', 'Charlotte'),
                    'subtitle' => __('加速地域在创建服务的时候进行选择', 'Charlotte'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/imagex/service_manage/">点击这里</a>查询加速地域', 'Charlotte'),
                    'options' => array(
                        'cn-north-1' => __('国内', 'Charlotte'),
                        'us-east-1' => __('美东', 'Charlotte'),
                        'ap-singapore-1' => __('新加坡', 'Charlotte')
                    ),
                ),
                array(
                    'id' => 'g_imgx_serviceid',
                    'type' => 'text',
                    'title' => __('服务 ID', 'Charlotte'),
                    'subtitle' => __('服务 ID 可在图片服务管理中查看', 'Charlotte'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/imagex/service_manage/">点击这里</a>查询服务 ID', 'Charlotte'),
                ),
                array(
                    'id' => 'g_imgx_url',
                    'type' => 'text',
                    'title' => __('加速域名', 'Charlotte'),
                    'subtitle' => __('域名结尾不要添加 /', 'Charlotte'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/imagex/service_manage/">点击这里</a>查询加速域名', 'Charlotte'),
                ),
                array(
                    'id' => 'g_imgx_tmp',
                    'type' => 'text',
                    'title' => __('处理模板', 'Charlotte'),
                    'subtitle' => __('处理模板可在图片处理配置中查看', 'Charlotte'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/imagex/image_template/">点击这里</a>查询处理模板', 'Charlotte'),
                ),
                array(
                    'id' => 'g_imgx_accesskey',
                    'type' => 'text',
                    'title' => __('AccessKey', 'Charlotte'),
                    'subtitle' => __('出于安全考虑，建议周期性地更换密钥', 'Charlotte'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/iam/keymanage/">点击这里</a>查询 AccessKey', 'Charlotte'),
                ),
                array(
                    'id' => 'g_imgx_secretkey',
                    'type' => 'text',
                    'attributes' => array(
                        'type' => 'password',
                    ),
                    'title' => __('SecretKey', 'Charlotte'),
                    'subtitle' => __('出于安全考虑，建议周期性地更换密钥', 'Charlotte'),
                    'desc' => __('<a target="_blank" href="https://console.volcengine.com/iam/keymanage/">点击这里</a>查询 SecretKey', 'Charlotte'),
                ),
            ),
            'default' => array(
                'g_imgx' => false,
                'g_imgx_region' => 'cn-north-1',
                "g_imgx_serviceid" => "",
                "g_imgx_url" => "",
                "g_imgx_tmp" => "",
                "g_imgx_accesskey" => "",
                "g_imgx_secretkey" => "",
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'title' => __('收录配置', 'Charlotte'),
    'icon' => 'fas fa-camera',
    'fields' => array(
        array(
            'id' => 'seo_shareimg',
            'type' => 'upload',
            'title' =>  __('分享图片', 'Charlotte'),
            'library' => 'image',
            'preview' => true,
            'default' => get_template_directory_uri() . '/assets/img/default.jpg',
            'subtitle' => __('用于搜索引擎或社交工具抓取时使用', 'Charlotte'),
        ),
        array(
            'id' => 'seo_keywords',
            'type' => 'text',
            'title' => __('关键词', 'Charlotte'),
            'subtitle' =>  __('每个关键词之间需要用 , 分割', 'Charlotte'),
        ),
        array(
            'id' => 'seo_description',
            'type' => 'textarea',
            'title' => __('站点描述', 'Charlotte'),
            'subtitle' =>  __('网站首页的描述信息', 'Charlotte'),
        ),
        array(
            'id' => 'seo_statistical',
            'title' => __('统计代码', 'Charlotte'),
            'subtitle' => __('<span style="color:red">输入代码时请注意辨别代码安全性</span>', 'Charlotte'),
            'type' => 'code_editor',
            'settings' => array(
                'theme' => 'default',
                'mode' => 'html',
            ),
            'sanitize' => false,
            'default' => '<script></script>',
        ),
        array(
            'id' => 'seo_robots_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('robots.txt 配置', 'Charlotte'),
                ),
                array(
                    'type' => 'content',
                    'content' => '<ul> <li>' . __('- 需要 ', 'Charlotte') . '<a href="' . admin_url('options-reading.php') . '" target="_blank">' . __('设置-阅读-对搜索引擎的可见性', 'Charlotte') . '</a>' . __(' 是开启的状态，以下配置才会生效', 'Charlotte') . '</li><li>' . __('- 如果网站根目录下已经有 robots.txt 文件，下面的配置不会生效', 'Charlotte') . '</li><li>' . __('- 点击 ', 'Charlotte') . '<a href="' . home_url() . '/robots.txt" target="_blank">robots.txt</a>' . __(' 查看配置是否生效，如果网站开启了 CDN，可能需要刷新缓存才会生效', 'Charlotte') . '</li></ul>',
                ),
                array(
                    'id' => 'seo_robots',
                    'type' => 'textarea',
                ),
            ),
            'default' => array(
                'seo_robots' => getrobots(),
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'title' => __('文章配置', 'Charlotte'),
    'icon' => 'fas fa-file-alt',
    'fields' => array(
        array(
            'id' => 'g_163mic',
            'type' => 'switcher',
            'title' => __('网易云音乐', 'Charlotte'),
            'subtitle' => __('启用/禁用网易云音乐自动播放功能', 'Charlotte'),
            'default' => false,
        ),
        array(
            'id' => 'g_post_comments',
            'type' => 'switcher',
            'title' => __('评论数量展示', 'Charlotte'),
            'subtitle' => __('启用/禁用首页及文章页面展示阅读数量的功能', 'Charlotte'),
            'default' => true,
        ),
        array(
            'id' => 'g_post_views',
            'type' => 'switcher',
            'title' => __('热度数量展示', 'Charlotte'),
            'subtitle' => __('启用/禁用首页及文章页面展示热度数量的功能', 'Charlotte'),
            'default' => true,
        ),
        array(
            'id' => 'g_post_loves',
            'type' => 'switcher',
            'title' => __('点赞数量展示', 'Charlotte'),
            'subtitle' => __('启用/禁用首页及文章页面展示点赞数量的功能', 'Charlotte'),
            'default' => true,
        ),
        array(
            'id' => 'g_post_author',
            'type' => 'switcher',
            'title' => __('作者名称展示', 'Charlotte'),
            'subtitle' => __('启用/禁用首页展示作者名称的功能', 'Charlotte'),
            'default' => true,
        ),
        array(
            'id' => 'g_post_revision',
            'type' => 'switcher',
            'title' => __('附加功能', 'Charlotte'),
            'subtitle' => __('启用/禁用文章自动保存、修订版本功能', 'Charlotte'),
            'default' => true,
        ),
        array(
            'id' => 'g_image_filter',
            'type' => 'switcher',
            'title' => __('按类型筛选媒体库功能', 'Charlotte'),
            'subtitle' => __('启用/禁用按类型筛选媒体库功能功能', 'Charlotte'),
            'default' => true,
        ),
        array(
            'id' => 'g_article_widgets',
            'type' => 'image_select',
            'title' => __('页面布局', 'Charlotte'),
            'subtitle' => __('差异在于侧边栏小工具，仅在文章页面生效', 'Charlotte'),
            'options' => array(
                'one_side' => get_template_directory_uri() . '/assets/img/options/col-12.png',
                'two_side' => get_template_directory_uri() . '/assets/img/options/col-8.png',
            ),
            'default' => 'two_side',
        ),
        array(
            'id' => 'g_cc_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('知识共享协议', 'Charlotte'),
                ),
                array(
                    'id' => 'g_cc_switch',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Charlotte'),
                    'subtitle' => __('开启/关闭 知识共享协议', 'Charlotte'),
                    'text_on' => __('开启', 'Charlotte'),
                    'text_off' => __('关闭', 'Charlotte'),
                ),
                array(
                    'id' => 'g_cc',
                    'type' => 'select',
                    'title' => __('协议名称', 'Charlotte'),
                    'subtitle' => __('选择文章的知识共享协议', 'Charlotte'),
                    'options' => array(
                        'one' => __('知识共享署名 4.0 国际许可协议', 'Charlotte'),
                        'two' => __('知识共享署名-非商业性使用 4.0 国际许可协议', 'Charlotte'),
                        'three' => __('知识共享署名-禁止演绎 4.0 国际许可协议', 'Charlotte'),
                        'four' => __('知识共享署名-非商业性使用-禁止演绎 4.0 国际许可协议', 'Charlotte'),
                        'five' => __('知识共享署名-相同方式共享 4.0 国际许可协议', 'Charlotte'),
                        'six' => __('知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议', 'Charlotte'),
                    ),
                ),
            ),
            'default' => array(
                'g_cc_switch' => false,
                'g_cc' => 'one',
            ),
        ),
        array(
            'id' => 'g_article_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('文章 HOT 标签', 'Charlotte'),
                ),
                array(
                    'id' => 'g_article_comment',
                    'type' => 'text',
                    'title' => __('评论数', 'Charlotte'),
                    'subtitle' => __('填写显示 HOT 标签需要的评论数', 'Charlotte'),
                ),
                array(
                    'id' => 'g_article_love',
                    'type' => 'text',
                    'title' => __('点赞数', 'Charlotte'),
                    'subtitle' => __('填写显示 HOT 标签需要的点赞数', 'Charlotte'),
                ),
            ),
            'default' => array(
                'g_article_comment' => '20',
                'g_article_love' => '200',
            ),
        ),
        array(
            'id' => 'g_donate_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('文章打赏', 'Charlotte'),
                ),
                array(
                    'id' => 'g_donate',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Charlotte'),
                    'subtitle' => __('开启/关闭 文章打赏', 'Charlotte'),
                    'text_on' => __('开启', 'Charlotte'),
                    'text_off' => __('关闭', 'Charlotte'),
                ),
                array(
                    'id' => 'g_donate_wechat',
                    'type' => 'upload',
                    'title' =>  __('微信二维码', 'Charlotte'),
                    'library' => 'image',
                    'preview' => true,
                ),
                array(
                    'id' => 'g_donate_alipay',
                    'type' => 'upload',
                    'title' =>  __('支付宝二维码', 'Charlotte'),
                    'library' => 'image',
                    'preview' => true,
                ),
            ),
            'default' => array(
                'g_donate' => false,
                'g_donate_wechat' => get_template_directory_uri() . '/assets/img/200.png',
                'g_donate_alipay' => get_template_directory_uri() . '/assets/img/200.png',
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'title' =>  __('邮件配置', 'Charlotte'),
    'icon' => 'fas fa-envelope',
    'fields' => array(
        array(
            'id' => 'm_smtp',
            'type' => 'switcher',
            'title' => __('SMTP 服务', 'Charlotte'),
            'subtitle' => __('启用/禁用 SMTP 服务', 'Charlotte'),
            'default' => false,
        ),
        array(
            'id' => 'm_host',
            'type' => 'text',
            'title' => __('邮件服务器', 'Charlotte'),
            'subtitle' => __('填写发件服务器地址', 'Charlotte'),
            'placeholder' => __('smtp.example.com', 'Charlotte'),
        ),
        array(
            'id' => 'm_port',
            'type' => 'text',
            'title' => __('服务器端口', 'Charlotte'),
            'subtitle' => __('填写发件服务器端口', 'Charlotte'),
            'placeholder' => __('465', 'Charlotte'),
        ),
        array(
            'id' => 'm_sec',
            'type' => 'text',
            'title' => __('授权方式', 'Charlotte'),
            'subtitle' => __('填写登录鉴权的方式', 'Charlotte'),
            'placeholder' => __('ssl', 'Charlotte'),
        ),
        array(
            'id' => 'm_username',
            'type' => 'text',
            'title' => __('邮箱帐号', 'Charlotte'),
            'subtitle' => __('填写邮箱账号', 'Charlotte'),
            'placeholder' => __('user@example.com', 'Charlotte'),
        ),
        array(
            'id' => 'm_passwd',
            'type' => 'text',
            'title' => __('邮箱密码', 'Charlotte'),
            'subtitle' => __('填写邮箱密码', 'Charlotte'),
            'attributes' => array(
                'type' => 'password',
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'id' => 'top_fields',
    'title' => __('顶部配置', 'Charlotte'),
    'icon' => 'fas fa-window-maximize',
));

CSF::createSection($prefix, array(
    'parent' => 'top_fields',
    'title' => __('图片导航', 'Charlotte'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'top_title',
            'type' => 'text',
            'title' => __('图片标题', 'Charlotte'),
            'default' => __('Charlotte', 'Charlotte'),
        ),
        array(
            'id' => 'top_describe',
            'type' => 'text',
            'title' => __('标题描述', 'Charlotte'),
            'default' => __('一款专注于用户阅读体验的响应式博客主题', 'Charlotte'),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'top_fields',
    'title' => __('颜色导航', 'Charlotte'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'top_color',
            'type' => 'color',
            'default' => '#24292e',
            'title' =>  __('颜色导航', 'Charlotte'),
        ),
    ),
));

CSF::createSection($prefix, array(
    'id' => 'footer_fields',
    'title' => __('页脚配置', 'Charlotte'),
    'icon' => 'far fa-window-maximize',
));

CSF::createSection($prefix, array(
    'parent' => 'footer_fields',
    'title' => __('社交图标', 'Charlotte'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 's_social_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('国内平台', 'Charlotte'),
                ),
                array(
                    'id' => 's_sina_url',
                    'type' => 'text',
                    'title' => __('新浪微博', 'Charlotte'),
                    'placeholder' => __('https://weibo.com/xxxxx', 'Charlotte'),
                ),
                array(
                    'id' => 's_bilibili_url',
                    'type' => 'text',
                    'title' => __('哔哩哔哩', 'Charlotte'),
                    'placeholder' => __('https://space.bilibili.com/xxxxx', 'Charlotte'),
                ),
                array(
                    'id' => 's_coding_url',
                    'type' => 'text',
                    'title' => __('CODING', 'Charlotte'),
                    'placeholder' => __('https://xxxxx.coding.net/u/xxxxx', 'Charlotte'),
                ),
                array(
                    'id' => 's_gitee_url',
                    'type' => 'text',
                    'title' => __('码云', 'Charlotte'),
                    'placeholder' => __('https://gitee.com/xxxxx', 'Charlotte'),
                ),
                array(
                    'id' => 's_douban_url',
                    'type' => 'text',
                    'title' => __('豆瓣', 'Charlotte'),
                    'placeholder' => __('https://www.douban.com/people/xxxxx', 'Charlotte'),
                ),
            ),
        ),
        array(
            'id' => 's_social_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('海外平台', 'Charlotte'),
                ),
                array(
                    'id' => 's_twitter_url',
                    'type' => 'text',
                    'title' => __('Twitter', 'Charlotte'),
                    'placeholder' => __('https://twitter.com/xxxxx', 'Charlotte'),
                ),
                array(
                    'id' => 's_telegram_url',
                    'type' => 'text',
                    'title' => __('Telegram', 'Charlotte'),
                    'placeholder' => __('https://t.me/xxxxx', 'Charlotte'),
                ),
                array(
                    'id' => 's_linkedin_url',
                    'type' => 'text',
                    'title' => __('LinkedIn', 'Charlotte'),
                    'placeholder' => __('https://www.linkedin.com/in/xxxxx', 'Charlotte'),
                ),
                array(
                    'id' => 's_youtube_url',
                    'type' => 'text',
                    'title' => __('YouTube', 'Charlotte'),
                    'placeholder' => __('https://www.youtube.com/channel/xxxxx', 'Charlotte'),
                ),
                array(
                    'id' => 's_github_url',
                    'type' => 'text',
                    'title' => __('Github', 'Charlotte'),
                    'placeholder' => __('https://github.com/xxxxx', 'Charlotte'),
                ),
                array(
                    'id' => 's_stackflow_url',
                    'type' => 'text',
                    'title' => __('Stack Overflow', 'Charlotte'),
                    'placeholder' => __('https://stackoverflow.com/users/xxxxx', 'Charlotte'),
                ),
            ),
        ),
        array(
            'id' => 's_social_fieldset',
            'type' => 'fieldset',
            'fields' => array(
                array(
                    'type' => 'subheading',
                    'content' => __('其他', 'Charlotte'),
                ),
                array(
                    'id' => 's_email_url',
                    'type' => 'text',
                    'title' => __('电子邮箱', 'Charlotte'),
                    'placeholder' => __('mailto:xxxxx@example.com', 'Charlotte'),
                ),
            ),
            'default' => array(
                "s_sina_url" => "",
                "s_bilibili_url" => "",
                "s_coding_url" => "",
                "s_gitee_url" => "",
                "s_douban_url" => "",
                "s_twitter_url" => "",
                "s_telegram_url" => "",
                "s_linkedin_url" => "",
                "s_youtube_url" => "",
                "s_github_url" => "",
                "s_stackflow_url" => "",
                "s_email_url" => ""
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'footer_fields',
    'title' => __('备案信息', 'Charlotte'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 's_icp',
            'type' => 'text',
            'title' => __('工信部备案信息', 'Charlotte'),
            'subtitle' => __('由<a target="_blank" href="https://beian.miit.gov.cn/">工业和信息化部政务服务平台</a>提供', 'Charlotte'),
            'placeholder' => __('冀ICP证XXXXXX号', 'Charlotte'),
        ),
        array(
            'id' => 's_gov',
            'type' => 'text',
            'title' => __('公安备案信息', 'Charlotte'),
            'subtitle' => __('由<a target="_blank" href="http://www.beian.gov.cn/">全国互联网安全管理服务平台</a>提供', 'Charlotte'),
            'placeholder' => __('冀公网安备 XXXXXXXXXXXXX 号', 'Charlotte'),
        ),
        array(
            'id' => 's_gov_link',
            'type' => 'text',
            'title' => __('公安备案链接', 'Charlotte'),
            'subtitle' => __('由<a target="_blank" href="http://www.beian.gov.cn/">全国互联网安全管理服务平台</a>提供', 'Charlotte'),
            'placeholder' => __('http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=xxxxx', 'Charlotte'),
        ),
    ),
));

CSF::createSection($prefix, array(
    'parent' => 'footer_fields',
    'title' => __('版权信息', 'Charlotte'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 's_copyright',
            'type' => 'textarea',
            'title' => __('版权信息', 'Charlotte'),
            'default' => 'COPYRIGHT © ' . wp_date('Y') . ' ' . get_bloginfo('name') . '. ALL RIGHTS RESERVED.',
        ),
    ),
));

CSF::createSection($prefix, array(
    'id' => 'ad_fields',
    'title' => __('广告配置', 'Charlotte'),
    'icon' => 'fas fa-ad',
));

CSF::createSection($prefix, array(
    'parent' => 'ad_fields',
    'title' => __('文章广告', 'Charlotte'),
    'icon' => 'fas fa-arrow-right',
    'fields' => array(
        array(
            'id' => 'single_ad_top_group',
            'type' => 'group',
            'title' => '文章顶部广告',
            'subtitle' => '点击添加广告，最多添加 3 个顶部广告',
            'min' => 1,
            'max' => 3,
            'fields' => array(
                array(
                    'id' => 'ad_id',
                    'type' => 'text',
                    'title' =>  __('唯一标识', 'Charlotte'),
                    'subtitle' =>  __('仅用于识别广告内容，可以作为备注使用', 'Charlotte'),
                ),
                array(
                    'id' => 'ad_img',
                    'type' => 'upload',
                    'title' => __('轮播图片', 'Charlotte'),
                    'subtitle' =>  __('可以直接填写图片链接，也可以上传图片', 'Charlotte'),
                    'library' => 'image',
                    'preview' => true,
                ),
                array(
                    'id' => 'ad_url',
                    'type' => 'text',
                    'title' =>  __('网址链接', 'Charlotte'),
                    'subtitle' =>  __('需要填写完整的链接地址，包含协议头', 'Charlotte'),
                ),
                array(
                    'id' => 'ad_switcher',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Charlotte'),
                    'subtitle' => __('开启/关闭此条广告', 'Charlotte'),
                    'text_on' => __('开启', 'Charlotte'),
                    'text_off' => __('关闭', 'Charlotte'),
                    'default' => true
                ),
            ),
        ),
        array(
            'id' => 'single_ad_bottom_group',
            'type' => 'group',
            'title' => '文章底部广告',
            'subtitle' => '点击添加广告，最多添加 3 个底部广告',
            'min' => 1,
            'max' => 3,
            'fields' => array(
                array(
                    'id' => 'ad_id',
                    'type' => 'text',
                    'title' =>  __('唯一标识', 'Charlotte'),
                    'subtitle' =>  __('仅用于识别广告内容，可以作为备注使用', 'Charlotte'),
                ),
                array(
                    'id' => 'ad_img',
                    'type' => 'upload',
                    'title' => __('轮播图片', 'Charlotte'),
                    'subtitle' =>  __('可以直接填写图片链接，也可以上传图片', 'Charlotte'),
                    'library' => 'image',
                    'preview' => true,
                ),
                array(
                    'id' => 'ad_url',
                    'type' => 'text',
                    'title' =>  __('网址链接', 'Charlotte'),
                    'subtitle' =>  __('需要填写完整的链接地址，包含协议头', 'Charlotte'),
                ),
                array(
                    'id' => 'ad_switcher',
                    'type' => 'switcher',
                    'title' => __('功能开关', 'Charlotte'),
                    'subtitle' => __('开启/关闭此条广告', 'Charlotte'),
                    'text_on' => __('开启', 'Charlotte'),
                    'text_off' => __('关闭', 'Charlotte'),
                    'default' => true
                ),
            ),
        ),
    ),
));

CSF::createSection($prefix, array(
    'title' => __('备份恢复', 'Charlotte'),
    'icon' => 'fas fa-undo',
    'fields' => array(
        array(
            'type' => 'backup',
        ),
    ),
));

CSF::createSection($prefix, array(
    'title' => __('关于主题', 'Charlotte'),
    'icon' => 'fas fa-question-circle',
    'fields' => array(
        array(
            'type' => 'subheading',
            'content' => __('基础信息', 'Charlotte'),
        ),
        array(
            'type' => 'submessage',
            'style' => 'info',
            'content' => __('提示：在反馈主题相关的问题时，请同时复制并提交下面的内容。', 'Charlotte'),
        ),
        array(
            'type' => 'content',
            'content' => '<ul style="margin: 0 auto;"> <li>' . __('PHP 版本：', 'Charlotte') . PHP_VERSION . '</li> <li>' . __('Charlotte 版本：', 'Charlotte') . THEME_VERSION . '</li> <li>' . __('WordPress 版本：', 'Charlotte') . $wp_version . '</li> <li>' . __('User Agent 信息：', 'Charlotte') . $_SERVER['HTTP_USER_AGENT'] . '</li> </ul>',
        ),

        
        array(
            'type' => 'subheading',
            'content' => __('版权声明', 'Charlotte'),
        ),
        array(
            'type' => 'content',
            'content' => __('本主题是小茗Xmkjw63根据seatonjiang大佬的主题<a url="https://github.com/seatonjiang/kratos/">Kratos</a>二次开发而成,在此特别鸣谢大佬的支持。版权狗请绕路,在开发中请遵守GPL3.0协议,谢谢!'),
        ),
    ),
));
