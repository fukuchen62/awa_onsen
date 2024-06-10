<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="「あわあわ温泉ぶらり」では徳島県全域の温泉をご紹介。ツーリング、ラフティング、映えスポットや宿泊、日帰りコース等のコンテンツも。湯ったりほっと、一息つきませんか？
">
    <meta name="keywords" content="徳島県,温泉,映え,遊ぶ,宿泊,サウナ,ツーリング,ラフティング,ハイキング,登山,キャンプ">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
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
                    <ul class="navlist_container">
                        <li class="navlist_item"><a href="<?php echo home_url(); ?>"><span class="material-symbols-outlined">
                                    bubble_chart
                                </span>TOP</a></li>
                        <li class="navlist_item"><a href="<?php echo home_url('/spa/'); ?>">
                                bath_outdoor
                                </span>温泉一覧</a></li>
                        <li class="navlist_item"><a href="<?php echo home_url('/facility_type/shopping/'); ?>"><span class="material-symbols-outlined">
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
                        <li class="navlist_item"><a href="<?php echo home_url('/?s='); ?>"><span class="material-symbols-outlined">
                                    search
                                </span>検索</a></li>
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
                        <ul class="navlist_container">
                            <li class="navlist_item"><a href="<?php echo home_url(); ?>"><span class="material-symbols-outlined">
                                        bubble_chart
                                    </span>TOP</a></li>
                            <li class="navlist_item"><a href="<?php echo home_url('/spa/'); ?>"><span class="material-symbols-outlined">
                                        bath_outdoor
                                    </span>温泉一覧</a></li>
                            <li class="navlist_item"><a href="<?php echo home_url('facility_type/shopping/'); ?>"><span class="material-symbols-outlined">
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
                            <li class="navlist_item"><a href="<?php echo home_url('?s='); ?>"><span class="material-symbols-outlined">
                                        search
                                    </span>検索</a></li>
                            <li class="navlist_item"><a href="<?php echo home_url('/mypage/'); ?>"><span class="material-symbols-outlined">
                                        home
                                    </span>マイページ</a></li>
                        </ul>
                        <div class="nav_bg"></div>
                    </div>
                </nav>
            </div>
        </header>
