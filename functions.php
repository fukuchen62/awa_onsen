<?php

// 管理バーを非表示
// add_filter('show_admin_bar', '__return_false');

/**
 * テーマの初期化処理
 *
 * @return void
 */
function fs_theme_setup()
{
    /**
     * <title>タグを出力
     */
    add_theme_support('title-tag');

    /**
     * アイキャッチ画像を使用可能にする
     */
    add_theme_support('post-thumbnails');

    /**
     * カスタムメニュー機能を使用可能にする
     */
    add_theme_support('menus');
}
add_action('after_setup_theme', 'fs_theme_setup');

/**
 * fs_document_title_separator function
 * タイトルの区切り文字を変更する
 *
 * @param string $separator
 * @return string
 */
function fs_document_title_separator(string $separator): string
{
    $separator = '|';
    return $separator;
}
// add_filter('関数の呼び出すタイミング', '呼び出す関数名');
add_filter(
    'document_title_separator',     //関数の呼び出すタイミング
    'fs_document_title_separator'  //呼び出す関数名
);


/**
 * Scriptファイルを読みこむ処理
 *
 * @return void
 */

function fs_script_files()
{
    // font-awesomeを読み込む
    wp_enqueue_style(
        "font-awesome",
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    );

    // Google Fontsのプリコネクトを設定
    wp_enqueue_style(
        'google-fonts-preconnect1',
        'https://fonts.googleapis.com',
        array(),
        null
    );

    wp_enqueue_style(
        'google-fonts-preconnect2',
        'https://fonts.gstatic.com',
        array(),
        null,
        'crossorigin="anonymous"'
    );

    // Google Fontsの読み込み
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap',
        array(),
        null
    );


    // google-web-fontsを読み込む
    wp_enqueue_style(
        "google-web-fonts",
        "https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap"
    );

    // CSSファイルの読み込み
    wp_enqueue_style("awa-onsen-reset", get_template_directory_uri() . "/assets/css/reset.css");
    wp_enqueue_style("awa-onsen-destyle", get_template_directory_uri() . "/assets/css/destyle.css");
    wp_enqueue_style("awa-onsen-common", get_template_directory_uri() . "/assets/css/common.css");


    // JSの読み込み
    wp_enqueue_script(
        'jquery-local',
        get_template_directory_uri() . '/assets/js/vendor/jquery-3.6.0.min.js'
    );
    wp_enqueue_script("awa-onsen-common", get_template_directory_uri() . "/assets/js/common.js");
    wp_enqueue_script("awa-onsen-menu", get_template_directory_uri() . "/assets/js/menu.js");


    // フロントページ用のCSSとJSを読み込む
    if (is_front_page()) {
        wp_enqueue_style('top-style', get_template_directory_uri() . '/assets/css/top.css');
        wp_enqueue_script('top-script', get_template_directory_uri() . '/assets/js/top.js');
    }

    // 詳細ページ用のCSSとJSの読み込み
    if (is_singular('spa')) { // 温泉詳細のCSS,JSの読み込み
        wp_enqueue_style('awa-onsen-spa', get_template_directory_uri() . '/assets/css/spa.css');
        wp_enqueue_script('food-science-spa', get_template_directory_uri() . '/assets/js/spa.js');
    }

    if (is_singular('facility')) { // 周辺施設詳細のCSSの読み込み
        wp_enqueue_style('awa-onsen-nearby', get_template_directory_uri() . '/assets/css/nearby.css');
    }

    if (is_singular('column')) { // コラムの詳細ページのCSSの読み込み
        wp_enqueue_style('awa-onsen-column-one', get_template_directory_uri() . '/assets/css/column.css');
    }

    if (is_singular('course')) { // モデルコース詳細のCSS,JSの読み込み
        wp_enqueue_style('awa-onsen-course', get_template_directory_uri() . '/assets/css/course.css');
    }

    // 一覧ページ用のCSSの読み込み
    if (is_post_type_archive('spa')) { // 温泉一覧のCSSの読み込み
        wp_enqueue_style('awa-onsen-spa_list', get_template_directory_uri() . '/assets/css/spa_list.css');
    }

    if (is_tax('facility_type')) { // 周辺施設一覧のCSSの読み込み
        wp_enqueue_style('awa-onsen-nearby_list', get_template_directory_uri() . '/assets/css/nearby_list.css');
    }

    if (is_tax('column_type')) { // コラムの一覧ページのCSSとJSの読み込み
        wp_enqueue_style('awa-onsen-column-list', get_template_directory_uri() . '/assets/css/column_list.css');
    }

    if (is_tax('course_type')) { // モデルコース一覧のCSSの読み込み
        wp_enqueue_style('awa-onsen-course_list', get_template_directory_uri() . '/assets/css/course_list.css');
    }

    if (is_category()) { // 新着一覧のCSSの読み込み
        wp_enqueue_style('news-list-style', get_template_directory_uri() . '/assets/css/news_list.css');
    }

    // 検索ページ用のCSSとJSの読み込み
    if (is_search()) {
        wp_enqueue_style('search-style', get_template_directory_uri() . '/assets/css/search.css');
        wp_enqueue_script('tag-list-script', get_template_directory_uri() . '/assets/js/tag_list.js');
    }

    // 固定ページ用のCSSとJSの読み込み
    if (is_page('mypage')) { // マイページのCSS,JSの読み込み
        wp_enqueue_style('awa-onsen-mypage', get_template_directory_uri() . '/assets/css/mypage.css');
        wp_enqueue_script('food-science-mypage', get_template_directory_uri() . '/assets/js/mypage.js');
    }

    if (is_page('contact')) { // お問い合わせページのCSSの読み込み
        wp_enqueue_style('awa-onsen-form', get_template_directory_uri() . '/assets/css/form.css');
    }

    if (is_page('confirm')) { // お問合せ確認のCSSの読み込み
        wp_enqueue_style('awa-onsen-result', get_template_directory_uri() . '/assets/css/result.css');
    }

    if (is_page('about')) { // 自己紹介ページのCSSの読み込み
        wp_enqueue_style('awa-onsen-about', get_template_directory_uri() . '/assets/css/about.css');
    }

    if (is_page('sauna')) { // サ活のページのCSSの読み込み
        wp_enqueue_style('awa-onsen-sauna', get_template_directory_uri() . '/assets/css/sauna.css');
    }

    if (is_page('privacypolicy')) { // プライバシーポリシーのCSSの読み込み
        wp_enqueue_style('awa-onsen-privacypolicy', get_template_directory_uri() . '/assets/css/privacypolicy.css');
    }

    // 新着情報のCSSの読み込み
    if (is_single()) {
        wp_enqueue_style('news-style', get_template_directory_uri() . '/assets/css/news.css');
    }
}

add_action('wp_enqueue_scripts', 'fs_script_files');
?>


<?php
/**
 * Contact form 7のときには、整形機能をOffにする
 *
 * @return void
 */
function fs_wpcf7_autop()
{
    return false;
}
add_filter(
    'wpcf7_autop_or_not', // 関数の呼び出すタイミング
    'fs_wpcf7_autop' // 呼び出す関数名
);

function the_company_name()
{
    echo "株式会社ＱＬＩＰインタナショナル";
}

function get_company_name()
{
    return "株式会社ＱＬＩＰインタナショナル";
}
?>
