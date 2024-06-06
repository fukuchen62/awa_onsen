<section class="comments">
    <!-- コメントフォームを呼び出す -->
    <?php
    // フォームのカスタマイズ
    $comment_form_args = [
        'title_reply' => 'コメント投稿フォーム',
        'comment_notes_before' => 'コメントを入力して、「コメント送信」ボタンをクリックして送信してください。',
        'comment_notes_after' => 'コメントありがとうございました。',
    ];
    // コメント投稿フォームを読み込む
    comment_form($comment_form_args);
    ?>

    <!-- コメントリストを出力 -->
    <?php if (have_comments()) : ?>
        <ol class="commentlist">
            <?php
            $wp_list_comments_args = [
                'avatar_size' => '50',
            ];
            wp_list_comments($wp_list_comments_args);
            ?>
        </ol>

        <!-- コメントリストのページネーション -->
        <?php
        $paginate_comments_links_args = [
            'prev_text' => '<=前のコメント',
            'next_text' => '次のコメント=>',
        ];
        paginate_comments_links($paginate_comments_links_args);
        ?>

    <?php endif; ?>
</section>
