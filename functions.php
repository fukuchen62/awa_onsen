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

    // google-web-fontsを読み込む
    wp_enqueue_style(
        "google-web-fonts",
        "https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap"
    );

    // reset.cssを読み込む
    // wp_enqueue_style(
    //     "foode-science-reset",
    //     get_template_directory_uri() . "/assets/css/reset.css"
    // );

    // cssを読み込む
    wp_enqueue_style(
        "awa-onsen-about",
        get_template_directory_uri() . "/assets/css/about.css"
    );

    wp_enqueue_style(
        "awa-onsen-column_list",
        get_template_directory_uri() . "/assets/css/column_list.css"
    );
    wp_enqueue_style(
        "awa-onsen-column",
        get_template_directory_uri() . "/assets/css/column.css"
    );
    wp_enqueue_style(
        "awa-onsen-common",
        get_template_directory_uri() . "/assets/css/common.css"
    );
    wp_enqueue_style(
        "awa-onsen-course",
        get_template_directory_uri() . "/assets/css/course.css"
    );
    wp_enqueue_style(
        "awa-onsen-destyle",
        get_template_directory_uri() . "/assets/css/destyle.css"
    );
    wp_enqueue_style(
        "awa-onsen-form",
        get_template_directory_uri() . "/assets/css/form.css"
    );
    wp_enqueue_style(
        "awa-onsen-mypage",
        get_template_directory_uri() . "/assets/css/mypage.css"
    );
    wp_enqueue_style(
        "awa-onsen-nearby_list",
        get_template_directory_uri() . "/assets/css/nearby_list.css"
    );
    wp_enqueue_style(
        "awa-onsen-nearby",
        get_template_directory_uri() . "/assets/css/nearby.css"
    );
    wp_enqueue_style(
        "awa-onsen-news_list",
        get_template_directory_uri() . "/assets/css/news_list.css"
    );
    wp_enqueue_style(
        "awa-onsen-news",
        get_template_directory_uri() . "/assets/css/news.css"
    );
    wp_enqueue_style(
        "awa-onsen-privacypolicy",
        get_template_directory_uri() . "/assets/css/privacypolicy.css"
    );
    wp_enqueue_style(
        "awa-onsen-reset",
        get_template_directory_uri() . "/assets/css/reset.css"
    );
    wp_enqueue_style(
        "awa-onsen-result",
        get_template_directory_uri() . "/assets/css/result.css"
    );
    wp_enqueue_style(
        "awa-onsen-sauna",
        get_template_directory_uri() . "/assets/css/sauna.css"
    );
    wp_enqueue_style(
        "awa-onsen-search",
        get_template_directory_uri() . "/assets/css/search.css"
    );
    wp_enqueue_style(
        "awa-onsen-spa",
        get_template_directory_uri() . "/assets/css/spa.css"
    );
    wp_enqueue_style(
        "awa-onsen-thanks",
        get_template_directory_uri() . "/assets/css/thanks.css"
    );
    wp_enqueue_style(
        "awa-onsen-top",
        get_template_directory_uri() . "/assets/css/top.css"
    );
    wp_enqueue_style(
        "awa-onsen-spa_list",
        get_template_directory_uri() . "/assets/css/spa_list.css"
    );


    // jQueryライブラリを読み込む
    wp_enqueue_script("jquery");

    //WordPress 本体の jQuery を登録解除
    // wp_deregister_script('jquery');

    //jQuery を CDN から読み込む
    // wp_enqueue_script(
    //     'jquery',
    //     '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
    //     array(),
    //     '3.3.1',
    //     true
    // );

    // jsを読み込む
    wp_enqueue_script(
        "awa-onsen-accordion",
        get_template_directory_uri() . "/assets/js/accordion.js"
    );
    wp_enqueue_script(
        "food-science-common",
        get_template_directory_uri() . "/assets/js/common.js"
    );
    wp_enqueue_script(
        "food-science-main",
        get_template_directory_uri() . "/assets/js/main.js"
    );
    wp_enqueue_script(
        "food-science-mypage",
        get_template_directory_uri() . "/assets/js/mypage.js"
    );
    wp_enqueue_script(
        "food-science-search",
        get_template_directory_uri() . "/assets/js/search.js"
    );
    wp_enqueue_script(
        "food-science-spa",
        get_template_directory_uri() . "/assets/js/spa.js"
    );
    wp_enqueue_script(
        "food-science-tag",
        get_template_directory_uri() . "/assets/js/tag.js"
    );
    wp_enqueue_script(
        "food-science-top",
        get_template_directory_uri() . "/assets/js/top.js"
    );



    // 画面毎に独自のスタイルシートとScriptファイルを読み込む
    if (is_home()) {
        // トップページの場合は
        // wp_enqueue_style(
        //     "foode-science-top",
        //     get_template_directory_uri() . "/assets/css/top.css"
        // );

        // wp_enqueue_script(
        //     'foode-science-top',
        //     get_template_directory_uri() . "/assets/js/top.js",
        //     '',
        //     '',
        //     true     //true＝フッターで出力
        // );
    }

    if (is_page('concept')) {
        // トップページの場合は
        // wp_enqueue_style(
        //     "foode-science-concept",
        //     get_template_directory_uri() . "/assets/css/concept.css"
        // );

        // wp_enqueue_script(
        //     'foode-science-concept',
        //     get_template_directory_uri() . "/assets/js/concept.js",
        //     '',
        //     '',
        //     true     //true＝フッターで出力
        // );
    }
}
add_action('wp_enqueue_scripts', 'fs_script_files');

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
    'wpcf7_autop_or_not',     //関数の呼び出すタイミング
    'fs_wpcf7_autop'  //呼び出す関数名
);

function the_company_name()
{
    echo "株式会社ＱＬＩＰインタナショナル";
}

function get_company_name()
{
    return "株式会社ＱＬＩＰインタナショナル";
}
