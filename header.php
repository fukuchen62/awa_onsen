<!-- アヒルの飛ぶ先取得 -->
<?php
$args = array(
    "post_type" => "spa", //通常の投稿タイプ
    // "posts_per_page" => -1, //表示する投稿数
    "orderby" => "rand", //ランダム
);
//WP_Queryオブジェクトを作成
$the_query = new WP_Query($args);
if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
        $the_query->the_post();

        $onsen_name = get_the_title();
        $onsen_url = get_the_permalink();
        break;
    }
}
wp_reset_postdata();
?>

<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="「あわあわ温泉ぶらり」では徳島県全域の温泉をご紹介。ツーリング、ラフティング、映えスポットや宿泊、日帰りコース等のコンテンツも。湯ったりほっと、一息つきませんか？">
    <meta name="keywords" content="徳島県,観光,温泉,映え,遊ぶ,宿泊,サウナ,ツーリング,ラフティング,ハイキング,登山,キャンプ">

    <!-- 「get_template_directory_uri();」を変数「path」に代入 -->
    <script>
        var path = "<?php echo get_template_directory_uri(); ?>";
        var onsen_url = "<?php echo $onsen_url; ?>";
        var onsen_name = "<?php echo $onsen_name; ?>";
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php if (is_front_page()) : ?>
        <div class="loader_loading" id="loader_loading">
            <div id="progressbar">
                <span id="loading"></span>
                <div id="load">loading</div>
            </div>
        </div>
    <?php endif; ?>
    <div class="bubble_background">
        <!-- header -->
        <header class="header_wrap">
            <div class="header_container">
                <!-- headerの左側 -->
                <!-- 常時表示サイトロゴ -->
                <a class="logo" href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg" alt="あわあわ温泉ぶらり">
                </a>
                <!-- 上にスクロールするボタン -->
                <div class="top_button"></div>

                <!-- sp&tbnav -->
                <div class="hamburger sp_tb_only"></div>
            </div>
            <!-- menu -->
            <nav class="sp_nav sp_tb_only">
                <div class="navlist">
                    <div class="nav_bg"></div>
                    <form role="search" method="post" class="searchform" action="<?php echo home_url('/search'); ?>">
                        <input type="text" class="search-input" name="search-query" placeholder="検索ワード" />
                        <button type="submit" class="searchsubmit">
                            <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                        </button>
                    </form>
                    <ul class="navlist_container">
                        <li class="navlist_item"><a href="<?php echo home_url(); ?>"><span class="material-symbols-outlined">
                                    bubble_chart
                                </span>TOP</a></li>
                        <li class="navlist_item"><a href="<?php echo home_url('/spa/'); ?>"><span class="material-symbols-outlined">
                                    bath_outdoor
                                </span>温泉一覧</a></li>
                        <li class="navlist_item"><a href="<?php echo home_url('/facility_type/gourmet/'); ?>"><span class="material-symbols-outlined">
                                    pin_drop
                                </span>周辺一覧</a></li>
                        <li class="navlist_item"><a href="<?php echo home_url('/course_type/tour/'); ?>"><span class="material-symbols-outlined">
                                    directions_walk
                                </span>モデルコース</a></li>
                        <li class="navlist_item"><a href="<?php echo home_url('/sauna/'); ?>"><span class="material-symbols-outlined">
                                    sauna
                                </span>サ活</a></li>
                        <li class="navlist_item"><a href="<?php echo home_url('/column_type/spa-column/'); ?>"><span class="material-symbols-outlined">
                                    border_color
                                </span>コラム</a></li>
                        <li class="navlist_item">
                            <a href="<?php echo home_url('/?s='); ?>">
                                <i class="fa-solid fa-square-check" style="color: #ffffff;"></i>
                                条件検索</a>
                        </li>
                        <li class="navlist_item"><a href="<?php echo home_url('/mypage/'); ?>"><span class="material-symbols-outlined">
                                    home
                                </span>マイページ</a></li>

                    </ul>

                    <div class="nav_bg"></div>
                </div>
            </nav>
            <!-- pcnav -->
            <div class="pc_inner">
                <nav class="g_nav pc_only" id="pc_nav">
                    <div class="navlist">
                        <div class="nav_bg"></div>

                        <form role="search" method="post" class="searchform" action="<?php echo home_url('/search'); ?>">
                            <input type="text" class="search-input" name="search-query" placeholder="検索ワード" />

                            <button type="submit" class="searchsubmit">
                                <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                            </button>
                        </form>

                        <ul class="navlist_container">
                            <li class="navlist_item"><a href="<?php echo home_url(); ?>"><span class="material-symbols-outlined">
                                        bubble_chart
                                    </span>TOP</a></li>
                            <li class="navlist_item"><a href="<?php echo home_url('/spa/'); ?>"><span class="material-symbols-outlined">
                                        bath_outdoor
                                    </span>温泉一覧</a></li>
                            <li class="navlist_item"><a href="<?php echo home_url('facility_type/gourmet/'); ?>"><span class="material-symbols-outlined">
                                        pin_drop
                                    </span>周辺一覧</a></li>
                            <li class="navlist_item"><a href="<?php echo home_url('/course_type/tour/'); ?>"><span class="material-symbols-outlined">
                                        directions_walk
                                    </span>モデルコース</a></li>
                            <li class="navlist_item"><a href="<?php echo home_url('/sauna/'); ?>"><span class="material-symbols-outlined">
                                        sauna
                                    </span>サ活</a></li>
                            <li class="navlist_item"><a href="<?php echo home_url('column_type/spa-column/'); ?>"><span class="material-symbols-outlined">
                                        border_color
                                    </span>コラム</a></li>
                            <li class="navlist_item">
                                <a href="<?php echo home_url('?s='); ?>">
                                    <i class="fa-solid fa-square-check" style="color: #ffffff;"></i>条件検索
                                </a>
                            </li>
                            <li class="navlist_item"><a href="<?php echo home_url('/mypage/'); ?>"><span class="material-symbols-outlined">
                                        home
                                    </span>マイページ</a></li>


                        </ul>

                        <div class="nav_bg"></div>
                    </div>
                </nav>
            </div>
        </header>
