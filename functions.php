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


function fs_pre_get_posts($query)
{
    // 管理画面とメインクエリでない場合を処理対象外とする
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    // 公開する記事だけを対象とする
    $query->set('post_status', 'publish');
    return;
}
add_action(
    'pre_get_posts',     //関数の呼び出すタイミング
    'fs_pre_get_posts'  //呼び出す関数名
);

/**
 * Scriptファイルを読みこむ処理
 *
 * @return void
 */

function fs_script_files()
{

    // Google Material Iconsの読み込み
    wp_enqueue_style(
        'google-material-icons',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200'
    );

    // Slick CarouselのCSSの読み込み
    wp_enqueue_style(
        'slick-carousel',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css'
    );

    // Slick CarouselのテーマCSSの読み込み
    wp_enqueue_style(
        'slick-carousel-theme',
        'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css'
    );
    // Slick CarouselのJSの読み込み
    wp_enqueue_script(
        "slick-carousel",
        "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    );

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
    // Google Fontsの読み込み

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


    // 日付に使用するフォントの読み込み
    wp_enqueue_style(
        "google-web-fonts-Fugaz",
        "https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap"
    );

    // CSSファイルの読み込み
    wp_enqueue_style("awa-onsen-destyle", get_template_directory_uri() . "/assets/css/destyle.css");
    wp_enqueue_style("awa-onsen-common", get_template_directory_uri() . "/assets/css/common.css");

    // デフォルトのjQueryを解除
    wp_deregister_script('jquery');

    // jQueryのCDNを登録
    wp_enqueue_script(
        'jquery',
        'https://code.jquery.com/jquery-3.7.1.min.js',
        array(),
        null,
        true
    );

    // jQueryをエンキュー（読み込み）
    // wp_enqueue_script('jquery');


    // // // JSの読み込み
    // wp_enqueue_script(
    //     'jquery-local',
    //     get_template_directory_uri() . '/assets/js/vendor/jquery-3.6.0.min.js'
    // );

    wp_enqueue_script("awa-onsen-common", get_template_directory_uri() . "/assets/js/common.js");

    // toppageだけ読み込みたくない
    if (!is_front_page()) {
        wp_enqueue_script("awa-onsen-menu", get_template_directory_uri() . "/assets/js/menu.js");
    }

    // フロントページ用のCSSとJSを読み込む
    if (is_front_page()) {
        wp_enqueue_style('top-style', get_template_directory_uri() . '/assets/css/top.css');
        wp_enqueue_style('loading-style', get_template_directory_uri() . '/assets/css/loading.css');
        wp_enqueue_script(
            "slick-carousel",
            "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
        );
        wp_enqueue_script('top-script', get_template_directory_uri() . '/assets/js/top.js');
        wp_enqueue_script('loading-script', get_template_directory_uri() . '/assets/js/loading.js');
    }

    // 詳細ページ用のCSSとJSの読み込み
    if (is_singular('spa')) { // 温泉詳細のCSS,JSの読み込み
        wp_enqueue_style('awa-onsen-spa', get_template_directory_uri() . '/assets/css/spa.css');
        wp_enqueue_script('awa-onsen-spa', get_template_directory_uri() . '/assets/js/spa.js');
    }

    if (is_singular('facility')) { // 周辺施設詳細のCSSとJSの読み込み
        wp_enqueue_style('awa-onsen-nearby', get_template_directory_uri() . '/assets/css/nearby.css');
        wp_enqueue_script('awa-onsen-nearby', get_template_directory_uri() . '/assets/js/nearby.js');
    }

    if (is_singular('column')) { // コラムの詳細ページのCSSの読み込み
        wp_enqueue_style('awa-onsen-column-one', get_template_directory_uri() . '/assets/css/column.css');
    }

    if (is_singular('course')) { // モデルコース詳細のCSS,JSの読み込み
        wp_enqueue_style('awa-onsen-course', get_template_directory_uri() . '/assets/css/course.css');
    }

    // 一覧ページ用のCSSとJSの読み込み
    if (is_post_type_archive('spa')) { // 温泉一覧のCSSの読み込み
        wp_enqueue_style('awa-onsen-spa_list', get_template_directory_uri() . '/assets/css/spa_list.css');
        wp_enqueue_script('awa-onsen-spa_list', get_template_directory_uri() . '/assets/js/accordion.js');
    }

    if (is_tax('sauna_type')) { // サウナのある温泉一覧のCSSの読み込み
        wp_enqueue_style('awa-onsen-sauna_spa_list', get_template_directory_uri() . '/assets/css/sauna_search.css');
        wp_enqueue_script('awa-onsen-sauna_spa_list', get_template_directory_uri() . '/assets/js/accordion.js');
    }

    if (is_tax('facility_type')) { // 周辺施設一覧のCSSとJSの読み込み
        wp_enqueue_style('awa-onsen-nearby_list', get_template_directory_uri() . '/assets/css/nearby_list.css');
        wp_enqueue_script('awa-onsen-nearby_list', get_template_directory_uri() . '/assets/js/accordion.js');
    }

    if (is_tax('column_type')) { // コラムの一覧ページのCSSの読み込み
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
        wp_enqueue_script('form-script', get_template_directory_uri() . '/assets/js/form.js');
        wp_enqueue_script('search-form-script', get_template_directory_uri() . '/assets/js/search_form.js');
    }


    // 固定ページ用のCSSとJSの読み込み
    if (is_page('mypage')) { // マイページのCSS,JSの読み込み
        wp_enqueue_style('awa-onsen-mypage', get_template_directory_uri() . '/assets/css/mypage.css');
        wp_enqueue_script('awa-onsen-mypage', get_template_directory_uri() . '/assets/js/mypage.js');
        wp_enqueue_script(
            'tag-list-script',
            get_template_directory_uri() . '/assets/js/tag_list.js'
        );
    }

    if (is_page('contact')) { // お問い合わせページのCSSの読み込み
        wp_enqueue_style('awa-onsen-form', get_template_directory_uri() . '/assets/css/form.css');
        wp_enqueue_script(
            'awa-onsen-contact-script',
            get_template_directory_uri() . '/assets/js/form.js',
            null,
            null,
            true
        );
        // wp_enqueue_script('food-science-mypage', get_template_directory_uri() . '/assets/js/mypage.js');

    }

    if (is_page('confirm')) { // お問合せ確認のCSSの読み込み
        wp_enqueue_style('awa-onsen-result', get_template_directory_uri() . '/assets/css/result.css');
    }

    if (is_page('thanks')) { // お問合せ完了のCSSの読み込み
        wp_enqueue_style('awa-onsen-thanks', get_template_directory_uri() . '/assets/css/thanks.css');
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

    if (is_page('search')) { // キーワード検索のCSS,JSの読み込み
        wp_enqueue_style('awa-onsen-mypage', get_template_directory_uri() . '/assets/css/keyword_search.css');
    }

    // 新着情報のCSSの読み込み
    if (is_single() && get_post_type() == 'post') {
        wp_enqueue_style('news-style', get_template_directory_uri() . '/assets/css/news.css');
    }

    if (is_404()) { // 404のCSSの読み込み
        wp_enqueue_style('awa-onsen-404', get_template_directory_uri() . '/assets/css/notfound.css');
    }
}

add_action('wp_enqueue_scripts', 'fs_script_files');

// function fs_pre_get_posts($query)
// {
//     // 管理画面とメインクエリでない場合を処理対象外とする
//     if (is_admin() || !$query->is_main_query()) {
//         return;
//     }

//     // トップページの場合は
//     if (is_home()) {
//         $query->set('posts_per_page', 3);
//         $query->set('category_name', 'news');
//         return;
//     }

//     // 検索ページの場合は、固定ページを対象外とし、投稿のみに
//     if (is_search()) {
//         $query->set('post_type', 'post');
//         return;
//     }
// }
// add_action(
//     'pre_get_posts', //関数の呼び出すタイミング
//     'fs_pre_get_posts' //呼び出す関数名
// );


function get_user_favorites_post_ids()
{
    if (function_exists('get_user_favorites')) {
        $user_favorites = get_user_favorites();
        if (!empty($user_favorites)) {
            return $user_favorites;
        }
    }
    return [];
}

function bistrocalme_document_title_parts($title)
{
    if (is_search()) {
        $title['title'] = '検索ページ';
        // 必要に応じてキャッチフレーズも設定できます
        $title['tagline'] = '絞り込み検索ページです';
    }
    return $title;
}
add_filter('document_title_parts', 'bistrocalme_document_title_parts');


add_filter('bcn_breadcrumb_title', 'my_custom_breadcrumb_navxt_title', 10, 3);
function my_custom_breadcrumb_navxt_title($title, $type, $id)
{
    if (is_search() && $type[0] === 'search') {
        $title =  '温泉,周辺施設,モデルコース';
    }
    return $title;
}


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

//コメントの表示する前の処理
function html_to_text($comment_content)
{
    if (get_comment_type() !== '') {
        // $comment_content = htmlspecialchars($comment_content, ENT_QUOTES);
        $comment_content = strip_tags($comment_content);
    }
    return $comment_content;
}
add_filter('comment_text', 'html_to_text');

//コメントを入力する下の名前、メール、サイトのサイトを消す
function my_comment_form_remove($arg)
{
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'my_comment_form_remove');

// テーマの functions.php に以下のコードを追加コメント入れる前に処理
function escape_comment_content($commentdata)
{
    // コメント内容をエスケープ
    // $commentdata['comment_content'] = htmlspecialchars($commentdata['comment_content'], ENT_QUOTES, 'UTF-8');
    // return $commentdata;
    $commentdata['comment_content'] = strip_tags($commentdata['comment_content']);
    return $commentdata;
}
add_filter('preprocess_comment', 'escape_comment_content');
