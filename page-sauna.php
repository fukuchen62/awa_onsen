<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main class="pc_inner">
    <div class="container">

        <div class="flex">
            <h2 class="under_line">サ活</h2>

            <!-- パンくずリスト -->
            <?php get_template_part('template-parts/breadcrumb') ?>
        </div>

        <div class="box">
            <!-- 2 -->
            <!-- 元のコード -->
            <!-- <img class="sauna_photo margin_right order_2" src="<?php echo esc_url($pic_url); ?>" alt="サ活写真"> -->

            <?php if ($pic = get_field('sauna_pic1')) : ?>
                <?php $pic_url = $pic['sizes']['large']; ?>
                <?php if ($pic_url) : ?>
                    <img class="sauna_photo margin_right order_2" src="<?php echo esc_url($pic_url); ?>" alt="サ活写真">
                <?php endif; ?>
            <?php endif; ?>

            <!-- 1 -->
            <div class="sauna_box order_1">
                <h3 class="sauna_ttl">サ活について</h3>
                <p>
                    サ活（サウナ活動）は、サウナで心身をリフレッシュさせることが目的です。サウナで汗を流し、その後に外気浴や冷水で体を冷やす「交代浴」を繰り返すことで、血行が促進されリフレッシュできます。近年ではサウナ専用の施設やテントサウナなどのスポットが増加しており、全国的にもサ活はブームとなっています。
                </p>
            </div>

            <!-- 3 -->
            <!-- 元のコード -->
            <!-- <img class="sauna_photo margin_left order_3" src="<?php echo get_template_directory_uri() ?>/assets/images/sauna2.png" alt="整い方写真"> -->
            <?php if ($pic = get_field('sauna_pic2')) : ?>
                <?php $pic_url = $pic['sizes']['large']; ?>
                <?php if ($pic_url) : ?>
                    <img class="sauna_photo margin_right order_3" src="<?php echo esc_url($pic_url); ?>" alt="サ活写真">
                <?php endif; ?>
            <?php endif; ?>

            <!-- 4 -->
            <div class="sauna_box order_4">
                <h3 class="sauna_ttl">整い方</h3>
                <p>
                    「整う」とは、サウナと水風呂、そして外気浴を繰り返すことでメンタル的にリフレッシュした状態のことを指します。サウナで10分ほど発汗した後、水風呂で1-2分冷却し、次に5-10分の外気浴でリラックス。これを数セット繰り返すと、心地よい浮遊感と爽快感が体感できます。一方で急激な気温の変化を体感するため、その時の体調にも気を付けることがサ活を楽しむ上でも必要です。
                </p>
            </div>

            <!-- 6 -->
            <!-- 元のコード -->
            <!-- <img class="sauna_photo margin_left order_6" src="<?php echo get_template_directory_uri() ?>/assets/images/sauna3.png" alt="整い方写真"> -->
            <?php if ($pic = get_field('sauna_pic3')) : ?>
                <?php $pic_url = $pic['sizes']['large']; ?>
                <?php if ($pic_url) : ?>
                    <img class="sauna_photo margin_right order_6" src="<?php echo esc_url($pic_url); ?>" alt="サ活写真">
                <?php endif; ?>
            <?php endif; ?>
            <!-- 5 -->
            <div class="sauna_box order_5">
                <h3 class="sauna_ttl">持ち物や注意事項</h3>
                <p>
                    サ活に必要な持ち物は、タオル2枚、水分補給用の飲料(こちらは温泉等施設内の給水機等でも可)、サウナハット、そしてサウナマットです。注意事項としては、事前に水分をしっかり摂ること、無理をせず体調に合わせて行うことが重要です。体調不良時やアルコール摂取後は避け、マナーを守って楽しみましょう。
                </p>
            </div>
        </div>


        <a href="<?php echo home_url() ?>/sauna_type/sauna/" class="btn">
            サウナのある温泉
        </a>


    </div>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>
