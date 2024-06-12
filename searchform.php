<?php get_header() ?>

<main class="pc_inner">
    <div class="container">
        <h2 class="under_line">検索</h2>

        <!-- パンくず -->

        <ul class="tag element03">
            <li class="active">温泉</li>
            <li>周辺施設</li>
            <li>モデルコース</li>
        </ul>

        <!-- 温泉 -->
        <div class="contents">
            <form role="search" method="get" id="searchform-spa" action="<?php echo home_url('/'); ?>">
                <input type="hidden" name="s">
                <h3>地域</h3>
                <!-- Area + Spa Type Form -->
                <div class="area">
                    <?php
                    $area_terms = get_terms(array(
                        'taxonomy' => 'area',
                        'hide_empty' => false,
                    ));

                    if (!empty($area_terms) && !is_wp_error($area_terms)) :
                        foreach ($area_terms as $term) :
                            $selected_area_terms = (array) get_query_var('area_spa');
                    ?>
                            <label class="checkbox-item">
                                <input type="checkbox" name="area_spa[]" value="<?php echo esc_attr($term->slug); ?>" <?php checked(in_array($term->slug, $selected_area_terms)); ?>>
                                <span><?php echo esc_html($term->name); ?></span>
                            </label>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <h3>効能</h3>
                <div class="list">
                    <?php
                    $spa_type_terms = get_terms(array(
                        'taxonomy' => 'spa_type',
                        'hide_empty' => false,
                    ));

                    if (!empty($spa_type_terms) && !is_wp_error($spa_type_terms)) :
                        foreach ($spa_type_terms as $term) :
                            $selected_spa_type_terms = (array) get_query_var('spa_type');
                    ?>
                            <label class="checkbox-item">
                                <input type="checkbox" name="spa_type[]" value="<?php echo esc_attr($term->slug); ?>" <?php checked(in_array($term->slug, $selected_spa_type_terms)); ?>>
                                <span><?php echo esc_html($term->name); ?></span>
                            </label>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <div class="btn">
                    <!-- カスタム投稿タイプ指定 -->
                    <input type="hidden" name="post_type" value="spa" />
                    <!-- リセット -->
                    <label class="reset">
                        <button type="button" onclick="document.getElementById('searchform-spa').reset();">
                            <span>リセット</span>
                        </button>
                    </label>
                    <!-- 検索 -->
                    <label class="submit">
                        <button type="submit" id="searchsubmit">
                            <span><i class="fa-solid fa-magnifying-glass"></i>検索</span>
                        </button>
                    </label>
                </div>
            </form>
        </div>

        <!-- 周辺施設 -->
        <div class="contents">
            <form role="search" method="get" id="searchform-facility" action="<?php echo home_url('/'); ?>">
                <input type="hidden" name="s">
                <h3>地域</h3>
                <div class="area">
                    <?php
                    $area_terms = get_terms(array(
                        'taxonomy' => 'area',
                        'hide_empty' => false,
                    ));

                    if (!empty($area_terms) && !is_wp_error($area_terms)) :
                        foreach ($area_terms as $term) :
                            $selected_area_terms = (array) get_query_var('area_facility');
                    ?>
                            <label class="checkbox-item">
                                <input type="checkbox" name="area_facility[]" value="<?php echo esc_attr($term->slug); ?>" <?php checked(in_array($term->slug, $selected_area_terms)); ?>>
                                <span><?php echo esc_html($term->name); ?></span>
                            </label>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <h3>分類</h3>
                <div class="list">
                    <?php
                    $facility_type_terms = get_terms(array(
                        'taxonomy' => 'facility_type',
                        'hide_empty' => false,
                    ));

                    if (!empty($facility_type_terms) && !is_wp_error($facility_type_terms)) :
                        foreach ($facility_type_terms as $term) :
                            $selected_facility_type_terms = (array) get_query_var('facility_type');
                    ?>
                            <label class="checkbox-item">
                                <input type="checkbox" name="facility_type[]" value="<?php echo esc_attr($term->slug); ?>" <?php checked(in_array($term->slug, $selected_facility_type_terms)); ?>>
                                <span><?php echo esc_html($term->name); ?></span>
                            </label>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <div class="btn">
                    <!-- カスタム投稿タイプ指定 -->
                    <input type="hidden" name="post_type" value="facility" />
                    <!-- リセット -->
                    <label class="reset">
                        <button type="button" onclick="document.getElementById('searchform-facility').reset();">
                            <span>リセット</span>
                        </button>
                    </label>
                    <!-- 検索 -->
                    <label class="submit">
                        <button type="submit" id="searchsubmit">
                            <span><i class="fa-solid fa-magnifying-glass"></i>検索</span>
                        </button>
                    </label>
                </div>
            </form>
        </div>

        <!-- モデルコース -->
        <div class="contents">
            <form role="search" method="get" id="searchform-course" action="<?php echo home_url('/'); ?>">
                <input type="hidden" name="s">
                <h3>地域</h3>
                <div class="area">
                    <?php
                    $area_terms = get_terms(array(
                        'taxonomy' => 'area',
                        'hide_empty' => false,
                    ));

                    if (!empty($area_terms) && !is_wp_error($area_terms)) :
                        foreach ($area_terms as $term) :
                            $selected_area_terms = (array) get_query_var('area_course');
                    ?>
                            <label class="checkbox-item">
                                <input type="checkbox" name="area_course[]" value="<?php echo esc_attr($term->slug); ?>" <?php checked(in_array($term->slug, $selected_area_terms)); ?>>
                                <span><?php echo esc_html($term->name); ?></span>
                            </label>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <h3>分類</h3>
                <div class="list">
                    <?php
                    $course_type_terms = get_terms(array(
                        'taxonomy' => 'course_type',
                        'hide_empty' => false,
                    ));

                    if (!empty($course_type_terms) && !is_wp_error($course_type_terms)) :
                        foreach ($course_type_terms as $term) :
                            $selected_course_type_terms = (array) get_query_var('course_type');
                    ?>
                            <label class="checkbox-item">
                                <input type="checkbox" name="course_type[]" value="<?php echo esc_attr($term->slug); ?>" <?php checked(in_array($term->slug, $selected_course_type_terms)); ?>>
                                <span><?php echo esc_html($term->name); ?></span>
                            </label>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <div class="btn">
                    <!-- カスタム投稿タイプ指定 -->
                    <input type="hidden" name="post_type" value="course" />
                    <!-- リセット -->
                    <label class="reset">
                        <button type="button" onclick="document.getElementById('searchform-course').reset();">
                            <span>リセット</span>
                        </button>
                    </label>
                    <!-- 検索 -->
                    <label class="submit">
                        <button type="submit" id="searchsubmit">
                            <span><i class="fa-solid fa-magnifying-glass"></i>検索</span>
                        </button>
                    </label>
                </div>
            </form>
        </div>