<!-- footer -->
<footer class="footer_wrap">
    <div class="footer_container">
        <ul class="footer_list">
            <li class="footer_item">
                <a href="<?php echo home_url('/about/'); ?>">
                    <span class="material-symbols-outlined">
                        bubble_chart
                    </span>このサイトについて
                </a>
            </li>
            <li class="footer_item">
                <a href="<?php echo home_url('/category/news/'); ?>">
                    <span class="material-symbols-outlined">
                        fiber_new
                    </span>お知らせ一覧へ
                </a>
            </li>
            <li class="footer_item">
                <a href="<?php echo home_url('/privacypolicy/'); ?>">
                    <span class="material-symbols-outlined">
                        verified_user
                    </span>
                    <div>免責事項・<br>プライバシーポリシー</div>
                </a>
            </li>
            <li class="footer_item">
                <a href="<?php echo home_url('/contact/'); ?>">
                    <span class="material-symbols-outlined">
                        mail
                    </span>お問い合わせ(企業様)
                </a>
            </li>
        </ul>
        <p>&copy;あわあわ温泉ぶらり All Rights Reserved.</p>
    </div>
</footer>


</div>
<?php wp_footer(); ?>
</body>

</html>
